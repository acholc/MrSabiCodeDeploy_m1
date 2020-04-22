<?php
  namespace App\Http\Controllers\User;
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
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Str;
  use Mail;
  use App\Blog;
  use App\Tags;
  use Carbon\Carbon;
  use App\Contact_emails;
  use App\Notifications;
   use Socialite;


  
  class UserControllers extends Controller
  {
          public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
    }
    
    //test
           public function test()
    {
      return view('Users.login');  
    }
    
  //---index page---
     public function index()
   {     
        $slide_show=Home::get()->toArray();
        $who_we_r=Pages::where('id','28')->get()->toArray();    
          if(!empty($who_we_r))$who_we_are = unserialize($who_we_r[0]['value']);
          else $who_we_are =array();
         $images=images::get();
        $recent_bussiness = DB::table('category')
        ->leftjoin('listings', 'category.id', '=', 'listings.category_id')
        ->select('category.*',DB::raw("count(listings.category_id) as total"))
        ->groupBy('category.id')
        ->orderby('id','desc')->limit(7)->get(); 
        $featured=categories::where('featured',1)->limit(5)->get()->toArray();
        $listings=listing::where('status',1)->limit(10)->get();
  
        $new_add = array(); 
        foreach ($listings as $key)
    {
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
       $category = categories::where('id',$key->category_id)->first();
       $key['cat'] = $category['category'];
       $key['cat_icon'] = $category['icon'];
       $new_add[] = $key;
    }
    
    $text = DB::table('home_text')->first();
    
     $blog = Blog::orderby('created_at','desc')->limit(3)->get();
     if(!empty($blog))
     {
         $blog = $blog->toArray();
           $blog_3=array();
      foreach($blog as $key)
      {
       $key['all_categories']=categories::whereIn('id',explode(',',$key['category']))->get()->toArray();
    
       $blog_3[]=$key;
      }
     }
    //     echo "<pre>";
    //   print_r($blog_3 );die();
    
  

      return view('Users.index',array('featured'=>$featured,'recent_bussiness'=>$recent_bussiness,'listings'=>$new_add,'images'=>$images,'slide_show'=>$slide_show,'who_we_are'=>$who_we_are,'heads'=>json_decode($text->json_all),'blog_3'=>$blog_3));
   }

   //---User login---
     public function User_login(Request $request)
   { 
      if(User::where('email','=',$request->email)->where('active','=',0)->where('status','=',2)->first()===null){
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active'=>0])){
        Session::put('user',Auth::id());
        if($request->non_redirect){
           $response['succ']='1';
        }
        else{
          $response['succ']= redirect()->intended('/')->getTargetUrl();
        }       
      }
      else{

        $response['error']='Invalid Credentials, Try again';
       
      }
      }
      else{
            $response['error']='Dear user, currently your account is disabled, contact the service provider to activate your account agian';
       
      }
      echo json_encode($response);
     

   }

  //---blogs page------------------------
     public function blogs()
   {
        $all_blogs=Blog::get()->toArray();
        $for_all_tags=array();
        $i=0;
        foreach($all_blogs as $key){
        $for_all_tags[] =explode(',',$key['tag']);
        }
          $i=1;                                                           
            if(!is_array($for_all_tags))
             {                                         
             } 
          $result = array(); 
          foreach ($for_all_tags as $key => $value) { 
          if (is_array($value)) { 
          $result = array_merge($result, array_flatten($value)); 
          } 
          else { 
          $result[$key] = $value; 
          } 
          }
          $final_tags=array();
     foreach (array_unique($result) as $key) {
       $final_tags[]=Tags::where('id',$key)->first()->toArray();
     }
       $category = DB::table('category')
        ->leftjoin('listings', 'category.id', '=', 'listings.category_id')
        ->select('category.*',DB::raw("count(listings.category_id) as total"))
        ->groupBy('category.id')
        ->orderby('id','desc')->where(\DB::raw('listings.category_id'),'>',0)->get(); 

      $blog = Blog::orderby('created_at','desc')->paginate(10);
      $recent_blogs=Blog::orderby('created_at','desc')->limit('3')->get()->toArray();
      $new_add=array();
      foreach($blog as $key)
      {
       $key['all_categories']=categories::whereIn('id',explode(',',$key['category']))->get()->toArray();
       $key['all_tags']=Tags::whereIn('id',explode(',',$key['tag']))->get()->toArray();
       $new_add[]=$key;
      }

      // echo "<pre>";
      // print_r($new_add);die();
      if(!empty($new_add)){
              return view('Users.blogs',array('Blog'=>$new_add,'recent_blogs'=>$recent_blogs,'category'=>$category,'paginate'=>$blog,'final_tags'=>$final_tags));
      }
      else{
        return view('Users.error',array('message'=>'No blogs yet','page'=>'Blogs'));
      }

   }

 //---contact page---------------------
     public function contact()
   {
      $contact=Pages::where('id','29')->get()->toArray(); 
      if(!empty($contact)) $contacttUs = unserialize($contact[0]['value']);
      else $contacttUs=array();    
      
      // echo "<pre>";
      // print_r($contacttUs);die();
      return view('Users.contact',array('contacttUs'=>$contacttUs));
   }

  //---about us page--------------------
     public function AboutUs()
   {
      $who_we_r=Pages::where('id','28')->get()->toArray();     
      if(!empty($who_we_r)) $AboutUs = unserialize($who_we_r[0]['value']);
      else $AboutUs=array();      
        // echo "<pre>";
        // print_r($AboutUs);die();
      return view('Users.about',array('AboutUs'=>$AboutUs));
   }

  //---SignIn--------------------------
     public function SignIn()
   {
     if(Auth::check()){
      if(Auth::User()->active==0){
         return back();
      }
      else{
        Auth::logout();
         return view('Users.login');  
      }
     
     }
     else{
       return view('Users.login');  
     }   
   }

 //---register-----------------------
     public function register()
   {
       if(Auth::check()){
      if(Auth::User()->active==0){
         return back();
      }
      else{
        Auth::logout();
         return view('Users.register');  
      }
     
     }
     else{
       return view('Users.register');  
     }
   }

  //---categories-------------------
     public function categories()
   { 
     $data = DB::table('category')->where('category.status','1')
              ->leftjoin('listings', 'category.id', '=', 'listings.category_id')
              ->select('category.*',DB::raw("count(listings.category_id) as total"))
              ->groupBy('category.id')
              ->paginate(10);
      return view('Users.categories',array('data'=> $data));
   }

  //---listing----------------------
     public function listing(Request $request)
   {  
      $favourite=favourite_listings::get();
      if(count($favourite)>0){
      foreach ($favourite as $key) {
        $ids[]=$key->listing_id;
      }
      }
      else{
        $ids=array();
      }
      $category=categories::where('status',1)->get();
      $data=listing::where('status',1)->where('category_id',$request->id)->paginate(10);
      $address=listing::where('status',1)->get(); 
      $new_add = array();   
      foreach ($data as $key)
       {
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
       $key['fav']=favourite_listings::where('user_id',Auth::id())->where('listing_id',$key->id)->get()->toArray();
       $new_add[] = $key;
      }
  //     echo "<pre>";
  // print_r(  $new_add);die();
      $category_data=categories::where('id',$request->id)->get();
      if(!empty($new_add)){
      return view('Users.listing',array('data'=> $new_add,'category_data'=>$category_data,'category'=>$category,'address'=>$address,'favourite'=>$ids,'paginate'=>$data));}
      else{ return view('Users.error',array('message'=>'No listings yet','page'=>'Listings'));}

   }

  //---terms-----------------------
     public function terms()
   {
      $terms=Pages::where('id','11')->get()->toArray();   
      if(!empty($terms))  $term_cond = unserialize($terms[0]['value']);
      else $term_cond=array();
      
        // echo "<pre>";
        // print_r($term_cond);die();
      return view('Users.terms',array('term_cond'=>$term_cond));
   }

  //---privacy-policy-------------
     public function privacy_policy()
   {
      $privacy=Pages::where('id','26')->get()->toArray();   
        if(!empty($privacy)) $privacy_policy = unserialize($privacy[0]['value']);
        else $privacy_policy=array();
      

        // echo "<pre>";
        // print_r($privacy_policy);die();
      return view('Users.privacy-policy',array('privacy_policy'=>$privacy_policy));
   }

  //---add_listing------------------
     public function add_listing()
   {
        $category=categories::get();
        $countries=Countries::get();
        return view('Users.add-listing',array('countries'=>$countries,'category'=>$category));
   }

  //---deals-------------------------
     public function deals()
   {    
       $max=Deals::select('id')->orderBy('discount','DESC')->limit(5)->get()->toArray();
       $maxid=[];
       foreach($max as $key){
           $maxid[]=$key['id'];
       }
    //   echo'<pre>';
    //   print_r($maxid);die;
        $all_deals=Deals::get()->toArray();
           $for_all_tags=array();
         foreach ($all_deals as $key) {
          $business =listing::where('status',1)->where('id',$key['business_name'])->first();
          $key['tags']=$business['tags'];
          $key['categories']=categories::where('id',$business['category_id'])->first();
          $key['address']=$business['address'];
          $for_all_tags[]=$key;         
         }      
        $deals=Deals::paginate(9);
       $new_add = array();   
      foreach ($deals as $key)
       {
       $overall_rating_r=rating::where('listing_id',$key['business_name'])->avg('rating');
       if($overall_rating_r) $key['overall_rating']=$overall_rating_r;
       else $key['overall_rating']=0;
        $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['business_name'])->groupBy('listing_id')->count();
       $key['listing_data']=listing::where('status',1)->where('id',$key['business_name'])->first();
       $key['categories']=categories::where('id',$key['listing_data']['category_id'])->first();
       $new_add[] =$key;
      }
    //   echo'<pre>';
    //   print_r($new_add);die;
    return view('Users.deals',array('data'=>$new_add,'paginate'=>$deals,'for_all_tags'=>$for_all_tags,'maxid'=>$maxid));
   }

  //---listing_detail----------------
     public function listing_detail(Request $request)
   {    

       $lis=listing::where('status',1)->get()->toArray();
     //========popular restaurants==========
      
      $average_last= rating::where('listing_id',$request->id)->avg('rating');
      $asd=array();
      foreach ($lis as $key){
        $key['average'] =rating::where('listing_id',$key['id'])->avg('rating');
        $asd[]=$key;
      }
            // echo "<pre>";

      $pop_cat = array();
      foreach ($asd as $key => $row)
      {
          $average[$key] = $row['average'];
      }
      array_multisort($average, SORT_DESC, $asd);

      foreach ($asd as $key) {
        $key['image']=images::select('name')->where('listing_id',$key['id'])->groupBy('listing_id')->first();
        $pop_cat[]=$key;
        }

      //========popular restaurants==========
     
      $reviews=rating::where('listing_id',$request->id)->get();
      if(Auth::id()){
            $user_listings=listing::where('status',1)->where('user_id',Auth::User()->id)->first();
      }
      else{
         $user_listings=array();
      }
      $images=images::where('listing_id',$request->id)->get();
      $favourite=favourite_listings::where('user_id',Auth::id())->where('listing_id',$request->id)->count();   
      $days_time=days_time::where('listing_id',$request->id)->get();    
      $listing=listing::where('status',1)->where('id',$request->id)->first();
      $check_review = rating::where('listing_id',$request->id)->where('user_id',Auth::id())->count();
    //   echo'<pre>';
    //   print_r($reviews);die; 
      if(!empty($listing)){
      return view('Users.listing-detail',array('listing'=>$listing,'days_time'=>$days_time,'favourite'=>$favourite,'images'=>$images,'user_listings'=>$user_listings,'reviews'=>$reviews,'popular'=>$pop_cat,'check_review'=> $check_review,'last_average'=>$average_last));}
      else{
        return view('Users.error',array('message'=>'Sorry, data not found','page'=>'Listing Details'));
      }


   }

  //---blog_detail-------------------
     public function blog_details(Request $request)
   {
      $comment_data=array();
      $comment_data=blog_comments::where('blog_id',$request->id)->get()->toArray();
      //     echo "<pre>";
      //      print_r($comment_data);
      // die();
      $new_array=array();
      foreach ($comment_data as $key) {
       $key['user']=user::where('id',$key['user_id'])->first()->toArray();
       $new_array[]=$key;

      }
      // echo "<pre>";
      //      print_r($new_array);
      // die();
      $comment_data['user']=

       $category = DB::table('category')
        ->leftjoin('listings', 'category.id', '=', 'listings.category_id')
        ->select('category.*',DB::raw("count(listings.category_id) as total"))
        ->groupBy('category.id')
        ->orderby('id','desc')->where(\DB::raw('listings.category_id'),'>',0)->get(); 
      // echo "<pre>";
      // print_r($recent_bussiness);die();
      $blog = Blog::where('id',$request->id)->get()->toArray();
      $recent_blogs=Blog::orderby('created_at','desc')->limit('3')->get()->toArray();
      $new_add=array();
      foreach($blog as $key)
      {
       $key['all_categories']=categories::whereIn('id',explode(',',$key['category']))->get()->toArray();
       $key['all_tags']=Tags::whereIn('id',explode(',',$key['tag']))->get()->toArray();
       $new_add[]=$key;
      }
      // echo "<pre>";
      // print_r($new_add);die();

      return view('Users.blog-detail',array('Blog'=>$new_add,'recent_blogs'=>$recent_blogs,'category'=>$category,'comment_data'=>$new_array));

   }

  //---forgot_password----------------
     public function forgot_password()
   {
      return view('Users.forgot-password');
   }

  //---user_logout-------------------
     public function user_logout()
   {
       Session::forget('user'); 
       Auth::logout();
       return redirect(\URL::previous());
   }

  //---RegisterData------------------
     public function RegisterData(Request $request)
   {
         if(User::where('email', '=', $request->email)->first() === null)
      {
        User::insert(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
        $last_insert_id =  DB::getPdo()->lastInsertId(); 
        $user = User::find($last_insert_id);
        Auth::login($user);
        Notifications::insert(['type'=>'1','user_id'=>$last_insert_id]);
        $response['status'] = 102;
      }
         else
      {
         $response['status'] = 103;
      }
         echo json_encode($response);

   }

  //---all_lisitngs----------------
     public function all_listings()
   {
       
       $profile=User::where('id',Auth::id())->get();
       $listing=listing::where('status',1)->where('user_id',Auth::id())->orderBy('created_at','DESC')->paginate(10);
        $new_add=array();
      foreach ($listing as $key) {
      $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
      $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
      $new_add[] = $key;
    }
        if(!empty($new_add))return view('Users.all-listings',array('listing'=>$new_add,'paginate'=>$listing));
          else return view('Users.error',array('message'=>"You don't have any listing yet",'page'=>'Listings'));
          
   }

  //---edit_profile---------------
     public function edit_profile()
   {
      return view('Users.edit-profile'); 

   }

  //---add_listing_data------------
     public function add_listing_data(Request $request)
   {   
       
        
               $prepAddr = str_replace(' ','',$request->address_description); 

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
              
   listing::insert(['lat'=>$datas['lat'],'lng'=>$datas['long'],'user_id'=>Auth::id(),'title'=>$request->title,'category_id'=>$request->category,'description'=>$request->description,'tags'=>$request->tags,'phone'=>$request->phone,'mail'=>$request->email,'website'=>$request->website,'pincode'=>$request->pincode,'address'=>$request->address_description,'country_id'=>$request->country,'state_id'=>$request->state,'city'=>$request->city]);  
     $last_insert_id =  DB::getPdo()->lastInsertId(); 
     Notifications::insert(['user_id'=>Auth::id(),'type'=>3,'added_list_id'=>$last_insert_id]);
     images::whereIn('id',explode(',',$request->photos[0]))->update(['listing_id' =>$last_insert_id]); 
     if(!empty($request->day)){
          $i = 0;
          foreach ($request->day as $key) {
            if($key){
              days_time::insert(['day'=>$key,'opening_hour'=>$request->opening_hour[$i],'closing_hour'=>$request->closing_hour[$i],'listing_id'=>$last_insert_id]);   
              $i++;

            }
          }
     }
              
              
              
                }
                
                
               
 
                    
                
 
 
   }

  //---upload images by dropdown--------------
      public function check(Request $request)
   {           
            $random = Str::random(4);              
            $image =$request->file('file');
            $name =time().$random.$request->file->getClientOriginalName();
            $real_name= preg_replace("/[^a-z0-9\_\-\.]/i", '',$name); // Removes special chars.
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$real_name);
            images::insert(['name'=>$real_name]);
            return DB::getPdo()->lastInsertId();         
   }

   //---edit_listing-----------------------
      public function edit_listing(Request $request)
   {      

          $category=categories::get();
          $countries=Countries::get();
          $data=listing::where('status',1)->where('id',$request->id)->first();             
          $images = images::where('listing_id',$request->id)->get(); 
          $days_time= days_time::where('listing_id',$request->id)->get(); 
          $state_id= States::where('state_id',$data->state_id)->first(); 
          $states=States::where('country_id',$data->country_id)->get();      
          return view('Users.edit-listing',array('data'=>$data,'images'=>$images,'countries'=>$countries,'days_time'=> $days_time,'category'=>$category,'state_id'=>$state_id,'states'=>$states)); 
      
   }
  //---edit_listing--------------------
      public function delete_listing(Request $request)
   {           
            $images_name=images::where('listing_id',$request->id)->get();
            foreach ($images_name as $key){
              if(!empty($key)){
              unlink('public/images/'.$key->name);
            }
            }
          if(images::where('listing_id','=',$request->id)===null) {
            listing::where('id',$request->id)->delete();
            days_time::where('listing_id',$request->id)->delete();
            favourite_listings::where('listing_id',$request->id)->delete();
            deals::where('business_name',$request->id)->delete();
            DB::table('rating')->where('listing_id', $request->id)->delete();
            $response['status'] =103;  
          } else {
            listing::where('id',$request->id)->delete();
            images::where('listing_id',$request->id)->delete();
            days_time::where('listing_id',$request->id)->delete();
            favourite_listings::where('listing_id',$request->id)->delete();
            deals::where('business_name',$request->id)->delete();
            DB::table('rating')->where('listing_id', $request->id)->delete();
            $response['status'] =103;
          }
       
            echo  json_encode($response);
  }

  //---cities--------------------
     public function cities(Request $request )
   {

    $country = (countries::where('country_id',$request->country)->get())[0]->country_id;

    $city=states::where('country_id',$country)->get();
    echo '<option value="State">State</option>';
    foreach ($city as $key) {
      echo'<option value="'.$key->state_id.'">'.$key->state_name.'</option>';
    }

   }

  //---delete_user_images--------------
     public function delete_user_images(Request $request)
   {  
    if(images::where('id',$request->id)->where('listing_id',$request->listing_id)->delete()){
    }    

   }

  //---update_listing_data-------------
     public function update_listing_data(Request $request)
   { 
   // dd($request->all());die(); 
     if(listing::where('status',1)->where('id',$request->list_id)->update(['title'=>$request->title,'category_id'=>$request->category,'description'=>$request->description,'tags'=>$request->tags,'phone'=>$request->phone,'mail'=>$request->email,'website'=>$request->website,'pincode'=>$request->pincode,'address'=>$request->address_description,'country_id'=>$request->country,'state_id'=>$request->state,'city'=>$request->city])){
         Notifications::insert(['user_id'=>Auth::id(),'type'=>4,'edited_list_id'=>$request->list_id]);
       images::whereIn('id',explode(',',$request->photos[0]))->update(['listing_id' =>$request->list_id]);

          if(!empty($request->day))
      {
          $i = 0;
          foreach ($request->day as $key)
          {
            if($key){
              if($request->entry_exsist[$i]){
                   days_time::where('id',$request->entry_exsist[$i])->update(['day'=>$key,'opening_hour'=>$request->opening_hour[$i],'closing_hour'=>$request->closing_hour[$i],'listing_id'=>$request->list_id]);
              }else{
                    days_time::insert(['day'=>$key,'opening_hour'=>$request->opening_hour[$i],'closing_hour'=>$request->closing_hour[$i],'listing_id'=>$request->list_id]);
              }
                 
              $i++;

            }
          }

     }}
   }
  //---delete_day_time----------
     public function delete_day_time(Request $request)
   {  
     days_time::where('listing_id',$request->listing_id)->where('id',$request->id)->delete();
     echo$request->id;
   }

  //---edit_profile_data--------
     public function edit_profile_data(Request $request)
   {  
       if(User::where('email','=',$request->email)->where('id','!=',Auth::id())->first()===null){
             if($request->profile_pic)
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
             $name =Auth::User()->profile_image;
             $response['pic'] =Auth::User()->profile_image;
         }     
          $id = User::where('id',Auth::id())->first();
            
            if(Hash::check($request->oldpassword,$id->password))
         {
        User::where('id',Auth::User()->id)->update(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->newpassword),'profile_image'=>$name]);
            $response['status']=102;        
         }
         else
        {  
        $response['status']=104; 
        }

       if(!isset($request->oldpassword))
       {      
        User::where('id',Auth::User()->id)->update(['name'=>$request->name,'email'=>$request->email,'profile_image'=>$name]);
          $response['status']=103;
       }
       }
       else{
        $response['status']=105;
       }      
         echo json_encode($response);   
   }

  //---reset_password----------
     public function reset_password(Request $request)
   {
        if(User::where('email','=',$request->email)->where('active',0)->first()===null){
           echo'103';
    }
       else{
           $mail=$request->email;
          $name= User::where('email',$request->email)->first()->name;         
          $long_token= md5(mt_rand(10000,99999).time() . $request->email);
          $token = substr($long_token,0,10); 
          password_reset::insert(['email'=>$request->email,'token'=>$token]);    
          Session::put('password_reset_mail',$request->email);
          $message=url('')."/password-reset?token=".$token;
        $data = array(       
        'subject' => 'Password reset',
        'bodyMessage' => $message,
        'postersemail' => $mail
     
        );
          echo Mail::send('Users.mailmessage',$data,function($message) use ( $data)
          {      
                $message->to($data['postersemail'] );
                $message->subject($data['subject']); 
          });

       }
   }
  //---password_reset----------
     public function password_reset(Request $request)
   {
     if(password_reset::where('token','=',$request->token)->first()===null){
         
        return redirect()->route('forgot-password')->with('error','Confirmation link expired, Please try again');   
     }
     else{
      password_reset::where('token','=',$request->token)->delete();
      return view('Users.change-password');
     }

   }

  //---change_password---------
     public function change_password(Request $request)
   {
     
    if(User::where('email',Session::get('password_reset_mail'))->update(['password'=>Hash::make($request->newpassword)])){
      $email=User::where('email',Session::get('password_reset_mail'))->first();
      Notifications::insert(['type'=>'2','user_id'=>$email['id']]);
      echo'1';
    }
    else{
      echo'2';
    }

   }
  //---Add_to_favorites-----------
     public function Add_to_favorites(Request $request)
   {
     if(empty(favourite_listings::where('user_id','=',Auth::id())->where('listing_id','=',$request->id)->first())){
     if(favourite_listings::insert(['user_id'=>Auth::id(),'listing_id'=>$request->id]))
            {

              echo'1';
            }
            else
            {
              echo'0';
            }
          }
            else{
                favourite_listings::where('user_id',Auth::id())->where('listing_id',$request->id)->restore();
             echo "2";
            }

   }

   //---favourite_listings----------
     public function favourite_listings(Request $request)
   {
     $new_add=array();
   $list_id=favourite_listings::where('user_id',Auth::id())->paginate(10);
   // echo "<pre>";
   // print_r($list_id);die();
   if(count($list_id)>0){
    foreach ($list_id as $key){
      $ids[]=$key->listing_id;
    }
    $data=listing::where('status',1)->whereIn('id',$ids)->get();
      
    foreach ($data as $key) {
      $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
      $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
      $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
      $new_add[] = $key;
    }
  }
   if(!empty($new_add))return view('Users.favourite_listings',array('listing'=>$new_add,'paginate'=>$list_id));
          else return view('Users.error',array('message'=>"You don't have added any listing to favourite yet",'page'=>'Favourite listings'));
   

   }

    //---remove_favourite_listings-------
     public function remove_favourite_listings(Request $request)
   {
     
     
         if(favourite_listings::where('user_id',Auth::id())->where('listing_id',$request->id)->delete()){
          echo'1';
         }
         else{
          echo'0';
         }
   }
/////

    // dd($request->all());die();
    // $where=array();
    // $data=array(); 
    //   $query=listing::where('status',1)->select('*');
    //   if($request->keywords)
    //   { 
    //     $query->where('title','LIKE','%'.$request->keywords.'%')->orWhere('address','LIKE','%'.$request->keywords.'%')->orWhere('phone','LIKE','%'.$request->keywords.'%');     
    //   }
    //      if($request->location)
    //   { 
    //     $query->where('address',$request->location);     
    //   }
    //         if($request->category)
    //   { 
    //     $query->where('category_id',$request->category);     
    //   }
    //       if(!empty($request->tags))
    //   { 
    //          $results=array();
    //          foreach($request->tags as $key)
    //     {   
    //          $query->whereRaw("find_in_set('$key',tags)")->get();  
    //       if(!empty($check))
    //          {
    //             $results[]=$check;
    //          }
    //     }
    //   }
/////
     //---filter_listings--------
     public function filter_listings(Request $request)
   {
    // dd($request->all());die();
    $where=array();
    $data=array(); 
      $query=listing::leftjoin('category', 'category.id', '=', 'listings.category_id')->where('listings.status',1)->select('listings.*');
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
             $query->whereRaw("find_in_set('$key',listings.tags)")->get();  
           if(!empty($check))
             {
                $results[]=$check;
             }
        }
      }

      DB::enableQueryLog();
      $results= $query->get()->toArray();
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
    { 
       $key['overall_rating']=rating::where('listing_id',$key['id'])->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['id'])->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key['id'])->groupBy('listing_id')->get()->toArray();
        $key['fav']=favourite_listings::where('user_id',Auth::id())->where('listing_id',$key['id'])->get()->toArray();
       $new_add[] = $key;
    }
  }
  // echo "<pre>";
  // print_r($new_add);die();
  // die();
         $data['data'] = '';
      if(!empty($new_add)){
        $i=0;
        $idarray=[];
        $ratearray=[];
      foreach ($new_add as $value)
      {   
          $idarray[]=$value['id'];
          if($value['overall_rating'])  $ratearray[]=$value['overall_rating'];
          else  $ratearray[]=0;
      
        // print_r($value);
        // die();
        if(!empty($value)){
        
          // print_r($value['image'][0]['name']);
          // die();
          $data['data'].='<div class="col-md-12">
                                <div class="recent-places-box list-style">
                                   <div class="recent-place-thumb mbwidth">
                                      <a href="'.route("listing-detail",$value['id']).'" title="">';
                                if(!empty($value['image']) && file_exists('public/images/'.$value['image'][0]['name']))
                                       $data['data'].='<img src="'.URL("public/images/").'/'.$value['image'][0]['name'].'" alt="" />';
                                     else  $data['data'].=' <img src="'.URL("public/images/default-small.jpg").'" alt="" />';                                
                                        $data['data'].='</a>
                                   </div>
                                   <div class="recent-place-detail">
                                      <div class="listing-box-title">
                                         <h3><a href="'.route("listing-detail",$value['id']).'" title="">'.$value['title'].'</a></h3>
                                         <span>'.$value['address'].'</span>
                                         <span>'.$value['phone'].'</span>
                                      </div>
                                      <div class="listing-rate-share">
                                         <div class="rated-list">';
                                          $data['data'].='<div id="'.$value['id'].'"></div>';
                                          
                                //                  if($value['overall_rating']>4.5){
                   
                                //      $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>';}
                                //   elseif($value['overall_rating']>3.5){
                                //      $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']>2.5){
                                //   $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']>1.5){
                                //   $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']>0){
                                //   $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']==0){
                                //     $data['data'].='<b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}   

                      $data['data'].='<span>';
                      if($value['total_reviews']==0) $data['data'].= 'No Review';
                      elseif($value['total_reviews']==1) $data['data'].='(1) Review';
                      elseif($value['total_reviews']) $data['data'].='('.$value['total_reviews'].') Reviews';                     
                      $data['data'].='</span>';         
                                          $data['data'].='</div>
                                      </div>
                                      <div class="share-favourite mnfav" id="'.$value['id'].'">';
                                     
                                    if(Auth::id())   
                            {
                                                                   
                                          if(isset($value['fav'][0]['id']))
                                          {
                                          $data['data'].='<a href="javaScript:void(0)" title="" class="remove" style="text-decoration: none;"><i class="la la-heart orng"></i></a>';
                                          }
                                          else
                                          {
                                          $data['data'].='<a href="javaScript:void(0)" title="" class="remove" style="text-decoration: none;"><i class="fa fa-heart-o"></i></a>';
                                          }
                            }                       
                           
                          else
                          {
                            $data['data'].='<a href="javaScript:void(0)" title="" class="remove" style="text-decoration: none;">
                              <i class="la la-heart-o"></i></a>';
                            }                                            
                         
                                       $data['data'].='</div>
                                   </div>
                                </div>
                             </div> ';
                            $i++;
                           }
        }
        $data['idarray']=$idarray;
        $data['ratearray']=$ratearray;
        
        $data['count']=$i;
      }
      else{
       $data['data']='<div class="col-md-12">
                          <h3 class="text-center">No data found</h3>
                               </div>';
        $data['count']=0;                        
    }
       $category=categories::where('id',$request->category)->first();
      $data['search_for']='<div class="ser_res res_for">Results for </div>';
       $data['search_for'].='';
     if($request->keywords){$data['search_for'].= '<div class="ser_res"><span>keywords:</span> '.$request->keywords.'</div>';}
     if($request->location){$data['search_for'].= '<div class="ser_res"><span>Location:</span> '.$request->location.'</div>';}
     if($request->category){$data['search_for'].='<div class="ser_res"><span>category:</span> '. $category->category.'</div>';} 
     if($request->tags){$data['search_for'].='<div class="ser_res"><span>tags:</span> '.implode(', ',$request->tags).'</div>';} 
     if(empty($request->tags) && !$request->keywords && !$request->location && !$request->category){$data['search_for'].='All records';$data['count']=$counts;} 
     echo json_encode($data);
  }

  //search listings for index page
     public function search_listings(Request $request)
   {
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
         $data = listing::where('status',1)->select('*');
       if(!empty($request->keywords) || !empty($request->location)){
           $data = listing::leftjoin('category', 'category.id', '=', 'listings.category_id')->where('listings.status',1)->select('listings.*');
             if($location){
        $data = $data->where('listings.address',$location);
      }
      if($keywords){
        $data = $data->where('listings.title','LIKE','%'.$keywords.'%')->orWhere('listings.address','LIKE','%'.$request->keywords.'%')->orWhere('listings.phone','LIKE','%'.$request->keywords.'%')->orWhere('category.category','LIKE','%'.$request->keywords.'%');;
      }
    
      $data = $data->paginate(10);
      $search_for='<div class="ser_res res_for">Results for</div>';
     if($keywords)
     {
       $search_for.='<div class="ser_res"><span>keywords:</span> '.$keywords.'</div>';
     }
       if($location)
     {     
     $search_for.='<div class="ser_res"><span>Location:</span> '.$location.'</div>';
     }

       }
       else{
             $data = $data->paginate(10);
             $search_for='Write a review';
       }
        $new_add = array();   
        foreach ($data as $key)
      {
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
         $key['fav']=favourite_listings::where('user_id',Auth::id())->where('listing_id',$key->id)->get()->toArray();
       $new_add[] = $key;
      } 
      // echo "<pre>";
      // print_r( $new_add);
      // die();


    if(!empty($favid)){
        $category_data=categories::whereIn('id',$favid)->get();
    }
    else{
       $category_data =array();
    }
       if(!empty($new_add)){
      return view('Users.listing',array('data'=>$new_add,'category_data'=>$category_data,'category'=>$category,'address'=>$address,'favourite'=>$ids,'search_for'=>$search_for,'location'=>$location,'paginate'=>$data));}
      else{
        return view('Users.error',array('message'=>'No result found','page'=>'Listings'));
      }
   }
     //---save rating data---
     public function rating(Request $request)
   {
       
   if(listing::where('status',1)->where('id','=',$request->listing_id)->where('user_id','=',Auth::id())->first() === null){
         if(rating::where('listing_id',$request->listing_id)->where('user_id',Auth::id())->count() > 0){ $data['result']=101;}
         else{
              if(rating::insert(['user_id'=>Auth::id(),'listing_id'=>$request->listing_id,'name'=>$request->name,'email'=>$request->email,'website'=>$request->website,'comment'=>$request->comment,'rating'=>$request->rating])){
        $last_insert_id = DB::getPdo()->lastInsertId(); 
       $key =rating::where('id',$last_insert_id)->first()->toArray();
       $listing_id=rating::where('listing_id',$request->listing_id)->get();
       Notifications::insert(['user_id'=>Auth::id(),'reviewed_id'=>$request->listing_id,'type'=>5]);
       $count=count($listing_id);
       foreach ($listing_id as $key) {
       $sum[]=$key->rating;
       }
       $average_last= rating::where('listing_id',$request->listing_id)->avg('rating');
       $sums=array_sum($sum);
       $data['random'] =str::random(4);
       $round= round($sums/$count,1);
       $data['count']=$count;
        $data['indirate']=$request->rating;
       // echo'<pre>';
       // print_r(  $key['id']);die();
        
        $data['result']='';
        $data['average']='';
        $data['average'].=$average_last;
        
       
      
        $data['result'].='<li class="'.$data['random'].'">
                          <div class="review-list">
                              <div class="review-avatar"> <img src="'.URL("UserAssets/images/resource/r1.jpg").'"  alt="" /> </div>
                              <div class="reviewer-info">
                                 <h3><a href="#" title="">'.ucwords($key['name']).'</a></h3>
                                 <span>'.$key['created_at'].'</span>
                                 <p>'.$key['comment'].'</p>
                              </div>
                              <div class="reviewer-stars">';
                                 $data['result'].='<div id="rateYoyo"></div>';
                               $data['result'].= '</div>
                           </div>
                        </li>';
       
     }
     else
     {
       $data['result']=2;
     } 
         }
   }
     else{
       $data['result']=3;
     }
     echo json_encode($data);  
   }

   //search_by_tag
     public function search_by_tag(Request $request,$tag)
   {  $tags=$request->id;        
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
         $data = listing::where('status',1)->select('*');
       if($tags){
           $data = listing::where('status',1)->whereRaw("find_in_set('$tags',tags)")->paginate();
    
           $search_for='<div class="ser_res res_for">Results for</div>';    
   
           $search_for.='<div class="ser_res"><span>Tag:</span> '.$tags.'</div>';
     

       }
       else{
             $data = $data->paginate();
             $search_for='Write a review';
       }
        $new_add = array();   
        foreach ($data as $key)
      {
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key->id)->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key->id)->groupBy('listing_id')->get()->toArray();
         $key['fav']=favourite_listings::where('user_id',Auth::id())->where('listing_id',$key->id)->get()->toArray();
       $new_add[] = $key;
      } 
    if(!empty($favid)){
        $category_data=categories::whereIn('id',$favid)->get();
    }
    else{
       $category_data =array();
    }
       if(!empty($new_add)){
      return view('Users.listing',array('data'=>$new_add,'category_data'=>$category_data,'category'=>$category,'address'=>$address,'favourite'=>$ids,'search_for'=>$search_for,'tags'=>$tags,'paginate'=>$data));}
      else{
        return view('Users.error',array('message'=>'No listings yet','page'=>'Listings'));
      }
   }
   
        //---search_deals---------------
     public function search_deals(Request $request)
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
        ->select('deals.*','listings.*','listings.id','deals.phone','listings.address','deals.phone','deals.description','listings.title','deals.id as dealid');  
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
     
      $results= $query->get()->toArray();
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
       $key['fav']=favourite_listings::where('user_id',Auth::id())->where('listing_id',$key['business_name'])->get()->toArray();
       $new_add[] = $key;
    }
  }
// echo'<pre>';
// print_r($new_add);die;
             $data['data'] = '';
                     $idarray=[];
        $ratearray=[];
      if(!empty($new_add)){
        $i=0;
      foreach ($new_add as $value)
      {
          $idarray[]=$value['dealid'];
          if($value['overall_rating'])  $ratearray[]=$value['overall_rating'];
          else  $ratearray[]=0;
        if(!empty($value)){

           $data['data'].=' <div class="col-md-4 col-sm-6 col-xs-12 deal_div">
                  <div class="listing-box list-dels">
                    <div class="listing-box-thumb">
                      <span class="price-list">'.$value['discount'].'% OFF</span>';
                        if(!empty($value['image']) && file_exists('public/deal_images/'.$value['image']))
                                      { $data['data'].='<img src="'.URL("public/deal_images/").'/'.$value['image'].'" alt="" />';}
                                     else   {$data['data'].='<img src="'.URL('public/images/default-small.jpg').'" alt="" />';}
                                    
                       $data['data'].='<div class="listing-box-title">
               
                        <span>'.$value['address'].'</span>
                        
                      </div>
                      <a href="#" class="hert-sv"><i class="la la-heart-o"></i></a>';
                      
                     	if(in_array($value['dealid'],$maxid))$data['data'].='<span class="badge-best">Hot</span>';
							
                   $data['data'].='</div>
                    <div class="listing-rate-share">
                        	<h3><a href="'.route('listing-detail',$value['id']).'" title="">
													'.$value['title'].'
												</a></h3>
													<p>'.$value['description'].'</p>
                        <div class="rated-list">';
                        
                         $data['data'].='<div id="'.$value['dealid'].'"></div>';
                                //       if($value['overall_rating']>4.5){
                   
                                //      $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>';}
                                //   elseif($value['overall_rating']>3.5){
                                //      $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']>2.5){
                                //   $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']>1.5){
                                //   $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']>0){
                                //   $data['data'].='<b class="la la-star orng"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}
                                //   elseif($value['overall_rating']==0){
                                //     $data['data'].='<b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>
                                //   <b class="la la-star-o"></b>';}  
                                   
                                   
                                           $data['data'].='<span>';
                                   if($value['total_reviews']==0) $data['data'].= 'No Review';
                      elseif($value['total_reviews']==1) $data['data'].='(1) Review';
                      elseif($value['total_reviews']) $data['data'].='('.$value['total_reviews'].') Reviews';
                                            $data['data'].='</span>
                                       </div>
                      <a href="deal-details.html" class="rad-mr"><i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
              			<div class="price-str">
              			
              			';
              			if($value['price'] && $value['discount'])$data['data'].=$value['price']-($value['price']*$value['discount']/100);
              			
              			
              			$data['data'].='<strike> $'.$value['price'].'</strike>
              			';
              			
              			if($value['coupon_code']) $data['data'].=' <span class="rigt-cupn"><img src="'.URL('UserAssets/images/coupon.png').'" alt="" />'.$value['coupon_code'].'</span> ';
              			
						$data['data'].='		  
						</div>
                    </div>
                  </div>
                </div>';
                        }
        }
        $data['count']=$i;
          $data['idarray']=$idarray;
        $data['ratearray']=$ratearray;
      }
      else{
       $data['data']='<div class="col-md-12">
                          <h3 class="text-center">No data found</h3>
                               </div>';
        $data['count']=0;                        
    }
       $category=categories::where('id',$request->category)->first();
      $data['search_for']='<div class="ser_res res_for">Results for </div>';
       $data['search_for'].='';
     if($request->keywords){$data['search_for'].= '<div class="ser_res"><span>keywords:</span> '.$request->keywords.'</div>';}
     if($request->location){$data['search_for'].= '<div class="ser_res"><span>Location:</span> '.$request->location.'</div>';}
     if($request->category){$data['search_for'].='<div class="ser_res"><span>category:</span> '. $category->category.'</div>';} 
     if($request->tags){$data['search_for'].='<div class="ser_res"><span>tags:</span> '.implode(', ',$request->tags).'</div>';} 
     if(empty($request->tags) && !$request->keywords && !$request->location && !$request->category){$data['search_for'].='All records';$data['count']=$counts;} 
     echo json_encode($data);

   }
   
   
   function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_ASC, null);
    }

    return function($first, $second) use (&$criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}
   
   //=======deals-details=======
   public function deal_details(Request $request)
   {   
   
     $deal=deals::
      leftjoin('listings','deals.business_name', '=','listings.id')
     ->where('deals.id',$request->id)
     ->select('deals.*','listings.*','deals.id','deals.address','deals.phone')->get();
    //     echo'<pre>';
    //   print_r($deal);die;

      $reviews=rating::where('listing_id',$deal[0]['business_name'])->get();
      if(Auth::id()){
            $user_listings=listing::where('status',1)->where('user_id',Auth::User()->id)->first();
      }
      else{
         $user_listings=array();
      }
      if(Auth::id()){
            $user_listings=listing::where('status',1)->where('user_id',Auth::User()->id)->first();
      }
      else{
         $user_listings=array();
      }

      //       SELECT `listing_id`,COUNT(`listing_id`) AS `value_occurrence` FROM `rating` GROUP BY `listing_id` ORDER BY `value_occurrence` DESC LIMIT 3 
      // popular
      $lis=listing::where('status',1)->get()->toArray();
      $asd=array();
      foreach ($lis as $key){
        $key['average'] =rating::where('listing_id',$key['id'])->avg('rating');
        $asd[]=$key;
      }
            // echo "<pre>";

      $pop_cat = array();
      foreach ($asd as $key => $row)
      {
          $average[$key] = $row['average'];
      }
      array_multisort($average, SORT_DESC, $asd);

      foreach ($asd as $key) {
        $key['image']=images::select('name')->where('listing_id',$key['id'])->groupBy('listing_id')->first();
        $pop_cat[]=$key;
        }
       // echo "<pre>";
       // print_r($pop_cat);die();
      $asd=array();
      $listingss=array();
      $new_adds=array();
         foreach ($listingss as $key)
    {
       $key['overall_rating']=rating::where('listing_id',$key['listing_id'])->avg('rating');
       $key['total_reviews']=rating::select('listing_id')->where('listing_id',$key['listing_id'])->groupBy('listing_id')->count();
       $key['image'] = images::select('name')->where('listing_id',$key['listing_id'])->groupBy('listing_id')->get()->toArray();
       $key['listing_data'] = listing::where('status',1)->where('id',$key['listing_id'])->get()->toArray();
       $new_adds[] = $key;
    }

      ////popular
      $images=images::where('listing_id',$deal[0]['business_name'])->get();
      $favourite=favourite_listings::where('user_id',Auth::id())->where('listing_id',$deal[0]['business_name'])->count();   
      $days_time=days_time::where('listing_id',53)->get();    
      $listing=listing::where('status',1)->where('id',$deal[0]['business_name'])->first();
      $similar = listing::select(DB::raw('distinct listings.id as list_id'),'deals.image as image','rating.rating as rating','listings.*','deals.id as deal_id')
                         ->join('deals','deals.business_name','=','listings.id')
                         ->leftjoin('rating','rating.listing_id','=','listings.id')
                        ->where('listings.category_id',$listing->category_id)
                        ->orderBy('rating','DESC')
                        ->groupBy('list_id')
                        ->limit(3)
                        ->get()->toArray();
                      
                              
                    //     $new_var =array();
                    //     $i=0;
                    //     foreach($similar as $k=> $key){
                    //      $keys['rating']=rating::where('listing_id',$key['list_id'])->first();
                    //      if(!empty( $keys['rating'])){ 
                    //          $new_vars= $keys['rating']->toArray();
                            
                    //          array_push($new_var,$new_vars);
                    //          //$new_var[]=$key; 
                    //      }
                    //     }
                            
                             
                    //   $rate = 0;
                    //   $newrate = array();
                    //   foreach($new_var as $k => $d)
                    //   {
                    //       if($rate==0)
                    //       {
                    //         array_push($newrate,$d);
                    //         $rate = $d['rating'];
                    //       }
                           
                    //       if($d['rating'] < $rate)
                    //       {
                    //           array_unshift($newrate , $d); 
                    //       }
                           
                    //       if($d['rating'] > $rate)
                    //       { 
                    //           array_push($newrate,$d);  
                    //       }

                    //   }
                       
                    // //   echo '<pre>'; print_r($newrate); 
                    //     //   $its_all=array();
                    //     //   foreach($sorts as $key){
                              
                              
                    //     //   }
                    //       $sorts=  $this->aasort($newrate,"rating");
                        //   echo'<pre>';
                        //   print_r($similar);die;

      if(!empty($listing)){
      return view('Users.deal-details',array('listing'=>$listing,'days_time'=>$days_time,'favourite'=>$favourite,'images'=>$images,'user_listings'=>$user_listings,'reviews'=>$reviews,'deal'=>$deal,'popular'=>$pop_cat,'similar'=>$similar));}
      else{
        return view('Users.error',array('message'=>'Sorry, data not found','page'=>'Deal Details'));
      }
   }
   
   
   function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
    return $array;
}


   /*function msort($array, $key, $sort_flags = SORT_REGULAR) {
    if (is_array($array) && count($array) > 0) {
        if (!empty($key)) {
            $mapping = array();
            foreach ($array as $k => $v) {
                $sort_key = '';
                if (!is_array($key)) {
                    $sort_key = $v[$key];
                } else {
                    // @TODO This should be fixed, now it will be sorted as string
                    foreach ($key as $key_key) {
                        $sort_key .= $v[$key_key];
                    }
                    $sort_flags = SORT_STRING;
                }
                $mapping[$k] = $sort_key;
            }
            asort($mapping, $sort_flags);
            $sorted = array();
            foreach ($mapping as $k => $v) {
                $sorted[] = $array[$k];
            }
            return $sorted;
        }
    }
    return $array;
}
*/
   //---search_blog----------
     public function search_blog(Request $request)
   {    
    $blog=Blog::where('title','LIKE','%'.$request->keyword.'%')->get()->toArray();
     $new_add=array();
      foreach($blog as $key)
      {
       $key['all_categories']=categories::whereIn('id',explode(',',$key['category']))->get()->toArray();
       $key['all_tags']=Tags::whereIn('id',explode(',',$key['tag']))->get()->toArray();
       $new_add[]=$key;
      }
    
    $data['data']='';
    $i=0;
    $tags_array=array();
    if(!empty($new_add)){
      if($request->keyword) $data['keyword']='<div class="ser_res res_for"> Results for keyword: '.$request->keyword .'</div>';
      else{
         $data['keyword']='All results';
      }
    
    foreach($new_add as $key){
      $data['data'].='<div class="col-md-12">
                              <div class="blog-post wide">
                              <div class="blog-post-thumb"> <a href="'.route('blog-details',$key['id']).'" title="">';
                              if(!empty($key['image']) && file_exists('public/blog_images/'.$key['image']))
                                      $data['data'].='<img src="'.URL('public/blog_images').'/'.$key['image'].'" alt="" />';
                              else$data['data'].= '<img src="'.URL('public/images/default-small.jpg').'" alt="" />';
                               $data['data'].='</a></div>
                                 <div class="blog-detail">
                                    <h3><a href="'.route('blog-details',$key['id']).'" title="">'.$key['title'].'</a></h3>
                                    <ul class="blog-metas">
                                       <li><a href="#" title=""><i class="fa fa-calendar"></i>
                                      '.substr_replace($key['created_at'],"",-8).'
                                       </a></li>
                                       <li>
                                    ';
                                    foreach($new_add[$i]['all_tags'] as $tag_value){
                                    $data['data'].='<a href="#" title=""><i class="fa fa-tags"></i>'.
                                       
                                    $tags_array[]=$tag_value['tag_name']; 
                                      
                                    $data['data'].=$tag_value['tag_name'].
                                         '</a>';
                                       }
                                   $data['data'].='</li>
                                    </ul>
                                    <p>'.$key['description'].'</p>
                                    <a href="'.route('blog-details',$key['id']).'" title="">READ MORE</a>
                                 </div>
                              </div>
                              <!-- BLog Post  -->
                           </div>';
    }
  }
    else{
      $data['keyword']='No data found for keyword: '.$request->keyword;
      $data['data']=null;
    }

    echo json_encode($data);
    
  }


     //---blog_tag_search----------
     public function blog_tag_search(Request $request)
   {    
     
    $tag_name=Tags::select('tag_name')->where('id',$request->keyword)->get()->toArray();
 
    $blog=Blog::whereRaw("find_in_set('$request->keyword',tag)")->get()->toArray();
    // print_r($blog);die();
     $new_add=array();
      foreach($blog as $key)
      {
       $key['all_categories']=categories::whereIn('id',explode(',',$key['category']))->get()->toArray();
       $key['all_tags']=Tags::whereIn('id',explode(',',$key['tag']))->get()->toArray();
       $new_add[]=$key;
      }
    
    $data['data']='';
    $i=0;
    $tags_array=array();
    if(!empty($new_add)){
    $data['keyword']='Result for tag: '.$tag_name[0]['tag_name'];
    foreach($new_add as $key){
      $data['data'].='<div class="col-md-12">
                              <div class="blog-post wide">
                              <div class="blog-post-thumb"> <a href="'.route('blog-details',$key['id']).'" title="">';
                              if(!empty($key['image']) && file_exists('public/blog_images/'.$key['image']))
                                      $data['data'].='<img src="'.URL('public/blog_images').'/'.$key['image'].'" alt="" />';
                              else$data['data'].= '<img src="'.URL('public/images/default-small.jpg').'" alt="" />';
                               $data['data'].='</a></div>
                                 <div class="blog-detail">
                                    <h3><a href="'.route('blog-details',$key['id']).'" title="">'.$key['title'].'</a></h3>
                                    <ul class="blog-metas">
                                       <li><a href="#" title=""><i class="fa fa-calendar"></i>
                                      '.substr_replace($key['created_at'],"",-8).'
                                       </a></li>
                                       <li>
                                    ';
                                    foreach($new_add[$i]['all_tags'] as $tag_value){
                                    $data['data'].='<a href="#" title=""><i class="fa fa-tags"></i>'.
                                       
                                    $tags_array[]=$tag_value['tag_name']; 
                                      
                                    $data['data'].=
                                         '</a>';
                                       }
                                   $data['data'].='</li>
                                    </ul>
                                    <p>'.$key['description'].'</p>
                                    <a href="'.route('blog-details',$key['id']).'" title="">READ MORE</a>
                                 </div>
                              </div>
                              <!-- BLog Post  -->
                           </div>';
    }
  }
    else{
      $data['keyword']='No data found for keyword: '.$tag_name[0]['tag_name'];
      $data['data']=null;
    }

    echo json_encode($data);
    
  }

    //---blog_comment-----------------------
     public function blog_comment(Request $request)
   {
    
    // dd($request->all());
    if(blog_comments::insert(['user_id'=>Auth::id(),'rating'=>$request->rating_field,'name'=>$request->user_name,'email'=>$request->user_email,'website'=>$request->user_website,'comment'=>$request->user_comment,'blog_id'=>$request->blog_id])){
      $last_insert_id =  DB::getPdo()->lastInsertId(); 
     Notifications::insert(['user_id'=>Auth::id(),'type'=>6,'commented_id'=>$request->blog_id]);
      $data=array();
      $data['blog']=blog_comments::where('id',$last_insert_id)->get()->toArray();
     
      $data['user']=user::where('id',$data['blog'][0]['user_id'])->first()->toArray();
      // echo "<pre>";
      // print_r($data); 
      $now=Carbon::now();  
       $now;
      $blog=array();
      $blog['random'] = Str::random(4);  
       $blog['comment_sec']='';
      $blog['comment_sec'].='  <li class="'.$blog['random'].'">
               <div class="review-list">
                  <div class="review-avatar"> <img src="'.URL('public/profile_pictures/'.$data['user']['profile_image']).'" alt="" width="40%"> </div>
                  <div class="reviewer-info">
                     <h3><a href="#" title=""></a>'.$data['user']['name'].'</h3>
                     <span>  '.Carbon::parse($data['blog'][0]['created_at'])->diffForHumans().'</span>
                     <p>'.$data['blog'][0]['comment'].'</p>
                  </div>
                  <div class="reviewer-stars">';
                      if($data['blog'][0]['rating']==5){
                   
                               $blog['comment_sec'].='<b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>';}
                               elseif($data['blog'][0]['rating']==4){
                                $blog['comment_sec'].='<b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star-o"></b>';}
                               elseif($data['blog'][0]['rating']==3){
                                $blog['comment_sec'].='<b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>';}
                               elseif($data['blog'][0]['rating']==2){
                               $blog['comment_sec'].='<b class="la la-star orng"></b>
                               <b class="la la-star orng"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>';}
                               elseif($data['blog'][0]['rating']==1){
                                $blog['comment_sec'].='<b class="la la-star orng"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>';}
                               elseif($data['blog'][0]['rating']==0){
                               $blog['comment_sec'].='<b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>
                               <b class="la la-star-o"></b>';
                             }      
      
                   $blog['comment_sec'].='</div>
               </div>
            </li>';
     
    }
    else{
      $blog['fail']='0';
    }
  echo json_encode($blog);


   }
  
    //---contact_email----------
     public function contact_email(Request $request)
   {
          if(Contact_emails::insert(['name'=>$request->name,'email'=>$request->email,'subject'=>$request->subject,'message'=>$request->message])){
             $messsage='<tr>
					<th>Name</th><td>'.$request->name.'</td>
				</tr>
				<tr>
					<th>Email </th><td>'.$request->email.'</td>
				</tr>
				<tr>
					<th>Subject</th><td>'.$request->subject.'</td>
				</tr>
				<tr>
					<th>Message</th><td>'.$request->message.'</td>
				</tr>';
          $data = array(       
          'subject' =>$request->subject,
          'bodyMessage' =>$messsage,
          'postersemail' =>'harindersindiit@gmail.com');
          Mail::send('Users.contact-mail',$data,function($message) use ( $data)
           {      
                $message->to( $data['postersemail'] );
                $message->subject($data['subject']); 
                     
          });
          echo "1";

          }
          else{
            echo "0";
          }
        
       
     
   }

}