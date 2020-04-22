<?php
namespace App\Http\Controllers\Api;
  ob_start();
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Auth;
  use App\User;
  use Session;
  use Illuminate\Support\Facades\Hash;
  use App\listing;
  use App\images;
  use App\States;
  use App\Pages;
  use App\rating;
  use App\Deals;
  Use App\blog_comments;
  use App\Home;
  use App\days_time;
  use App\favourite_listings;
  use App\Countries;
  use App\categories;
  use App\password_reset;

  use Illuminate\Support\Str;
  use Mail;
  use App\Blog;
  use App\Tags;
  use Carbon\Carbon;
  use App\Contact_emails;
  use App\Notifications;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function __construct(){
       // header("access-control-allow-origin: *");
        header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Access-Control-Allow-Origin: *");
        
    }
    
//call below function to get the post data
      public function data(){
        header("access-control-allow-origin: *");
        	$postdata = file_get_contents("php://input");
           return json_decode($postdata,TRUE);
    }


///nearest
   //listings
     public function nearest_busi(Request $request)
   {
       $datam= DB::select("SELECT *, SQRT(
        POW(69.1 * (lat - $request->lat), 2) +
        POW(69.1 * ($request->lng - lng) * COS(lat / 57.3), 2)) AS distance 
        FROM listings HAVING distance < 250 ORDER BY distance");
      
     
      $new_add = array();   
     foreach ($datam as $key)
      {
      $key->overall_rating= DB::table('rating')->where('listing_id',$key->id)->avg('rating');

       if(!empty($key->country_id))
       {
          $country = DB::table('countries')->where('country_id',$key->country_id)->pluck('country_name')->first();
          $key->country= !empty($country) ? $country : null;
       }
      $key->total_reviews=DB::table('rating')->select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key->reviews=rating::leftjoin('users','users.id', '=','rating.user_id')->select('rating.*','users.*','rating.id')->where('rating.listing_id',$key->id)->get()->toArray();
     
      $key->image = DB::table('images')->select('name','id')->where('listing_id',$key->id)->where('deleted_at',NULL)->get()->toArray();
      $key->fav=favourite_listings::where('user_id',$request['userid'])->where('listing_id',$key->id)->get()->toArray();
      $key->days_time=DB::table('days_time')->where('listing_id',$key->id)->get();
      $new_add[] = $key;
      } 
      $data['total'] = DB::table('listings')->where('status',1)->count();
      
      foreach($new_add as $k => $key)
      {
        if(isset($new_add[$k]->address) && !empty($new_add[$k]->address))
           {
               $add = $new_add[$k]->address;
                $address = str_replace(",", "+", $new_add[$k]->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    //$new_add[$k]->lat = $response_a->results[0]->geometry->location->lat;
                   // $new_add[$k]->long = $response_a->results[0]->geometry->location->lng;
                    $new_add[$k]->lat = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $new_add[$k]->long = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $new_add[$k]->lat = '';
                     $new_add[$k]->long = '';
                }
           }else
           {
               $new_add[$k]->lat = '';
               $new_add[$k]->long = '';
           }
           
           if(isset($new_add[$k]->category_id) && !empty($new_add[$k]->category_id))
           {
              $new_add[$k]->category= DB::table('category')->where('id',$new_add[$k]->category_id)->pluck('category')->first();
           }
      
      }
      $data['business'] =$new_add;
      if(!empty($new_add))
      {
          $return['status']=1;
          $return['data']=$data;
          $return['message']='all listings';
      }
      else
      {
          $return['status']=0;
          $return['data']='null';
          $return['message']='no lisitng yet';
      }
    //   echo'<pre>';
    //   print_r($return);
    //   die;
      return json_encode($return);

   }




///nearest

 

//=================user-login===================
    public function loginUser(Request $request)
    {
                    $request =$request->all();
            		$postdata = file_get_contents("php://input");
                    $request=json_decode($postdata,TRUE);
                    $data = [];
    if(User::where('email','=',$request['email'])->where('active','=',0)->where('status','=',2)->first()===null)
    {
         if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password'],'active'=>0]))
       	 {
       	    
       	  	$data['msg'] = 'Login successfully!!';
			$data['status'] = 1;
			 $data['data'] =User::where('email','=',$request['email'])->get()->toArray();
       	 }
       	 else
       	 {
            $data['msg'] = 'Invalid email or password!!';
            $data['status'] = 0;
            $data['data'] = 'null'; 
       	 }
    }
    else{
            $data['msg']='Inactive account';
            $data['status'] = 2;
            $data['data'] = 'null';
    }
    
		return json_encode($data);
    }
    
  
//---RegisterData------------------
     public function register(Request $request)
   {   
       $request =$request->all();  
       $data = [];
         if(User::where('email', '=', $request['email'])->first() === null)
      {
           if(User::insert(['name'=>$request['name'],'email'=>$request['email'],'password'=>Hash::make($request['password'])])==true)
           {
            $data['msg']='Registration successfull';
            $data['status'] = 1;
            $data['data'] = User::where('id',DB::getPdo()->lastInsertId())->get()->toArray();  
           }
           else
           {
            $data['msg']='error';
            $data['status'] = 0;
            $data['data'] ='null';
           }
            
      }
         else
      {
            $data['msg']='email already exists';
            $data['status'] = 2;
            $data['data'] = $request['email'] ;
      }
         return json_encode($data);
   }
   
//get profile

    public function profile(Request $request)
    {
        $request =$request->all();
        $data =[];
        $user = User::where('id','=',$request['id'])->where('active','=',0)->get()->toArray();
        if(!empty($user)){
            $data['msg']='profile data';
            $data['status'] = 1;
            $data['data'] =$user; 
        }
        else{
            $data['msg']='error';
            $data['status'] = 0;
            $data['data'] ='null';  
        }
       return json_encode($data);
       
    }
    
    //get profile

    public function update_profile(Request $request)
    { 
            $requests =$request->all();
            $return=[];
            $id = User::where('id',$requests['id'])->first();

      if(User::where('email','=',$requests['email'])->where('id','!=',$requests['id'])->first()===null)
      {
            /* if($request->hasFile('profile_pic'))
         {          
            $image = $request->file('profile_pic');
            $real_name = $request->profile_pic->getClientOriginalName();
            $name= preg_replace("/[^a-z0-9\_\-\.]/i", '',$real_name);
            $destinationPath = public_path('/profile_pictures');
            $image->move($destinationPath, $name);      
            $response['pic']=$request->profile_pic->getClientOriginalName(); 

         }
          else
         {
             $name = $id['profile_image']; 
             
         }   */  
         $update = array();
            if(isset($requests['oldpassword']) || isset($requests['newpassword']))
            {
                if(isset($requests['oldpassword']) && isset($requests['newpassword']))
                {
                     if(Hash::check($requests['oldpassword'],$id['password']))
                     {
                         $update = array(
                             'name'=>$request['name'],
                             'email'=>$request['email'],
                             'password'=>Hash::make($request['newpassword']),
                             'profile_image'=>$request['profile_image']
                             );
                             $update = array_filter($update);
                             $return['msg']='profile and password has been updated';
                     }else
                     {
                        $return['msg']='password does not match with old password';
                        $return['status'] = 2;
                     }
                }else
                {
                     $return['msg']='Old password and new password is required';
                      $return['status'] = 2;
                }
            }else
            {
                $update = array(
                 'name'=>$request['name'],
                 'email'=>$request['email'],
                 'profile_image'=>$request['profile_image']
                 );
                 $update = array_filter($update);
                 $return['msg']='profile has been updated';
            }
            if(!empty($update) && count($update) > 0)
            {
                if(User::where('id',$request['id'])->update($update))
                {
                    $return['status'] = 1; 
                }else
                {
                    $return['msg']='Error to update profile';
                    $return['status'] = 2; 
                }
            }
            
          /*  if(Hash::check($requests['oldpassword'],$id['password']))
         {
        User::where('id',$request['id'])->update(['name'=>$request['name'],'email'=>$request['email'],'password'=>Hash::make($request['newpassword']),'profile_image'=>$name]);
            $return['msg']='profile and password are updated';
            $return['status'] = 1;
           
         }
         else
        {  
            $return['msg']='password does not match with old password';
            $return['status'] = 2;
            
        }*/

     /* if(!isset($request['oldpassword']))
      {      
        User::where('id',$request['id'])->update(['name'=>$request['name'],'email'=>$request['email'],'profile_image'=>$name]);
            $return['msg']='profile is updated';
            $return['status'] = 3;
            
      }*/
      }
      else{
            $return['msg']='email already exists';
            $return['status'] = 0;
            $return['data'] =$request['email'];  
      }      
         
         return json_encode($return);  
        
       
    }
//---reset_password----------
     public function reset_password(Request $request)
   {   
      // $request =$this->data();
      $request = $request->all();
       $return=[];
        if(User::where('email','=',$request['email'])->where('active',0)->first()===null){
            $return['msg']='email does not exist';
            $return['status'] = 0;
            $return['data'] = $request['email'] ;
    }
      else{
          $mail=$request['email'];
          $name= User::where('email',$request['email'])->first()->name;         
          $long_token= md5(mt_rand(10000,99999).time() . $request['email']);
          $token = substr($long_token,0,10); 
          DB::table('password_resets')->insert(['email'=>$request['email'],'token'=>$token]);    
          Session::put('password_reset_mail',$request['email']);
          $message="Dear ".ucwords($name).",<br>
        if you want to reset your password, then please enter this OTP: "
        .$token."<br>Thanks,<br>
        Team MrSabi";
        $data = array(       
        'subject' => 'Password reset',
        'bodyMessage' => $message,
        'postersemail' => $mail
     
        );
          Mail::send('Users.mailmessage',$data,function($message) use ( $data)
          {    
                $message->to($data['postersemail'] );
                $message->subject($data['subject']); 
                     
          });
            $return['msg']='link is sent to the email';
            $return['status'] = 1;
            $return['data'] = $request['email'] ;

      }
       return json_encode($return); 
   }
   
//---add_listing_data------------
     public function add_listing_data(Request $request)
   { 
      
      DB::table('listings')->insert(['lat'=>$request['latitude'],'lng'=>$request['longitude'],'user_id'=>$request->userid,'title'=>$request->title,'category_id'=>$request->category,'description'=>$request->description,'tags'=>$request->tags,'phone'=>$request->phone,'mail'=>$request->email,'website'=>$request->website,'pincode'=>$request->pincode,'address'=>$request->address_description,'country_id'=>$request->country,'state_id'=>$request->state,'city'=>$request->city]); 
            $last_insert_id =  DB::getPdo()->lastInsertId(); 
             if($last_insert_id){
            
            if(!empty($request->day)){
          foreach ($request->day as $key) {
            if($key){
            days_time::insert(['day'=>$key['day'],'opening_hour'=>$key['opening_hour'],'closing_hour'=>$key['closing_hour'],'listing_id'=>$last_insert_id]);  
             }
            }
              }
              
     if(!empty($request->image))
     {
           
          foreach ($request->image as $keyimage)
          {
                images::insert(['name'=>$keyimage,'listing_id' =>$last_insert_id]);
               
          }
     
    }
    
    
        $return['msg']='Listing has been added successfully!!.';
        $return['status'] = 1;
      
             }
             else{
        $return['msg']='internal error';
        $return['status'] = 0;
        $return['data'] = null ; 
             }

        return json_encode($return);     
        
    
   }
   
    public function edit_listing(Request $request)
    
   {  
       $request = $request->all();
       $update = array(
           'title'=>$request['title'],
           'category_id'=>$request['category'],
           'description'=>$request['description'],
           'tags'=>$request['tags'],
           'phone'=>$request['phone'],
           'mail'=>$request['email'],
           'website'=>$request['website'],
           'pincode'=>$request['pincode'],
           'address'=>$request['address_description'],
           'country_id'=>$request['country'],
           'state_id'=>$request['state'],
           'city'=>$request['city']
           );
          $update = array_filter($update);
        DB::table('listings')->where('id',$request['list_id'])->where('user_id',$request['userid'])->update($update);
     DB::table('notifications')->insert(['user_id'=>$request['userid'],'type'=>3,'added_list_id'=>$request['list_id']]);
     
        if(!empty($request['day'])){
            days_time::where('listing_id',$request['list_id'])->forceDelete();
            foreach ($request['day'] as $key) {
            if($key){
            days_time::insert(['day'=>$key['day'],'opening_hour'=>$key['opening_hour'],'closing_hour'=>$key['closing_hour'],'listing_id'=>$request['list_id']]);  
             }
            }
              }
              
    if(!empty($request['deleted_images'])){
        foreach($request['deleted_images'] as $key){
           images::where('id',$key['id'])->delete(); 
        }
        
    }
    
        if(!empty($request['image'])){
        foreach($request['image'] as $key){
            if(!empty($key)){
                 images::insert(['name'=>$key['name'],'listing_id'=>$request['list_id']]); 
               
            }
        }
    }
     
        $return['msg']='Listing has been updated successfully!!.';
        $return['status'] = 1;
        $return['data'] = null ;
        return json_encode($return); 
   }
   
   public function delete_lisiting(Request $request)
   {
          
           if(DB::table('listings')->where('id', $request->list_id)->delete())
           {
             
// notifications
                $notifications =  DB::table('notifications')->where('added_list_id',$request->list_id)->first();
            if(!empty($notifications))
           {
               DB::table('notifications')->where('added_list_id', $request->list_id)->where('user_id', $request->userid)->delete();
           }
           
// days time
               $days_time =  DB::table('days_time')->where('listing_id',$request->list_id)->first();
           if(!empty($days_time))
           {
               DB::table('days_time')->where('listing_id', $request->list_id)->delete();
           }
           
//images
           
               $images =  DB::table('images')->where('listing_id',$request->list_id)->first();
           if(!empty($images))
           {
               DB::table('images')->where('listing_id', $request->list_id)->delete();
           }
           
//favourite
           
               $fav =  DB::table('favourite_listings')->where('listing_id',$request->list_id)->first();
           if(!empty($fav))
           {
               DB::table('favourite_listings')->where('listing_id', $request->list_id)->delete();
           }
              
// deals
              $deals =DB::table('deals')->where('business_name',$request->list_id)->first();
           if(!empty($deals))
           {
               DB::table('deals')->where('business_name', $request->list_id)->delete();
           }
           
//rating
               $rating =DB::table('rating')->where('listing_id',$request->list_id)->first();
           if(!empty($rating))
           {
               DB::table('rating')->where('listing_id', $request->list_id)->delete();
           }
                $return['msg']='Listing has been deleted successfully!!.';
                $return['status'] = 1;
               
           }
           else{
                $return['msg']='server error';
                $return['status'] = 0;
               }
         
   
        return json_encode($return); 
   }
   
//listings
     public function businesses(Request $request)
   {     
      // $request =$this->data();
       $request = $request->all();
       $return=[];
       $datam = DB::table('listings')->where('status',1)->offset($request['skip'])->limit($request['limit'])->orderBy('id', 'desc')->get();
       
       if(!empty($datam)) $datam =$datam->toArray();
      $new_add = array();   
     foreach ($datam as $key)
      {
      $key->overall_rating= DB::table('rating')->where('listing_id',$key->id)->avg('rating');
    //   if(is_float($key->overall_rating))
    //   {
    //       if($key->overall_rating < $key->overall_rating.'.5')
    //       {
    //          $key->overall_rating = round($key->overall_rating).'.5';
    //       }else
    //       {
    //           $key->overall_rating = round($key->overall_rating);
    //       }
    //   }
       if(!empty($key->country_id))
       {
          $country = DB::table('countries')->where('country_id',$key->country_id)->pluck('country_name')->first();
          $key->country= !empty($country) ? $country : null;
       }
      $key->total_reviews=DB::table('rating')->select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key->reviews=rating::leftjoin('users','users.id', '=','rating.user_id')->select('rating.*','users.*','rating.id')->where('rating.listing_id',$key->id)->get()->toArray();
     
      $key->image = DB::table('images')->select('name','id')->where('listing_id',$key->id)->where('deleted_at',NULL)->get()->toArray();
      $key->fav=favourite_listings::where('user_id',$request['userid'])->where('listing_id',$key->id)->get()->toArray();
      $key->days_time=DB::table('days_time')->where('listing_id',$key->id)->get();
      $new_add[] = $key;
      } 
      $data['total'] = DB::table('listings')->where('status',1)->count();
      
      foreach($new_add as $k => $key)
      {
        if(isset($new_add[$k]->address) && !empty($new_add[$k]->address))
           {
               $add = $new_add[$k]->address;
                $address = str_replace(",", "+", $new_add[$k]->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    //$new_add[$k]->lat = $response_a->results[0]->geometry->location->lat;
                   // $new_add[$k]->long = $response_a->results[0]->geometry->location->lng;
                    $new_add[$k]->lat = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $new_add[$k]->long = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $new_add[$k]->lat = '';
                     $new_add[$k]->long = '';
                }
           }else
           {
               $new_add[$k]->lat = '';
               $new_add[$k]->long = '';
           }
           
           if(isset($new_add[$k]->category_id) && !empty($new_add[$k]->category_id))
           {
              $new_add[$k]->category= DB::table('category')->where('id',$new_add[$k]->category_id)->pluck('category')->first();
           }
      
      }
      $data['business'] =$new_add;
      if(!empty($new_add))
      {
          $return['status']=1;
          $return['data']=$data;
          $return['message']='all listings';
      }
      else
      {
          $return['status']=0;
          $return['data']='null';
          $return['message']='no lisitng yet';
      }
    //   echo'<pre>';
    //   print_r($return);
    //   die;
      return json_encode($return);
   }
   
   public function getstates($id)
   {
       $data['states'] = DB::table('states')->where('country_id',$id)->where('status',1)->get();
       if(!empty($data)){
           $return['data']=$data;
           $return['status']=1;
           $return['message']='states data';
       }
       else{
           $return['data']='null';
           $return['status']=0;
           $return['message']='no states data'; 
       }
           return json_encode($return);
   }
//---categories-------------------
   public function categories(Request $request)
   { 
       $return=[];
       //$request =$this->data();
       $request = $request->all();
       $data['categories']= DB::table('category')->where('category.status','1')->offset($request['skip'])->limit($request['limit'])->get();
       if(count($data['categories']) > 0)
       {
           $data['categories'] = $data['categories']->toArray();
       }
       $data['total_records']= DB::table('category')->where('category.status','1')->count();
       $data['countries'] = DB::table('countries')->get();
       if(!empty($data)){
           $return['data']=$data;
           $return['status']=1;
           $return['message']='category data';
       }
       else{
           $return['data']='null';
           $return['status']=0;
           $return['message']='no category data'; 
       }
           return json_encode($return);
   }
   
   //---cat_tag-------------------
   public function cat_tag(Request $request)
   { 
        $return=[];
        $data=[];
        $cats= categories::select('id','category')->where('status','1')->get();
        if(!empty($cats)) $data['categories'] =$cats->toArray();
        else $data['categories']=[];
        
        $temp_tags=listing::select('tags')->where('status',1)->get();
         if(!empty($temp_tags)) $temp_tags =$temp_tags->toArray();
         else $temp_tags=array();
        $all_data=[];
           foreach($temp_tags as $key){
            $array[]=explode(',',$key['tags']);
        }
             $i=1;                                                           
                                      if (!is_array($array)) { 
                                        
                                                             } 
                                      $result = array(); 
                                      foreach ($array as $key => $value) { 
                                        if (is_array($value)) { 
                                          $result = array_merge($result, array_flatten($value)); 
                                        } 
                                        else { 
                                          $result[$key] = $value; 
                                        } 
                                      }
                $data['tags']=array_unique($result);                      
        $return['data']=$data;
        $return['status']=1;
    //   echo'<pre>';
    //   print_r($data);
    //   die;
           return json_encode($return);
   }
   
//---listing----------------------
     public function  category_based_listing(Request $request)
   {  
      //$request =$this->data();/
      $request = $request->all();
      $return=[];
      $favourite=favourite_listings::get();
      if(count($favourite)>0){
      foreach ($favourite as $key) {
        $ids[]=$key->listing_id;
      }
      }
      else{
        $ids=array();
      }
      $category=DB::table('category')->where('status',1)->get();
      $datam=DB::table('listings')->where('status',1)->where('category_id',$request['id'])->offset($request['skip'])->limit($request['limit'])->get();
      $address=DB::table('listings')->where('status',1)->get(); 
      $address2=DB::table('listings')->where('category_id',$request['id'])->where('status',1)->get(); 
    
      $new_add = array();   
      foreach ($datam as $key)
       {
       $key->overall_rating = DB::table('rating')->where('listing_id',$key->id)->avg('rating');
       if(is_float($key->overall_rating))
       {
           if($key->overall_rating < $key->overall_rating.'.5')
           {
             $key->overall_rating = round($key->overall_rating).'.5';
           }else
           {
               $key->overall_rating = round($key->overall_rating);
           }
       }
       $key->reviews = DB::table('rating')
        ->leftJoin('users', 'users.id', '=', 'rating.user_id')
        ->where('listing_id',$key->id)
        ->get();
         $country = DB::table('countries')->where('country_id',$key->country_id)->pluck('country_name')->first();
        $key->country= !empty($country) ? $country : null;
       $key->total_reviews=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
       
       $key->image = DB::table('images')->select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get();
       if(count($key->image) > 0)
       {
         $key->image = $key->image->toArray();
       }
       $key->fav=favourite_listings::where('user_id',$request['userid'])->where('listing_id',$key->id)->get();
       if(count($key->fav) > 0)
       {
       $key->fav = $key->fav->toArray();
       }
       $key->days_time=DB::table('days_time')->where('listing_id',$key->id)->get();
       $new_add[] = $key;
      }
   //die; 
      foreach($new_add as $k => $d)
      {
       if(isset($new_add[$k]->category_id) && !empty($new_add[$k]->category_id))
       {
          $dam= DB::table('category')->where('id', $new_add[$k]->category_id)->pluck('category')[0];
          $new_add[$k]->category_name = $dam;
       }else
       {
           $new_add[$k]->category_name = '';
       }
       
           if(isset($new_add[$k]->address) && !empty($new_add[$k]->address))
           {
               $add = $new_add[$k]->address;
                $address = str_replace(",", "+", $new_add[$k]->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
               
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    $new_add[$k]->lat = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $new_add[$k]->long = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $new_add[$k]->lat = '';
                     $new_add[$k]->long = '';
                }
           }else
           {
               $new_add[$k]->lat = '';
               $new_add[$k]->long = '';
           }
      }  
      $data['listing'] = $new_add;
      $data['total_records'] = count($address2);
      if(!empty($new_add))
      {
            $return['status'] = 1;
            $return['data'] = $data;
            $return['message'] ='listings for this category';
      }
      else
      {
            $return['status'] = 0;
            $return['data'] = 'null';
            $return['message'] ='no lisitngs exists for this category';
          
      }
          return json_encode($return);

   }
   
     //---listing_detail----------------
     public function businesses_detail(Request $request)
   { 
     
     // $request =$this->data();
       $request = $request->all();
       $return=[];
       $datam = DB::table('listings')->where('status',1)->where('id',$request['id'])->get();
       
       if(!empty($datam)) $datam =$datam->toArray();
      $new_add = array();   
     foreach ($datam as $key)
      {
      $key->overall_rating= DB::table('rating')->where('listing_id',$key->id)->avg('rating');
      if(is_float($key->overall_rating))
       {
           if($key->overall_rating < $key->overall_rating.'.5')
           {
             $key->overall_rating = round($key->overall_rating).'.5';
           }else
           {
               $key->overall_rating = round($key->overall_rating);
           }
       }
       if(!empty($key->country_id))
       {
          $country = DB::table('countries')->where('country_id',$key->country_id)->pluck('country_name')->first();
          $key->country= !empty($country) ? $country : null;
       }
      $key->total_reviews=DB::table('rating')->select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key->reviews=rating::leftjoin('users','users.id', '=','rating.user_id')->select('rating.*','users.*','rating.id','rating.created_at')->where('rating.listing_id',$key->id)->get()->toArray();
     
      $key->image = DB::table('images')->select('name','id')->where('listing_id',$key->id)->where('deleted_at',NULL)->get()->toArray();
      $key->fav=favourite_listings::where('user_id',$request['userid'])->where('listing_id',$key->id)->get()->toArray();
      $key->days_time=DB::table('days_time')->where('listing_id',$key->id)->get();
      $new_add[] = $key;
      } 
      $data['total'] = DB::table('listings')->where('status',1)->count();
      
      foreach($new_add as $k => $key)
      {
        if(isset($new_add[$k]->address) && !empty($new_add[$k]->address))
           {
               $add = $new_add[$k]->address;
                $address = str_replace(",", "+", $new_add[$k]->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    //$new_add[$k]->lat = $response_a->results[0]->geometry->location->lat;
                   // $new_add[$k]->long = $response_a->results[0]->geometry->location->lng;
                    $new_add[$k]->lat = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $new_add[$k]->long = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $new_add[$k]->lat = '';
                     $new_add[$k]->long = '';
                }
           }else
           {
               $new_add[$k]->lat = '';
               $new_add[$k]->long = '';
           }
           
           if(isset($new_add[$k]->category_id) && !empty($new_add[$k]->category_id))
           {
              $new_add[$k]->category= DB::table('category')->where('id',$new_add[$k]->category_id)->pluck('category')->first();
           }
      
      }
      $data['business'] =$new_add;
      if(!empty($new_add))
      {
          $return['status']=1;
          $return['data']=$data;
          $return['message']='all listings';
      }
      else
      {
          $return['status']=0;
          $return['data']='null';
          $return['message']='no lisitng yet';
      }
    //   echo'<pre>';
    //   print_r($return);
    //   die;
      return json_encode($return);
   }
   



  //---blogs------------------------
     public function blogs()
   {  
       $return=[];
      $blog = Blog::orderby('created_at','desc')->get();
      $new_add=array();
      foreach($blog as $key)
      {
       $key['all_categories']=categories::whereIn('id',explode(',',$key['category']))->get()->toArray();
       $key['all_tags']=Tags::whereIn('id',explode(',',$key['tag']))->get()->toArray();
       $new_add[]=$key;
      }
      if(!empty($new_add))
      {
            $return['message']='all blogs';
            $return['status']=1;
            $return['data']=$new_add;
      }
      else
      {
            $return['message']='no data';
            $return['status']=0;
            $return['data']='null';
      }
            return json_encode($return);
   }
   
   
 //---blog_detail-------------------
     public function blog_details(Request $request)
   {  
       $return=[];
      $blog = Blog::where('id',$request->id)->get()->toArray();
      $comment_data=blog_comments::where('blog_id',$request->id)->get()->toArray();
      $new_add=array();
      foreach($blog as $key)
      {
       $key['all_tags']=Tags::whereIn('id',explode(',',$key['tag']))->get()->toArray();
       $new_add[]=$key;
      }
      $new_add['comments']=$comment_data;
      
       if(!empty($new_add))
      {
            $return['message']='blog-details';
            $return['status']=1;
            $return['data']=$new_add;
      }
      else
      {
            $return['message']='no data';
            $return['status']=0;
            $return['data']='null';
      }
            return json_encode($return);

   }
   
     //---deals-------------------------
     public function deals(Request $request)
   {   
       $max=Deals::select('id')->orderBy('discount','DESC')->limit(5)->get()->toArray();
       $maxid=[];
       foreach($max as $key){
           $maxid[]=$key['id'];
       }
       $request = $request->all();
       $return=[];  
       $data['total_records']= Deals::all()->count();
       $deals=Deals::skip($request['skip'])->take($request['limit'])->get()->toArray();
       
       $new_add = array();   
      foreach ($deals as $key)
      {
        //   echo'<pre>';print_r($key);die;
       $key['overall_rating']=rating::where('listing_id',$key['business_name'])->avg('rating');
       if(is_float($key['overall_rating']))
       {
           if($key['overall_rating'] < $key['overall_rating'].'.5')
           {
             $key['overall_rating'] = round($key['overall_rating']).'.5';
           }else
           {
               $key['overall_rating'] = round($key['overall_rating']);
           }
       }
      $country = DB::table('countries')->where('country_id',$key['country'])->pluck('country_name')->first();
      $key['country']= !empty($country) ? $country : null;
       if(in_array($key['id'],$maxid))
       {
        $key['tag_hot'] =1;  
       }else
       {
         $key['tag_hot'] =0;  
       }
       $key['reviews'] = DB::table('rating')
        ->leftJoin('users', 'users.id', '=', 'rating.user_id')
        ->where('listing_id',$key['business_name'])
        ->get();
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['business_name'])->groupBy('listing_id')->count();
       $key['listing_data']=listing::where('status',1)->where('id',$key['business_name'])->first();
       
       if(isset($key['listing_data']->address) && !empty($key['listing_data']->address))
           {
               $add = $key['listing_data']->address;
                $address = str_replace(",", "+", $key['listing_data']->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    //$datas['lat']  = $response_a->results[0]->geometry->location->lat;
                   // $datas['long'] = $response_a->results[0]->geometry->location->lng;
                    $datas['lat'] = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $datas['long'] = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $datas['lat']= '';
                   $datas['long'] = '';
                }
           }else
           {
              $datas['lat'] = '';
               $datas['long'] = '';
           }
       
            // $listing=DB::table('listings')->where('status',1)->where('id',$key['business_name'])->first();
            // $reviews=DB::table('rating')->where('listing_id',$key['business_name'])->get();
            $images=DB::table('images')->where('listing_id',$key['business_name'])->get();
            $favourite=favourite_listings::where('user_id',$request['userid'])->where('listing_id',$key['business_name'])->where('deleted_at',null)->count();   
            $days_time=DB::table('days_time')->where('listing_id',$key['business_name'])->get();
            // $check_review = DB::table('rating')->where('listing_id',$key['business_name'])->where('user_id',$request['userid'])->count();
            // $datas['listing']=$listing;
            // $datas['reviews']=$reviews;
            $datas['images']=$images;
            $datas['favourite']=$favourite;
            $datas['days_time']=$days_time;
            // $datas['check_review']=$check_review;
            $key['image_favourite']=$datas;
        
       $key['categories']=categories::where('id',$key['listing_data']['category_id'])->first();
       if($key['price'] && $key['discount'])
       {
         $key['price_with_discount']=  $key['price']-($key['price']*$key['discount']/100);
       }else
       {
          $key['price_with_discount']=  null;  
       }
       $new_add[] = $key;
      } 
  
      $data['deals']=$new_add;
      if(!empty($new_add))
      {
        $return['message']='all deals';
        $return['status']=1;
        $return['data']=$data;
      }
      else
      {
        $return['message']='no data';
        $return['status']=0;
        $return['data']='null';
      }
    //   echo'<pre>';print_r($data);die;
      return json_encode($return);
   }
   
 //=======deals-details=======
   public function deal_details(Request $request)
   { 
       $return=[];
      $deal=deals::
      leftjoin('listings','deals.business_name', '=','listings.id')
     ->where('deals.id',$request->id)
     ->select('deals.*','listings.*','deals.id','deals.address','deals.phone')->get()->toArray();
      $deal['reviews']=$reviews=rating::where('listing_id',$deal[0]['business_name'])->count();
      $deal['average']=$reviews=rating::where('listing_id',$deal[0]['business_name'])->avg('rating');
      if(!empty($deal))
      {
            $return['message']='deal-details';
            $return['status']=1;
            $return['data']=$deal;
      }
      else
      {
            $return['message']='no data';
            $return['status']=0;
            $return['data']='null';
      }
            return json_encode($return);
   }
   
//=======deals-details=======
   public function test()
   {
            		$postdata = file_get_contents("php://input");
                    $request=   json_decode($postdata,TRUE);
                  
        return json_encode($request);
   }
   
   public function uploads(Request $request)
    {//  echo '<pre>'; print_r($request->all()); die;
        if($request->hasFile('image') && $request->input('path'))
        {    
             $company['image'] = time().'.'.$request->image->getClientOriginalExtension();
             $request->image->move(public_path($request->input('path')), $company['image']);
             // $company = json_encode($company);
            $return['message']='';
            $return['status']=1;
            $return['data']=$company['image'];
           
        }else
        {
            $return['message']='no data';
            $return['status']=0;
            $return['data']='null';
        }
          return json_encode($return);
    }
    
    public function password_reset(Request $request)
    {
       $data = $request->all(); 
     
       if(isset($data['token']) && !empty($data['token']))
       {
          $email =  DB::table('password_resets')->where(['token'=>$data['token']])->first();    
         if(!empty($email))
         {
            $emails =  DB::table('password_resets')->where(['token'=>$data['token'],'email'=>$email->email])->update(['token'=>rand()]);   
            $return['message']='';
            $return['status']=1;
            $return['data']=$email->email;
         }else
         {
            $return['message']='OTP has been expired';
            $return['status']=0;
            $return['data']='null';  
         }
       }else
       {
            $return['message']='invalid request';
            $return['status']=0;
            $return['data']='null'; 
       }
       return json_encode($return);
    }
    
    public function new_password(Request $request)
    {
        $data = $request->all();
        if(isset($data['email']) && !empty($data['email']) && isset($data['password']) && !empty($data['password']) && isset($data['confirmed']))
        {
            if($data['password'] == $data['confirmed'])
            {
                $email =  DB::table('users')->where(['email'=>$data['email']])->first();  
                if(!empty($email))
                {
                       if(DB::table('users')->where(['email'=>$email->email])->update(['password'=>Hash::make($data['password'])]))
                       {
                            $return['message']='Password has been reset successfully!!.';
                            $return['status']=1;
                            $return['data']='null'; 
                       }else
                       {
                           $return['message']='Error to update your password.Please try again later';
                            $return['status']=0;
                            $return['data']='null'; 
                       }
                }else
                {
                    $return['message']='invalid request';
                    $return['status']=0;
                    $return['data']='null';  
                }
            }else
            {
                $return['message']="Confim Password dosn't match";
                $return['status']=0;
                $return['data']='null'; 
            }
        }else
        {
           $return['message']='invalid request';
            $return['status']=0;
            $return['data']='null';  
        }
         return json_encode($return);
    }
    
    
    //////////////////////////
      //search listings for index page
     public function search_main(Request $request)
   {  
      $return=[];
      $its_data_ar=[];
      $keywords=$request->keywords;
      $location=$request->location;
      $favourite=favourite_listings::get();
      if(count($favourite)>0){
      foreach ($favourite as $key) {
      $ids[]=$key->listing_id;
      }
      }
      else{
        $ids=array();
      }
      $category=categories::get();
      $address=listing::where('status',1)->get();
        // $data=listing::where('status',1)->where('title','LIKE','%'.$keywords.'%')->where('address',$location)->paginate(10);
         $datal = listing::where('status',1)->select('*');
       if(!empty($request->keywords) || !empty($request->location)){
           $datal = listing::leftjoin('category', 'category.id', '=', 'listings.category_id')->where('listings.status',1)->select('listings.*');
      if($location){
        $datal = $datal->where('listings.address','LIKE','%'.$location.'%');
      }
      if($keywords){
        $datal = $datal->where('listings.title','LIKE','%'.$keywords.'%')->orWhere('listings.address','LIKE','%'.$request->keywords.'%')->orWhere('listings.phone','LIKE','%'.$request->keywords.'%')->orWhere('category.category','LIKE','%'.$request->keywords.'%');
      }
      $datal = $datal->offset($request->skip)->limit($request->limit)->get();
       }
       else{
             $datal = $datal->get();
       }
        $new_add = array();  
      
        foreach ($datal as $key)
      {
       $key->overall_rating = rating::where('listing_id',$key->id)->avg('rating');
       if(is_float($key->overall_rating))
       {
           if($key->overall_rating < $key->overall_rating.'.5')
           {
             $key->overall_rating = round($key->overall_rating).'.5';
           }else
           {
               $key->overall_rating = round($key->overall_rating);
           }
       }
       
       if(!empty($key->country_id))
       {
          $country = DB::table('countries')->where('country_id',$key->country_id)->pluck('country_name')->first();
          $key->country= !empty($country) ? $country : null;
       }
       $yesss= rating::leftjoin('listings','listings.id', '=','rating.listing_id')->leftjoin('users','users.id', '=','rating.user_id')->select('rating.*','users.*','rating.id','listings.id as listing_id','users.id as user_id','rating.created_at','rating.updated_at','rating.deleted_at')->where('rating.listing_id',$key->id)->get()->toArray();
       $key->reviews=$yesss;
    
       $key->total_reviews = rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
       $key->image = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
       $key->fav = favourite_listings::where('user_id',$request->userid)->where('listing_id',$key->id)->get()->toArray();
       $key->days_time=DB::table('days_time')->where('listing_id',$key->id)->get();
       $new_add[] = $key;
      } 
      // echo "<pre>";
      // print_r( $new_add);
      // die();
       //$data['total'] = DB::table('listings')->where('status',1)->count();
       
       $datam = listing::where('status',1)->select('*');
       if(!empty($request->keywords) || !empty($request->location)){
           $datam = listing::leftjoin('category', 'category.id', '=', 'listings.category_id')->where('listings.status',1)->select('listings.*');
      if($location){
       $datam = $datam->where('listings.address','LIKE','%'.$location.'%');
      }
      if($keywords){
        $datam = $datam->where('listings.title','LIKE','%'.$keywords.'%')->orWhere('listings.address','LIKE','%'.$request->keywords.'%')->orWhere('listings.phone','LIKE','%'.$request->keywords.'%')->orWhere('category.category','LIKE','%'.$request->keywords.'%');;
      }
     
           $data['total'] = $datam->count();
       }
       else{
             $data['total'] = $datam->count();
       }
       
       
       foreach($new_add as $k => $key)
      {
        if(isset($new_add[$k]->address) && !empty($new_add[$k]->address))
           {
               $add = $new_add[$k]->address;
                $address = str_replace(",", "+", $new_add[$k]->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                   // $new_add[$k]->lat = $response_a->results[0]->geometry->location->lat;
                    //$new_add[$k]->long = $response_a->results[0]->geometry->location->lng;
                     $new_add[$k]->lat = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $new_add[$k]->long = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $new_add[$k]->lat = '';
                     $new_add[$k]->long = '';
                }
           }else
           {
               $new_add[$k]->lat = '';
               $new_add[$k]->long = '';
           }
           
           if(isset($new_add[$k]->category_id) && !empty($new_add[$k]->category_id))
           {
              $new_add[$k]->category= DB::table('category')->where('id',$new_add[$k]->category_id)->pluck('category')->first();
           }
      
      } 

    if(!empty($favid)){
        $data['category_data'] =categories::whereIn('id',$favid)->get();
    }
    else{
       $data['category_data'] =array();
    }
    
     $data['business'] =$new_add;
   /* echo '<pre>'; print_r($new_add); die; */
       if(!empty($new_add)){
           /* $its_data_ar['data']=$new_add;
            $its_data_ar['category_data']=$category_data;
            $its_data_ar['category']=$category;
            $its_data_ar['address']=$address;
            $its_data_ar['favourite']=$ids;
            $its_data_ar['search_for']=$search_for;
            $its_data_ar['location']=$location;
            $return['total_listings']=count($data);*/
            $return['message']='search data';
            $return['status']=1;
            $return['data']=$data; 
       }
      else{
            $return['message']='no data';
            $return['total_listings']=0;
            $return['status']=1;
            $return['data']='null'; 
      }
     // echo'<pre>';
      //print_r($return);die;
      return json_encode($return);
   }
    
    
    
    //////////////////////////
    
    
    
    
    // public function searc_main(Request $request)
    // {
    //   $keywords=$request->keywords;
    //   $location=$request->location;
    //   $favourite=favourite_listings::get();
    //   if(count($favourite)>0)
    //   {
    //     foreach ($favourite as $key) {  $ids[]=$key->listing_id; }
    //   }
    //   else
    //   {
    //     $ids=array(); 
    //   }
      
    //   $category=categories::get();
    //   $address=listing::where('status',1)->get();
      
    //   $data2 = listing::where('status',1)->select('*');
    //   if(!empty($request->keywords) || !empty($request->location))
    //   {
    //       $data2 = listing::where('status',1)->select('*');
             
    //       if($keywords){ $data2 = $data2->where('title','LIKE','%'.$keywords.'%')->orWhere('address','LIKE','%'.$request->keywords.'%'); }
    //       if($location){ $data2 = $data2->where('address',$location);  }
    //         $data2 = $data2->count();
    //   }
    //   else
    //   {
    //         $data2 = $data2->count();
    //   }
      
    //      $data = listing::where('status',1)->select('*');
    //   if(!empty($request->keywords) || !empty($request->location))
    //   {
    //       $data = listing::where('status',1)->select('*');
             
    //       if($keywords){ $data = $data->where('title','LIKE','%'.$keywords.'%')->orWhere('address','LIKE','%'.$request->keywords.'%'); }
    //       if($location){ $data = $data->where('address',$location);  }
          
    //      // $data = $data->paginate(10);
    //         $data = $data->offset($request->skip)->limit($request->limit)->get();
    //       $search_for='Results for';
          
    //         if($keywords) { $search_for.='<br>keywords: '.$keywords; }
    //         if($location) {    $search_for.='<br>Location: '.$location; }
    //   }
    //   else
    //   {
    //         // $data = $data->paginate(10);
    //         $data = $data->offset($request->skip)->limit($request->limit)->get();
    //          $search_for='Write a review';
    //   }
    //     $new_add = array();   
    //  foreach ($data as $key)
    //   {
    //   $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
    //   if(is_float($key['overall_rating']))
    //   {
    //       if($key['overall_rating'] < $key['overall_rating'].'.5')
    //       {
    //          $key['overall_rating'] = round($key['overall_rating']).'.5';
    //       }else
    //       {
    //           $key['overall_rating'] = round($key['overall_rating']);
    //       }
    //   }
    //   $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
    //   $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
    //   $key['fav']=favourite_listings::where('user_id',$request->userid)->where('listing_id',$key->id)->get()->toArray();
    //   $new_add[] = $key;
    //   } 
      
    // if(!empty($favid)){ $category_data=categories::whereIn('id',$favid)->get(); }
    // else{ $category_data =array();  }
    //   if(!empty($new_add))
    //   {
    //          $datas = array(
    //             'data'=>$new_add,
    //           // 'category_data'=>$category_data,
    //             'total' => $data2,
    //             /*'category'=>$category,*/
    //           /* 'address'=>$address,*/
    //           // 'favourite'=>$ids,
    //             //'search_for'=>$search_for,
    //           // 'location'=>$location,
    //             //'paginate'=>$data
    //          );
    //   }
    //   else
    //   {
    //     $datas = array('message'=>'No listings yet','page'=>'Write a review');
    //   }  
    //     $return['message']='';
    //     $return['status']=1;
    //     $return['data']=$datas; 
    //     return json_encode($return);
    // }
    
    public function get_locations()
    {
        $listings=listing::where('status',1)->get();
        $new_add = array(); 
        foreach ($listings as $key)
        {
           $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
                if(is_float($key['overall_rating']))
                {
                if($key['overall_rating'] < $key['overall_rating'].'.5')
                {
                 $key['overall_rating'] = round($key['overall_rating']).'.5';
                }else
                {
                   $key['overall_rating'] = round($key['overall_rating']);
                }
                }
           $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
           $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
           $category = categories::where('id',$key->category_id)->first();
           $key['cat'] = $category['category'];
           $key['cat_icon'] = $category['icon'];
           $new_add[] = $key;
        }
        $loca = array();
        foreach($new_add as $k=>$key)
        {
            //$loca[]=$key->address;  
            $vl['id']=$k;
            $vl['value']=$key->address;
            array_push($loca,$vl);
           $vl = [];
        }
        
      //  $location=array_unique($loca);
     //  echo '<pre>'; print_r($loca); die; 
     $location = $this->unique_multidim_array($loca,'value'); 
     $new = array();
     $i=0;
     foreach($location as $vals)
     {
        $new[$i] = $vals;
        $i++;
     }
        $return['message']='';
        $return['status']=1;
        $return['data']=$new; 
        return json_encode($return);
    }
    
function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
} 
    
  public function detail_search(Request $request)
   {
    $where=array();
    $data=array(); 
      $query=listing::where('status',1)->select('*');
       if($request->category)
      { 
        $query->where('category_id',$request->category);     
      }
      if($request->location)
      { 
        $query->where('address',$request->location);     
      }
      if($request->keywords)
      { 
        $query->where('title','LIKE','%'.$request->keywords.'%')->orWhere('address','LIKE','%'.$request->keywords.'%');     
      }
         
           
           if(!empty($request->tags))
      { 
             $results=array();
             foreach($request->tags as $key)
        {   
             $query->whereRaw("find_in_set('$key',tags)")->get();  
           if(!empty($check))
             {
                $results[]=$check;
             }
        }
      }
      $results= $query->get()->toArray();
    //=====getting ids of favourite lists============//
     $favourite=favourite_listings::get();          //
      if(count($favourite)>0){                     //
      foreach ($favourite as $key)                //
       {                                         // 
        $ids[]=$key->listing_id;                //
      }                                        //
      }                                       //
      else                                   //
      {                                     //
        $ids=array();                      //
      }                                   //
    //===================================//
    if(!empty($results) && count($results) > 0)
   {
      $new_add = array(); 
        foreach ($results as $key)
        { 
           $key['overall_rating']=rating::where('listing_id',$key['id'])->avg('rating');
                if(is_float($key['overall_rating']))
                {
                if($key['overall_rating'] < $key['overall_rating'].'.5')
                {
                 $key['overall_rating'] = round($key['overall_rating']).'.5';
                }else
                {
                   $key['overall_rating'] = round($key['overall_rating']);
                }
                }
           $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['id'])->groupBy('listing_id')->count();
           $key['image'] = images::select('name')->where('listing_id',$key['id'])->groupBy('listing_id')->get()->toArray();
            $key['fav']=favourite_listings::where('user_id',$request->userid)->where('listing_id',$key['id'])->get()->toArray();
           $new_add[] = $key;
        }
   }else
   {
       $new_add = array();
   }
       $category=categories::where('id',$request->category)->first();
        $return['message']='';
        $return['status']=1;
        $return['data']=$new_add; 
        return json_encode($return);
  }
  
  // //---save rating data---
   public function rating(Request $request)
   {
         $return=[];
      if(listing::where('status',1)->where('id','=',$request->listing_id)->where('user_id','=',$request->userid)->first() === null){
          if(rating::where('listing_id',$request->listing_id)->where('user_id',$request->userid)->count() > 0)
          { 
                 $return['message']='already rated';
                 $return['status']=3;
                 $return['data']='null';
             
          }
          else
          {
               if(rating::insert(['user_id'=>$request->userid,'listing_id'=>$request->listing_id,'name'=>$request->name,'website'=>$request->website,'comment'=>$request->comment,'rating'=>$request->rating]))
               {
                     $last_insert_id = DB::getPdo()->lastInsertId(); 
                     $key =rating::where('id',$last_insert_id)->first()->toArray();
                     $listing_id=rating::where('listing_id',$request->listing_id)->get();
                     Notifications::insert(['user_id'=>$request->userid,'reviewed_id'=>$request->listing_id,'type'=>5]);
                     $count=count($listing_id);
                     foreach ($listing_id as $key) {
                     $sum[]=$key->rating;
                     }
                     $sums=array_sum($sum);
                   
                     $round= round($sums/$count,1);
                  
                     $data['rating']=$round;
                     
                     
                     $data['count']=$count;
                
                     $data['rating_data'] = rating::leftjoin('users','users.id', '=','rating.user_id')->select('rating.*','users.*','rating.id')->where('rating.user_id',$key->user_id)->where('rating.listing_id',$key->listing_id)->get()->toArray();
                  
                     
                     
                     
                      $return['message']='';
                     $return['status']=1;
                     $return['data']=$data;
       
               }
      else
      {
       $return['message']='internal error';
       $return['status']=0;
       $return['data']='null';
      } 
          }
   }
      else{
       $return['message']='you cant rate your own listings';
       $return['status']=2;
       $return['data']='null';
      }
      return json_encode($return);  
   }
   
   public function Add_to_favorites(Request $request)
   {  
       $notes = favourite_listings::where('user_id','=',$request->userid)->where('listing_id','=',$request->id)->get();
       if(empty($notes))
       {
           $notes = $notes->toArray();
                   favourite_listings::where('user_id',$request->userid)->where('listing_id',$request->id)->restore();
                    $return['message']='restored';
                    $return['status']=1;
                    $return['data']='null';
       }else
       {
            if(favourite_listings::insert(['user_id'=>$request->userid,'listing_id'=>$request->id]))
            {
                $return['message']=' added to favourites';
                $return['status']=1;
                $return['data']='null';
            }
            else
            {
                $return['message']='failed';
                $return['status']=0;
                $return['data']='null';
            }
       }
     
       return json_encode($return);  
   }
   
   public function remove_favourite_listings(Request $request)
   {
        if(favourite_listings::where('user_id',$request->userid)->where('listing_id',$request->listing_id)->delete())
        {
            $return['message']='Removed from favourites';
            $return['status']=1;
            $return['data']='null';
        }
        else{
            $return['message']='failed';
            $return['status']=0;
            $return['data']='null';
        }
    return json_encode($return);  
   }
   
   public function get_all_favourites(Request $request)
   {
       if($request->input('id'))
       { 
          $all_fav=  favourite_listings::where('user_id',$request->userid)->where('listing_id',$request->id)->get();
       }else
       { 
         $all_fav=  favourite_listings::where('user_id',$request->userid)->get();   
       }
        if(!empty($all_fav) && count($all_fav) > 0)
        {
            $return['message']='favourites';
            $return['status']=1;
            $return['data']=$all_fav;
        }
        else{
            $return['message']='';
            $return['status']=0;
            $return['data']='null';
        }
    return json_encode($return); 
   }
   
  //---my_lisitngs----------------
     public function my_listings(Request $request)
   {
      $return=[];
      $total=listing::where('status',1)->where('user_id',$request->userid)->count();
       $profile=User::where('id',$request->userid)->get();
       $listing=listing::where('status',1)->where('user_id',$request->userid)->orderBy('created_at','DESC')->offset($request->skip)->limit($request->limit)->get();
        $new_add=array();
        if(!empty($listing)){
              foreach ($listing as $key) {
      $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
      $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key['image'] = images::select('name')->where('listing_id',$key->id)->get()->toArray();
      $key['category'] = categories::select('category')->where('id',$key->category_id)->first();
      
      $key['fav']= DB::table('favourite_listings')->where('listing_id',$key->id)->get()->toArray();  
      $key['days_time']= days_time::where('listing_id',$key->id)->get()->toArray();
          $key['reviews']= DB::table('rating')
                            ->select('users.*','rating.*','rating.id as id','users.id as userid')
                            ->leftJoin('users', 'users.id', '=', 'rating.user_id')
                            ->where('listing_id',$key->id)
                            ->get();
                $address = str_replace(",", "+", $key->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    //$new_add[$k]->lat = $response_a->results[0]->geometry->location->lat;
                   // $new_add[$k]->long = $response_a->results[0]->geometry->location->lng;
                    $key['lat'] = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $key['long'] = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $key['lat'] = '';
                     $key['long'] = '';
                }
    
      $new_add[] = $key;
    }
        }
    
        if(!empty($new_add))
              {                 $return['message']='my lisitngs';
                                $return['status']=1;
                                $return['data']=$new_add;
                                $return['total']=$total;
              }
          else{                 $return['message']='no data';
                                $return['status']=0;
                                $return['data']=null;
              }
   
           return json_encode($return); 
   }   

   //---favourite_listings----------
     public function fav(Request $request)
   {    
     $return=[];  
     $new_add=array();
   $list_id=favourite_listings::where('user_id',$request->userid)->orderBy('created_at','DESC')->offset($request->skip)->limit($request->limit)->get();

 
   if(count($list_id)>0){
    foreach ($list_id as $key){
      $ids[]=$key->listing_id;
    }
      $total= count($ids);
    $data=listing::where('status',1)->whereIn('id',$ids)->get();
      
    foreach ($data as $key) {
      $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
      $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key['image'] = images::select('name')->where('listing_id',$key->id)->get()->toArray();
      $key['category'] = categories::select('category')->where('id',$key->category_id)->first();
      $key['fav'] = favourite_listings::where('id',$key->id)->get()->toArray();
      $key['days_time']= days_time::where('listing_id',$key->id)->get()->toArray();
    //   $key['reviews']=rating::leftwhere('listing_id',$key->id)->get()->toArray();
    //   $query=rating::leftjoin('users', 'category.id', '=', 'listings.category_id')->where('listings.status',1)->select('listings.*','category.category');
      $key['reviews']= DB::table('rating')
                            ->select('users.*','rating.*','rating.id as id','users.id as userid')
                            ->leftJoin('users', 'users.id', '=', 'rating.user_id')
                            ->where('listing_id',$key->id)
                            ->get();
                            
          $address = str_replace(",", "+", $key->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK')
                    //$new_add[$k]->lat = $response_a->results[0]->geometry->location->lat;
                   // $new_add[$k]->long = $response_a->results[0]->geometry->location->lng;
                    $key['lat'] = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                    $key['long'] = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';
                }else
                {
                     $key['lat'] = '';
                     $key['long'] = '';
                }
      $new_add[] = $key;
    }
  }
   if(!empty($new_add)){
       $return['data']=$new_add;
       $return['status']=1;
       $return['total']=$total;
       
   } else {
        $return['data']=NULL;
        $return['status']=1;
   }
    return json_encode($return); 

   }

  //=====================================================
  
       //---filter_listings--------
     public function filter_listings(Request $request)
   {
    // dd($request->all());die();
    $where=array();
    $data=array(); 
      $query=listing::leftjoin('category', 'category.id', '=', 'listings.category_id')->where('listings.status',1)->select('listings.*','category.category');
           if($request->location)
      { 
        // $query->where('listings.address',$request->location); 
         $loc= $request->location;
                  $query->where(function($query) use ($loc){
                    $query->where('listings.address',$loc); 
                 });
      }
      
                  if($request->category)
      { 
        // $query->where('listings.category_id',$request->category);  
        $cat= $request->category;
         $query->where(function($query) use ($cat){
                    $query->where('listings.category_id',$cat); 
                 });
      }
      
            if($request->keywords)
      { 
           $keywrds= $request->keywords;
           $query->where(function($query) use ($keywrds){
        $query->where('listings.title','LIKE','%'.$keywrds.'%')->orWhere('listings.address','LIKE','%'.$keywrds.'%')->orWhere('listings.phone','LIKE','%'.$keywrds.'%')->orWhere('category.category','LIKE','%'.$keywrds.'%');     
             });
      }
    
   
          if(!empty($request->tags))
      { 
             $results=array();
             foreach($request->tags as $key)
        {   
             $query->whereRaw("find_in_set('$key',listings.tags)")->offset($request['skip'])->limit($request['limit'])->orderBy('id', 'desc')->get();  
          if(!empty($check))
             {
                $results[]=$check;
             }
        }
      }

      DB::enableQueryLog();
      $results= $query->offset($request['skip'])->limit($request['limit'])->orderBy('listings.created_at', 'desc')->get()->toArray();
      if(!empty($results))  $counts =count($results);
      else  $counts=0;

    //=====getting ids of favourite lists============//
     $favourite=favourite_listings::get();          //
      if(count($favourite)>0){                     //
      foreach ($favourite as $key)                //
       {                                         // 
        $ids[]=$key->listing_id;                //
      }                                        //
      }                                       //
      else                                   //
      {                                     //
        $ids=array();                      //
      }                                   //
    //===================================//
      // echo"<pre>";
      // print_r($results);die();
      if(!empty($results))
{
      $new_add = array(); 
     
        foreach ($results as $key)
    {  $key['days_time']=days_time::where('listing_id',$key['id'])->get()->toArray();
       $key['overall_rating']=rating::where('listing_id',$key['id'])->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['id'])->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key['id'])->groupBy('listing_id')->get()->toArray();
        $key['fav']=favourite_listings::where('user_id',Auth::id())->where('listing_id',$key['id'])->get()->toArray();
       $new_add[] = $key;
    }
  }

         $data['data'] = '';
      if(!empty($new_add)){
      $data['data']=$new_add;
      $data['status']=1;
      $data['total']=count($new_add);
          
      }
      else{
      $data['data']=null;
      $data['status']=1;
    }
//       echo "<pre>";
//   print_r($new_add);die();
//   die();
     echo json_encode($data);
  }
  
  public function checkapi(Request $request){
      print_r(getallheaders());
  }
  
     
        //---search_deals---------------
     public function filter_deals(Request $request)
   {      
         $max=Deals::select('id')->orderBy('discount','DESC')->limit(5)->get()->toArray();
      $maxid=[];
      foreach($max as $key){
          $maxid[]=$key['id'];
      }
    $where=array();
    $data=array(); 
    $loc= $request->location;
      $query=deals::
        leftjoin('listings', 'deals.business_name', '=', 'listings.id')
        ->leftjoin('category', 'category.id', '=', 'listings.category_id')
        ->select('deals.*','listings.*','listings.id as id','deals.phone','listings.address','deals.phone','deals.description','listings.title','deals.id as dealid');  
             if($request->location)
      { 
        // $query->where('listings.address',$request->location);  
          $query->where(function($query) use ($loc){
                    $query->where('listings.address',$loc); 
                 });

      }
                if($request->category)
      { 
        // $query->where('listings.category_id',$request->category);     
        $cat= $request->category;
         $query->where(function($query) use ($cat){
                    $query->where('listings.category_id',$cat); 
                 });
      }
      
      if($request->keywords)
      { 
            $keywrds= $request->keywords;
         $query->where(function($query) use ($keywrds){
                    $query->where('listings.title','LIKE','%'.$keywrds.'%')->orWhere('listings.address','LIKE','%'.$keywrds.'%')->orWhere('deals.description','LIKE','%'.$keywrds.'%')->orWhere('deals.phone','LIKE','%'.$keywrds.'%')->orWhere('category.category','LIKE','%'.$keywrds.'%');
                 });
        // $query->where('listings.title','LIKE','%'.$request->keywords.'%')->orWhere('listings.address','LIKE','%'.$request->keywords.'%')->orWhere('deals.description','LIKE','%'.$request->keywords.'%')->orWhere('deals.phone','LIKE','%'.$request->keywords.'%')->orWhere('category.category','LIKE','%'.$request->keywords.'%');     
      }
      
           if(!empty($request->tags))
      { 
             $results=array();
             foreach($request->tags as $key)
        {   
             $query->whereRaw('FIND_IN_SET("'.$key.'", listings.tags)');  

             //->whereRaw("find_in_set('listings.tags',$key)")
           if(!empty($check))
             {
                $results[]=$check;
             }
        }
      }
     
      $results= $query->offset($request['skip'])->limit($request['limit'])->get();
      if(!empty($results))  $counts =count($results);
      else  $counts=0;

    //=====getting ids of favourite lists============//
     $favourite=favourite_listings::get();          //
      if(count($favourite)>0){                     //
      foreach ($favourite as $key)                //
       {                                         // 
        $ids[]=$key->listing_id;                //
      }                                        //
      }                                       //
      else                                   //
      {                                     //
        $ids=array();                      //
      }                                   //
    //===================================//
  //     echo "<pre>";
  // print_r($results);  

      if(!empty($results))
{
      $new_add = array(); 
     
        foreach ($results as $key)
    { 
       $key['overall_rating']=rating::where('listing_id',$key['business_name'])->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['business_name'])->groupBy('listing_id')->count();     
       $key['fav']=favourite_listings::where('user_id',$request->userid)->where('listing_id',$key['business_name'])->get()->toArray();
       $key['reviews']=DB::table('rating')
                        ->leftJoin('users', 'users.id', '=', 'rating.user_id')
                        ->where('listing_id',$key['id'])
                        ->get();
       $new_add[] = $key;
    }
  }
  

 
       $max=Deals::select('id')->orderBy('discount','DESC')->limit(5)->get()->toArray();
       $maxid=[];
       foreach($max as $key){
           $maxid[]=$key['id'];
       }
      foreach ($new_add as $key)
      {
        //   echo'<pre>';print_r($key);die;
       $key['overall_rating']=rating::where('listing_id',$key['id'])->avg('rating');
       if(is_float($key['overall_rating']))
       {
           if($key['overall_rating'] < $key['overall_rating'].'.5')
           {
             $key['overall_rating'] = round($key['overall_rating']).'.5';
           }else
           {
               $key['overall_rating'] = round($key['overall_rating']);
           }
       }
      $country = DB::table('countries')->where('country_id',$key['country'])->pluck('country_name')->first();
      $key['country']= !empty($country) ? $country : null;
       if(in_array($key['dealid'],$maxid))
       {
        $key['tag_hot'] =1;  
       }else
       {
         $key['tag_hot'] =0;  
       }
       
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['id'])->groupBy('listing_id')->count();
       $key['listing_data']=listing::where('status',1)->where('id',$key['id'])->first();
       
       if(isset($key['listing_data']->address) && !empty($key['listing_data']->address))
           {
               $add = $key['listing_data']->address;
                $address = str_replace(",", "+", $key['listing_data']->address);
               $prepAddr = str_replace(' ','',$address); 

               $url = "https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=AIzaSyAIkAmlsGxoP63HLptMlKqpbgAv7IZBKM4";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_a = json_decode($response);
                if(isset($response_a->status))
                {
                   if($response_a->status=='OK') {
                       $datas['lat'] = isset($response_a->results[0]->geometry->location->lat) ? $response_a->results[0]->geometry->location->lat : '';
                       $datas['long'] = isset($response_a->results[0]->geometry->location->lng) ? $response_a->results[0]->geometry->location->lng : '';}
                }else
                {
                     $datas['lat']= '';
                   $datas['long'] = '';
                }
           }else
           {
              $datas['lat'] = '';
               $datas['long'] = '';
           }
       
            $images=DB::table('images')->where('listing_id',$key['id'])->get();
            $favourite=favourite_listings::where('user_id',$request['userid'])->where('listing_id',$key['id'])->where('deleted_at',null)->count();   
            $days_time=DB::table('days_time')->where('listing_id',$key['id'])->get();
          
            $key['listing_data']['image']=$images;
            $key['listing_data']['fav']=favourite_listings::where('user_id',$request->userid)->where('listing_id',$key['id'])->get()->toArray();
            $key['listing_data']['days_time']=$days_time;
            $key['listing_data']['lat']=$datas['lat'];
            $key['listing_data']['long']= $datas['long'];
            $key['listing_data']['reviews']= DB::table('rating')
                                              ->leftJoin('users', 'users.id', '=', 'rating.user_id')
                                              ->where('listing_id',$key['id'])
                                              ->get();
             $newcat= categories::select('category')->where('id',$key['category_id'])->first(); 
             $key['listing_data']['category']=$newcat['category'];
            // $key['listing_data']['image_favourite']=$datas;
        
       $key['categories']=categories::where('id',$key['category_id'])->first();
       if($key['price'] && $key['discount'])
       {
         $key['price_with_discount']=  $key['price']-($key['price']*$key['discount']/100);
       }else
       {
          $key['price_with_discount']=  null;  
       }
    //   $new_add[] = $key;
      } 
//           echo count($new_add);
//   die;
    //  echo'<pre>';
    //   print_r($new_add);die;

      
 
// print_r($new_add);die;
              $data['data'] = '';
      if(!empty($new_add)){
            $data['data']=$new_add;
            $data['status']=1; 
            $data['total']=count($new_add);
          
      }else{
            $data['data']=null;
            $data['status']=1;   
            }
    return json_encode($data);
   }
  
}
