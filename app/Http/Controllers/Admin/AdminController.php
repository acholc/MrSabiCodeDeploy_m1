<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\listing;
use App\images;
use App\categories;
use App\Countries;
use App\States;
use App\Deals;
use Response;
use App\rating;
use App\days_time;
use App\Pages;
use App\Home;
use App\Tags;
use App\Blog;
use App\blog_comments;
use Validator;
use App\Notifications;
use App\Contact_emails;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
//admin index---
  public function index()
 {
     echo'yess';
    //  $data=User::where('active',0)->where('status','!=',3)->orderby('id','desc')->take(5)->get();
    //  $user=User::where('active',0)->where('status','!=',3)->get();
    //  $category=categories::where('status','!=',3)->get()->toArray(); 
    //   $listing=listing::get()->toArray(); 
    //   $rating=rating::get()->toArray(); 
    //   die;
    // return view('admin.index',array('data'=>$data,'category'=>$category,'listing'=>$listing,'rating'=>$rating,'user'=>$user));

 }

//admin login---
    public function login()
 {
   return view('admin.login');

 }

//admin adminlogin---
    public function adminauth(Request $request)
 {
   if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'active'=>1]))
   {  
       Session::put('admin',Auth::id());
       return redirect()->intended('/admin');
       
   }
 else{  
  return back()->with('failed','invalid credentials');
     }
   }

//admin logot---
    public function logout()
 {
   
 Session::flush();
 Auth::logout();
 header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
 header("Pragma: no-cache"); // HTTP 1.0.
 header("Expires: 0"); // Proxies. 
  return redirect(\URL::previous());
 
 }

//admin profile_settings---
    public function profile_settings()
 { 
  return view('admin.profile-settings');
 }

//admin profile_changes---
    public function profile_changes(Request $request)
 {     
     if($request->profile_pic)
       {          
          $image = $request->file('profile_pic');
          $name = $request->profile_pic->getClientOriginalName();
          $destinationPath = public_path('/profile_pictures');
          $image->move($destinationPath, $name);      
          $profile_pic_name =$request->profile_pic->getClientOriginalName();
           $response['pic']=$request->profile_pic->getClientOriginalName(); 

       }
         else
       {
          $profile_pic_name =Auth::User()->profile_image; 
       }     
        $id = User::where('id',Auth::id())->first();
          
          if(Hash::check($request->oldpassword,$id->password))
       {
      User::where('id',Auth::User()->id)->update(['name'=>$request->name,'lastname'=>$request->lastname,'email'=>$request->email,'phone'=>$request->phone,'password'=>Hash::make($request->newpassword),'profile_image'=>$profile_pic_name]);
          $response['status']=102;        
       }
       else
      {  
      $response['status']=104; 
      }

     if(!isset($request->oldpassword))
     {      
      User::where('id',Auth::User()->id)->update(['name'=>$request->name,'lastname'=>$request->lastname,'email'=>$request->email,'phone'=>$request->phone,'profile_image'=>$profile_pic_name]);
        $response['status']=103;
     }
      
       echo json_encode($response);   
 }

//admin users---
    public function users()
    {
    //$whereData = array(array('status',2), array('active',0));
     $data=User::orwhere('status',1)->orwhere('status',2)->where('active',0)->orderby('id','desc')->get();
     return view('admin.users')->with('data',$data);
    }

//admin user_detail---
    public function user_details(Request $request)
 {
     $data = User::where('id',$request->id)->first();
     return view('admin.user-details',array('data'=>$data));
 }
 
 // listing page
public function listing(Request $request)
 {   

      $data =listing::orderBy('id','desc')->get();
      $All_data=array();
     foreach ($data as $key)
     {
       $key['user']=User::where('id',$key->user_id)->get()->toArray();
       $key['category']=categories::where('id',$key->category_id)->get()->toArray();
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');

       $All_data[]=$key;
     }
    //  echo "<pre>";
    //  print_r( $All_data);die();
    return view('admin.listing',array('data'=>$All_data));
 }
//---delete_user---
    public function delete_user(Request $request)
 {   
       if(User::where('id',$request->id)->update(['status'=>3]))
     {
        $response['status'] =102;    
     }
      else
     {
         $response['status'] =103;    
     }
       echo  json_encode($response);
}

//---edit_user---
    public function edit_user(Request $request)
    {   
     $data = User::where('id',$request->id)->first();
     return view('admin.edit-user')->with('data',$data);
    }

//---save_user_changes ---
    public function save_user_changes(Request $request)
 {   
       if(User::where('email','=',$request->email)->where('id','!=',$request->id)->first()===null)
   {
       
    //   $imageName = time().'.'.request()->image->getClientOriginalExtension();
    //         request()->image->move(public_path('category'), $imageName);

    if ($request->hasFile('profile_pic')) 
       {          
           $imageName = time().'.'.request()->profile_pic->getClientOriginalExtension();
            request()->profile_pic->move(public_path('profile_pictures'), $imageName);
           
           
        //   $image = $request->file('profile_pic');
        //   $name = $request->profile_pic->getClientOriginalName();
        //   $destinationPath = public_path('/profile_pictures');
        //   $image->move($destinationPath, $name);      
        //   $profile_pic_name =$request->profile_pic->getClientOriginalName();  
       }
         else
       {
          $imageName =Auth::User()->profile_image; 
       }     
          
          if($request->newpassword)
       {
      User::where('id',$request->id)->update(['name'=>$request->name,'lastname'=>$request->lastname,'email'=>$request->email,'phone'=>$request->phone,'password'=>Hash::make($request->newpassword),'profile_image'=>$imageName]);
          $response['status']=102;        
       }
     else
       {  
      User::where('id',$request->id)->update(['name'=>$request->name,'lastname'=>$request->lastname,'email'=>$request->email,'phone'=>$request->phone,'profile_image'=>$imageName]);
        $response['status']=103;
       }

  }
  else{
        $response['status']=105;
  }

      
        echo json_encode($response); 
}

//---add_user---
    public function add_user(Request $request)
 {      
     return view('admin.add-user');
 }

//---add_user_detailes---
    public function add_user_detailes(Request $request)
  {   

      $rules = [
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'profile_pic.required_if' => 'Image required.',
            'profile_pic.image' => 'Only images are allowed.',
            'profile_pic.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
        else
        {
        
            if(User::where('email', '=',($request->email))->first()=== null)
            {
        
             if ($request->hasFile('profile_pic')) 
               {          
                   $imageName = time().'.'.request()->profile_pic->getClientOriginalExtension();
                    request()->profile_pic->move(public_path('profile_pictures'), $imageName);
               } 
                else
                   {
                      $imageName =Auth::User()->profile_image; 
                   } 
        
             if(User::insert(['name'=>$request->name,'lastname'=>$request->lastname,'email'=>$request->email,'phone'=>$request->phone,'password'=>Hash::make($request->newpassword),'profile_image'=>$imageName]))
             {
                  //$response['status']=102;  
                  return Response::json( array( "success" => "102" ) );
             }
        
            }
            else
            {
              // $response['status']=103; 
              return Response::json( array( "success" => "103" ) );
            }
           
               echo json_encode($response);
        }
 }

//---user_status---
    public function user_status(Request $request)
 { 
    if(user::where('id',$request->id)->update(['status'=>$request->status]))
    {
      echo '1';
    }
    else{
      echo '2';
    }
 }
 
 //---edit_listing---
    public function edit_listing(Request $request)
 {        
      $data =listing::where('id',$request->id)->get();
      $All_data=array();
      $new_data=array();
     foreach ($data as $key)
     {
       $key['user']=User::where('id',$key->user_id)->get()->toArray();
       $new_data[]=rating::where('listing_id',$key->id)->get()->toArray();
       $key['category']=categories::where('id',$key->category_id)->get()->toArray();
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
       $key['images']=images::where('listing_id',$key->id)->get()->toarray();
       $key['state']=states::select('state_name')->where('state_id',$key->state_id)->get()->toArray();
       $key['categories']=categories::get()->toArray();
       $key['days_time']=days_time::where('listing_id',$key->id)->get()->toArray();
       $key['states']=states::get()->toArray();
       $key['countries']=Countries::get()->toArray();
       $All_data[]=$key;
     }
    
    //  print_r($All_data);die(); 
    
       if(!empty($new_data)){
        foreach($new_data as $value=>$key1){
          if(!empty($key1)){
            foreach ($key1 as $value1=>$key2) {
               $userdata = User::where('id',$key2['user_id'])->get()->toArray();
               $new_data[$value][$value1]['userdata'] = $userdata[0];         
            }
          }           
         }
         $All_data[0]['rating']=$new_data[0];
       }else{
        $All_data[0]['rating']=$new_data;
       }
       
     
     //  echo'<pre>';
     // print_r($All_data);die();
    return view('admin.edit-listing',array('data'=>$All_data));

 }
 //---Add Listing---
    public function add_listing(Request $request)
   {  
        $category=categories::get();
        $countries=Countries::get();
        return view('admin.add-listing',array('countries'=>$countries,'category'=>$category));
      
   }
 
 //---list_categories---
    public function list_categories(Request $request)
   { 
        
    $data['cat_list']=categories::orderby('id','desc')->get()->toArray();
       
    //$data = User::where('id',Auth::id())->first();
     return view('admin.categories')->with('data',$data);
 }
    //---list_tags---
    public function list_tags(Request $request)
    { 
        $data['tag'] =Tags::get();
        return view('admin.tags')->with('data',$data);
    }
    
    // save tags //
    public function save_tags(Request $request)
    {
        $tag_lists = Tags::where('tag_name',$request->input('tag'))->get();
   
        if(count($tag_lists) == 0)
         {
             Tags::insert(['tag_name'=>$request->input('tag')]);
             $response['status']=102;         
         }
        
        else
        {
          $response['status']=103; 
        }
         echo json_encode($response); 
    }
    
    // edit tag //
    public function edit_tag(Request $request)
    { 
        
        $whereData = array(array('id','!=',$request->hidd) , array('tag_name',$request->edittags)); 
        $cat_lists = Tags::where($whereData)->get();
    
        if(count($cat_lists) == 0)
        {
          $cat_lists = Tags::where('id',$request->hidd)->update(['tag_name'=>$request->edittags]);
          $response['status']=102;        
        }
    
         else
         {
           $response['status']=103; 
         }
         echo json_encode($response);
    }
    
    // delete tags//
     public function delete_tags(Request $request)
     {  
         
            Tags::where('id',$request->id)->delete();
            //Deals::where('id',$request->id)->update(['status'=>3]);
            $response['status'] =102; 
            
            echo json_encode($response);
     }
 
   
    // get data from tag table //
     public function select_tag(Request $request)
     {
      $mycat=Tags::where('id',$request->id)->first();
      echo json_encode($mycat);
     }
  
  //---view_listing---
    public function view_listing(Request $request)
 { 
      $data =listing::where('id',$request->id)->get();
      $All_data=array();
      $new_data=array();
     foreach ($data as $key)
     {
       $key['user']=User::where('id',$key->user_id)->get()->toArray();
       $new_data[]=rating::where('listing_id',$key->id)->get()->toArray();
       $key['category']=categories::where('id',$key->category_id)->get()->toArray();
       $key['overall_rating']=rating::where('listing_id',$key->id)->avg('rating');
       $key['images']=images::where('listing_id',$key->id)->get()->toarray();
       $key['state']=states::select('state_name')->where('state_id',$key->state_id)->get()->toArray();
       $key['categories']=categories::get()->toArray();
       $key['days_time']=days_time::where('listing_id',$key->id)->get()->toArray();
       $key['states']=states::get()->toArray();
       $key['countries']=Countries::get()->toArray();
       $All_data[]=$key;
     }
    
    //  print_r($All_data);die(); 
    
       if(!empty($new_data)){
        foreach($new_data as $value=>$key1){
          if(!empty($key1)){
            foreach ($key1 as $value1=>$key2) {
               $userdata = User::where('id',$key2['user_id'])->get()->toArray();
               $new_data[$value][$value1]['userdata'] = $userdata[0];         
            }
          }           
         }
         $All_data[0]['rating']=$new_data[0];
       }else{
        $All_data[0]['rating']=$new_data;
       } 
       $state=states::where('state_id',$data[0]->state_id)->get()->toArray();
         // echo "<pre>";
         // print_r($All_data);die();
     return view('admin.view-listing',array('data'=>$All_data,'state_name'=>$state));
 }
 
  //---blog_listing---
    public function blog_listing(Request $request)
    { 
     
     $data =Blog::get()->toArray();
     
     foreach($data as $key => $cate)
     {
      $temp=explode(",",$cate['category']);
    
      foreach($temp as $catid)
      {
          $data[$key]['mycat'][]=categories::select('category')->where('id',$catid)->get()->toArray();
      }
         
     }
     
      foreach($data as $key => $tagss)
     {
     
      $temps=explode(",",$tagss['tag']);
     
    //   echo "<pre>";
    //   print_r($temps);
      
      foreach($temps as $catid)
      {
          $data[$key]['mytag'][]=Tags::select('tag_name')->where('id',$catid)->get()->toArray();
    //   echo "<pre>";
    //   print_r( $data[$key]['mytag']);
      }
         
     }
    

     return view('admin.blogs')->with('data',$data);
  }
 
   //---Add Blog---
    public function add_blog(Request $request)
    { 
       $data =categories::get();
       $tags=Tags::get();
       return view('admin.add-blog')->with('data',$data)->with('tags',$tags);
    }
    
    // save blog //
    public function save_blog(Request $request)
    {
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        }
            else
            {
                $imageName = '';
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('blog_images'), $imageName);        
                }
             
                   $cat=implode(',',$request->input('category'));
                   $tag=implode(',',$request->input('tag'));
                  
                   Blog::insert(['title'=>$request->title,'description'=>$request->description,'category'=>$cat,'tag'=>$tag,
                   'image'=>$imageName]);
              
                //$response['status']=102;   
                return Response::json( array( "success" => "102" ) );
                echo json_encode($response);
            }
        
    }
    
 
 //---Edit Blog---
    public function edit_blog($id)
 { 
       $data =categories::get();
       $tags=Tags::get();
       $blogdata=Blog::where('id',$id)->first();
     return view('admin.edit-blog')->with('data',$data)->with('tags',$tags)->with('blogdata',$blogdata);
 }
 
  // update blog //
 public function update_blog(Request $request)
 {
      $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        }
            else
            {
               $cat=implode(',',$request->input('category'));
               $tag=implode(',',$request->input('tag'));
               
                $del = Blog::find($request->id);
                $del->title = $request->input("title");
                $del->description = $request->input("description");
                $del->category=$cat;
                $del->tag=$tag;
                
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('blog_images'), $imageName);
                    $del->image = $imageName;
                }
                $del->save();
            
                //$response['status']=102;     
                return Response::json( array( "success" => "102" ) );
                echo json_encode($response);
            }
       
 }
 
  
 // delete blog//
 public function delete_blog(Request $request)
 {  
        Blog::where('id',$request->id)->delete();
        //Deals::where('id',$request->id)->update(['status'=>3]);
        $response['status'] =102; 
        
        echo json_encode($response);
 }
 
 //---Pages LIst---
    public function all_pages(Request $request)
 { 
     $data=Pages::where('id',11)->first();
     $contact_data=Pages::where('id',29)->first();
     $policy_data=Pages::where('id',26)->first();
     $aboutus_data=Pages::where('id',28)->first();
      $home=Pages::where('id',30)->first();
     return view('admin.all-pages')->with('data',$data)->with('contact_data',$contact_data)->with('policy_data',$policy_data)->with('aboutus_data',$aboutus_data)->with('home',$home);
 }
 
 //---Add page---
    public function add_page(Request $request)
 { 
    $data = User::where('id',Auth::id())->first();
     return view('admin.add-page')->with('data',$data);
 }
 
 
 
 //---edit page---
    public function edit_page(Request $request)
 { 
    $data = User::where('id',Auth::id())->first();
     return view('admin.edit-page')->with('data',$data);
 }
 
 
 
 //---Notifications---
  public function notifications(Request $request)
  { 
         $class=Notifications::orderBy('created_at','DESC')->get()->toArray();
         $all_data=array();
         foreach ($class as $key) {
           $key['lisitng']=listing::where('id',$key['reviewed_id'])->first();
           $key['user']= User::where('id',$key['user_id'])->first();
           $key['blog']= Blog::where('id',$key['commented_id'])->first();
           $key['added_list']= listing::where('id',$key['added_list_id'])->first();
           $key['edited_list']= listing::where('id',$key['edited_list_id'])->first();  
           $all_data[]=$key;
         }
         // echo "<pre>";
         // print_r($all_data); die;

     return view('admin.notifications',array('notifications'=>$all_data));
  }
  
//   deals
    public function deals(Request $request)
    { 
      //$data['deal_list']=Deals::orderby('id','asc')->get()->toArray();
    
     $data['deal_list']=Deals::with('business_info')->orderby('id','asc')->get()->toArray();
     return view('admin.deals')->with('data',$data);
  }
 
  //---EDIT DEALS---
    public function edit_deals($id)
    { 
        $data['country_list']=Countries::where('status',1)->orderby('country_id','asc')->get()->toArray();
        $state['state_list']=States::where('status',1)->orderby('state_id','asc')->get()->toArray();
        $deal=Deals::where('id',$id)->first();
      
        $buisness['buisness']=listing::get()->toArray();
      
       
    //$data = User::where('id',Auth::id())->first();
     return view('admin.edit-deals')->with('data',$data)->with('state',$state)->with('deal',$deal)->with('buisness',$buisness);
    }
 
 // update deal //
 public function update_deal(Request $request)
 {
      $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
                $del = Deals::find($request->id);
                $del->business_name = $request->input("business");
                $del->discount = $request->input("discount");
                $del->coupon_code=$request->input("coupon");
                $del->address=$request->input("address");
                $del->city=$request->input("city");
                $del->country=$request->input("country");
                $del->state=$request->input("state");
                $del->phone=$request->input("phone");
                $del->title=$request->input("title");
                $del->description=$request->input("description");
                $del->price=$request->input("price");
                
                
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('deal_images'), $imageName);
                    $del->image = $imageName;
                }
               
                $del->save();
                //$response['status']=102;  
                return Response::json( array( "success" => "102" ) ); 
                echo json_encode($response);
            }
       
 }
 
  //---Add DEals---
    public function add_deal(Request $request)
  { 
     $data['country_list']=Countries::where('status',1)->orderby('country_id','asc')->get()->toArray();
     $state['state_list']=States::where('status',1)->orderby('state_id','asc')->get()->toArray();
       $buisness['buisness']=listing::get()->toArray();
    //$data = User::where('id',Auth::id())->first();
     return view('admin.add-deals')->with('data',$data)->with('state',$state)->with('buisness',$buisness);
 }
 
 // add deal funcion //
  public function insert_deal(Request $request)
  {
      
      $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
                $imageName = '';
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('deal_images'), $imageName);        
                }
             
              
                 Deals::insert(['business_name'=>$request->business,'discount'=>$request->discount,'coupon_code'=>$request->coupon,'address'=>$request->address,
                'city'=>$request->city,'country'=>$request->country,'state'=>$request->state,'phone'=>$request->phone,'image'=>$imageName,'title'=>$request->title,'description'=>$request->description,'price'=>$request->price]);
              
                  // $response['status']=102;     
                   return Response::json( array( "success" => "102" ) ); 
                   echo json_encode($response);
            }

  }
 
 // delete deals//
 public function delete_deal(Request $request)
 {  
     
        Deals::where('id',$request->id)->delete();
        //Deals::where('id',$request->id)->update(['status'=>3]);
        $response['status'] =102; 
        
        echo json_encode($response);
 }
 
 // add category //
 public function addcategory(Request $request)
 {
        $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
                $imageName = '';
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('category'), $imageName);        
                }
             
                    $cat_lists = categories::where('category',$request->category)->get();
           
                    if(count($cat_lists) == 0)
                     {
                         categories::insert(['category'=>$request->category,'image'=>$imageName]);
                         return Response::json( array( "success" => "102" ) ); 
                         //$response['status']=102;         
                     }
                
                        else
                        {
                           return Response::json( array( "success" => "103" ) );
                           //$response['status']=103;  
                        }
                       echo json_encode($response);   
            }
     
 }
 
 // edit category //
 public function editcategory(Request $request)
 {
     $rules = [
            'editimage' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            
            'editimage.image' => 'Only images are allowed.',
            'editimage.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails()) 
        { 
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
                $catdata=categories::where('id',$request->hidd)->first();
                $imageName = '';
                if ($request->hasFile('editimage')) 
                {
                    $imageName = time().'.'.request()->editimage->getClientOriginalExtension();
                    request()->editimage->move(public_path('category'), $imageName);        
                }
                       else 
                        {
                            $imag= '';
                            if($catdata->image)
                            {
                                $imageName =  $catdata->image;    
                            }
                        }
                
                $whereData = array(array('id','!=',$request->hidd) , array('category',$request->editcategory)); 
                $cat_lists = categories::where($whereData)->get();
            
                if(count($cat_lists) == 0)
                {
                  $cat_lists = categories::where('id',$request->hidd)->update(['category'=>$request->editcategory,'image'=>$imageName]);
                   return Response::json( array( "success" => "102" ) ); 
                  //$response['status']=102;        
                }
            
                     else
                     {
                         return Response::json( array( "success" => "103" ) );
                      // $response['status']=103; 
                     }
                
                 echo json_encode($response);
            }
  }
 
     // delete category //
     public function delete_category(Request $request)
     {  
        categories::where('id',$request->id)->delete();
        //Deals::where('id',$request->id)->update(['status'=>3]);
        $response['status'] =102; 
        
        echo json_encode($response);
     }
 
 
 // delete category//
//  public function delete_category(Request $request)
//  {  
//     // echo "helooo";
//       if($request->id)
//       { categories::where('id',$request->id)->update(['status'=>3]);
//         $response['status'] =102;    
//       }
//       else
//       {
//          $response['status'] =103;    
//       }
//       echo json_encode($response);
//  }
 
 
 public function select_category(Request $request)
 {
     //echo "hoiiiii";
     $mycat=categories::where('id',$request->id)->first();
  
    // return Response::json(array("success"=>"1","category"=>$mycat));
    echo json_encode($mycat);
 }
 
 // country page calling //
  public function country(Request $request)
  { 
      $data['country_list']=Countries::where('status',1)->orderby('country_id','desc')->get()->toArray();
     //$data = User::where('id',Auth::id())->first();
     return view('admin.country')->with('data',$data);
  }
  
  // add country //
 public function addcountry(Request $request)
 {
     $cat_lists = Countries::where('country_name',$request->country)->get();
    if(count($cat_lists) == 0)
     {
         Countries::insert(['country_name'=>$request->country]);
         $response['status']=102;         
     }
    
    else
    {
       $response['status']=103; 
    }
     echo json_encode($response);
 }
 
  // delete country//
 public function delete_country(Request $request)
 {  
    // echo "helooo";
      //State::where("parent_id",$country_id)->delete();
      if($request->id)
      {
        Countries::where('country_id',$request->id)->update(['status'=>3]);
        States::where('country_id',$request->id)->update(['status'=>3]);
        
        $response['status'] =102;    
      }
      else
      {
         $response['status'] =103;    
      }
      echo json_encode($response);
 }
 
 
 public function select_country(Request $request)
 {
     //echo "hoiiiii";
     $mycountry=Countries::select('country_name')->where('country_id',$request->id)->first();
  
     return Response::json(array("success"=>"1","country_name"=>$mycountry));
 }
 
 
  // edit country //
 public function editcountry(Request $request)
 {
     $whereData = array(array('country_id','!=',$request->hidd) , array('country_name',$request->editcountry)); 
     $cat_lists = Countries::where($whereData)->get();
    
        if(count($cat_lists) == 0)
        {
           Countries::where('country_id',$request->hidd)->update(['country_name'=>$request->editcountry]);
         $response['status']=102;         
        }
    
     else
     {
       $response['status']=103; 
     }
   
   
     echo json_encode($response);

 }
 
 // state page calling //
 public function state(Request $request)
  { 
     $data['country_list']=Countries::where('status',1)->orderby('country_id','asc')->get()->toArray();
     $state['state_list']=States::where('status',1)->orderby('state_id','asc')->get()->toArray();
     //$data = User::where('id',Auth::id())->first();
     return view('admin.state')->with('data',$data)->with('state',$state);
     
  }
  
  // add state//
 public function addstate(Request $request)
 {
     $state_lists = States::where('state_name',$request->state)->get();
    if(count($state_lists) == 0)
     {
         States::insert(['state_name'=>$request->state,'country_id'=>$request->country]);
         $response['status']=102;         
     }
    
    else
    {
       $response['status']=103; 
    }
     echo json_encode($response);
 }
 
 public function select_state(Request $request)
 {
     //echo "hoiiiii";
     $mycountry=States::where('state_id',$request->id)->first();
     //print_r($mycountry)->toArray(); die;
  
     return Response::json($mycountry);
 }
 
 // edit state //
 public function editstate(Request $request)
 {
     $whereData = array(array('state_id','!=',$request->hidd) , array('state_name',$request->editstate)); 
     $cat_lists = States::where($whereData)->get();
    
        if(count($cat_lists) == 0)
        {
           States::where('state_id',$request->hidd)->update(['state_name'=>$request->editstate,'country_id'=>$request->editcountry]);
         $response['status']=102;         
        }
    
     else
     {
       $response['status']=103; 
     }
   
     echo json_encode($response);
 }
 
   // delete state//
 public function delete_state(Request $request)
 {  
    // echo "helooo";
      if($request->id)
      { States::where('state_id',$request->id)->update(['status'=>3]);
        $response['status'] =102;    
      }
      else
      {
         $response['status'] =103;    
      }
      echo json_encode($response);
 }
 
    public function getstate(Request $request){
        
    $mycountry=States::where('country_id',$request->country_id)->get()->toArray();
        
      
         foreach ($mycountry as $state) 
         {
              echo "<option class='option' value ='".$state['state_name']."'>".$state['state_name']."</option>";
         }
        
    }  
    
  // status for user //
   public function change_user_status(Request $request)
 {
     if($request->id)
     {   
         User::where('id',$request->id)->update(['status'=>$request->status]);
         $response['result']=1;
         
     }
    
     else{
         $response['result']=0;
         
     }
   
     echo json_encode($response);
 }
  
//=======change_listing_status========
 public function change_listing_status(Request $request)
 {
    if($request->status==0){
      if(listing::where('id',$request->id)->update(['status'=>$request->status]) && Deals::where('business_name',$request->id)->delete()) $response['result']=1;
     else $response['result']=0;
    }
    if($request->status==1){
          if(listing::where('id',$request->id)->update(['status'=>$request->status]) && Deals::where('business_name',$request->id)->restore()) $response['result']=1;
     else $response['result']=0;
    }
     
   
     echo json_encode($response);
 }


//=======add_listing_admin========
 public function add_listing_admin(Request $request)
 {
     if(listing::where('id',$request->id)->update(['status'=>$request->status]))
     {$response['result']=1;}
     else{$response['result']=0;}
   
     echo json_encode($response);
  }


//=======delete_rating========
 public function delete_rating(Request $request)
 {
     if(rating::where('id',$request->id)->delete()){
      echo'1';
     }
     else{
      echo'0';
     }
 }
 
 //=======rating_modal========
 public function rating_modal(Request $request)
 {
    // dd($request->all());
     $data=rating::where('id',$request->id)->get();
     // print_r($data);die();
     //   $i=5;
     //  for ($i = 0; $i < onStar; i++) 
     // {
     //  $(stars[i]).addClass('selected');
     // } 
     $modal=' <input type="hidden" value="'.$data[0]->id.'" name="rating_id"> 
              <input type="hidden" name="rating_field_val" id="rating_field_val" value="'.$data[0]->rating.'">                     
                                <div class="form-group">
                                    <label for="l38">Edit Ratings</label>
                                             <div class="reviewer-stars">
                                           <!-- Rating Stars Box -->
                                         <div class="rating-stars text-center">
                                           <ul id="stars">';
                                           if($data[0]->rating>4.5){
                                             $modal .='
                                             <li class="star selected" title="Poor" data-value="1">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Fair" data-value="2">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Good" data-value="3">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Excellent" data-value="4">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="WOW!!!"" data-value="5">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>';}
                                              elseif($data[0]->rating>3.5){
                                             $modal .='
                                             <li class="star selected" title="Poor" data-value="1">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Fair" data-value="2">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Good" data-value="3">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Excellent" data-value="4">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="WOW!!!"" data-value="5">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>';}
                                              elseif($data[0]->rating>2.5){
                                             $modal .='
                                             <li class="star selected" title="Poor" data-value="1">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Fair" data-value="2">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Good" data-value="3">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Excellent" data-value="4">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="WOW!!!"" data-value="5">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>';}
                                            elseif($data[0]->rating>1.5){
                                             $modal .='
                                             <li class="star selected" title="Poor" data-value="1">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star selected" title="Fair" data-value="2">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Good" data-value="3">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Excellent" data-value="4">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="WOW!!!"" data-value="5">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>';}
                                            elseif($data[0]->rating>0){
                                             $modal .='
                                             <li class="star selected" title="Poor" data-value="1">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Fair" data-value="2">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Good" data-value="3">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Excellent" data-value="4">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="WOW!!!"" data-value="5">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>';}
                                            elseif($data[0]->rating==0){
                                             $modal .='
                                             <li class="star" title="Poor" data-value="1">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Fair" data-value="2">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Good" data-value="3">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="Excellent" data-value="4">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>
                                             <li class="star" title="WOW!!!"" data-value="5">
                                               <i class="fa fa-star fa-fw"></i>
                                             </li>';}

                                           
                                            $modal .='</ul>
                                         </div>
  
                                          </div>

                                        <div class="form-group">
                                            <label for="l38">Edit Comment</label>
                                            <textarea class="form-control" name="comment" required="true">'.$data[0]->comment.'</textarea>
                                        </div>              
                                 </div>
                               
                               <div class="modal-footer">
                                    <button class="btn btn-primary btn-sts btn-rounded ripple text-left" type="submit">Save Changes</button>
                                    <button class="btn btn-danger btn-sts btn-rounded ripple text-left" data-dismiss="modal" aria-hidden="true" type="button">Cancel</button>';
               
  echo $modal;
 }

//=======update_rating========add_update_contactus
 public function update_rating(Request $request)
 {
     // dd($request->all());
     if(rating::where('id',$request->rating_id)->update(['comment'=>$request->comment,'rating'=>$request->rating_field_val])){
      echo'1';
     }
     else{
      echo'0';
     }
 }


//=======add_review========
 public function add_review(Request $request)
 {
   
     if(rating::insert(['comment'=>$request->add_comment,'rating'=>$request->add_rating,'user_id'=>Auth::id(),'listing_id'=>$request->listing_id])){
      echo'1';
     }
     else{
      echo'0';
     }
 }
 
     // pages //
     
     // contact_us page //
     public function contact_us(Request $request)
     {
         $content=Pages::where('id',29)->first();
        $temp= unserialize($content->value);
        
        $data['id']=$content->id;
        $data['content']=$temp;
        $data['title']=$content->title;
        return view('admin.contact_us')->with('data',$data);
     }
     // save contact us data //
     public function add_update_contactus(Request $request)
     {
         $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
             
             $link = array(
                    "address"=>$request->input("address"),
                    "phone"=>$request->input("phone"),
                    "fax"=>$request->input("fax"),
                    "email"=>$request->input("email"),
                    "twitter"=>$request->input("twitter"),
                    "insta"=>$request->input("insta"),
                    "pinterest"=>$request->input("pinterest"),
                    "googl"=>$request->input("googl"),
                    "tumbler"=>$request->input("tumbler"),
                    "android"=>$request->input("android"),
                    "apple"=>$request->input("apple"),
                    "window"=>$request->input("window"),
                    );
                    
                $content =  array(
                    "title"=> $request->input("title"),
                    );
                
                
                $content1=Pages::where('id',29)->first();
                $temp= unserialize($content1->value);
                    
                //     echo "<pre>";
                // print_r($temp);
                // die;
                
                $imag = array();
                $imageName = '';
                
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('page_images'), $imageName);        
                    $imag['banner'] = $imageName;
                }
                    else 
                    {
                        $imag['banner'] = '';
                        if($temp["images"]["banner"])
                        {
                            $imag['banner'] =  $temp["images"]["banner"];       
                        }
                    }
                $termdata = serialize(array("link"=>$link,"content"=>$content,"images"=>$imag));
              
                Pages::where('id',$request->input('id'))->update(['value'=>$termdata,'title'=>$request->input('title')]);
               // $response['status']=102; 
               return Response::json( array( "success" => "102" ) ); 
              echo json_encode($response);
             
            }
         
     }

    //terms page //
    public function terms(Request $request)
    {
        $content=Pages::where('id',11)->first();
        $temp= unserialize($content->value);
        
        $data['id']=$content->id;
        $data['content']=$temp;
        $data['title']=$content->title;
        // echo "<pre>";
        // print_r($temp); die;
      return view('admin.terms')->with('data',$data);
        
    }

    // save terms data //
    public function save_terms(Request $request)
    {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages);

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
                $link = array(
                    "welcome_to_mrsabi"=>$request->input("welcome_to_mrsabi"),
                    "license"=>$request->input("license"),
                    "reservation_of_rights"=>$request->input("reservation_of_rights"),
                    
                    );
                    
                $content =  array(
                    "title"=> $request->input("title"),
                    );
                
                
                $content1=Pages::where('id',11)->first();
                $temp= unserialize($content1->value);
              
                $imag = array();
                $imageName = '';
                
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('page_images'), $imageName);        
                    $imag['banner'] = $imageName;
                }
                    else 
                    {
                        $imag['banner'] = '';
                        if($temp["images"]["banner"])
                        {
                            $imag['banner'] =  $temp["images"]["banner"];       
                        }
                        
                    }
                $termdata = serialize(array("link"=>$link,"content"=>$content,"images"=>$imag));
                Pages::where('id',$request->input('id'))->update(['value'=>$termdata,'title'=>$request->input('title')]);
                //$response['status']=102; 
                return Response::json( array( "success" => "102" ) ); 
                echo json_encode($response);
            }
         
    }

    // privacy policy page //
    public function privacy_policy(Request $request)
    {
        $content=Pages::where('id',26)->first();
        $temp= unserialize($content->value);
        
        $data['id']=$content->id;
        $data['content']=$temp;
        $data['title']=$content->title;
        
        return view('admin.privacy_policy')->with('data',$data);
        
    }

    //save privacy policy page //
    public function save_privacy(Request $request)
    {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
                
                $link = array(
                    "our_privacy_policies"=>$request->input("our_privacy_policies"),
                    "log_files"=>$request->input("log_files"),
                    "privacy_policies"=>$request->input("privacy_policies"),
                    "third_party_policies"=>$request->input("third_party_policies"),
                    "children_info"=>$request->input("children_info"),
                    "online_policy"=>$request->input("online_policy"),
                    "consent"=>$request->input("consent"),
                    
                    );
                    
                $content =  array(
                    "title"=> $request->input("title"),
                    );
                
                
                $content1=Pages::where('id',26)->first();
                $temp= unserialize($content1->value);
                    
                //     echo "<pre>";
                // print_r($temp);
                // die;
                
                $imag = array();
                $imageName = '';
                
                
                if ($request->hasFile('image')) 
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('page_images'), $imageName);        
                    $imag['banner'] = $imageName;
                }
                    else 
                    {
                        $imag['banner'] = '';
                        if($temp["images"]["banner"])
                        {
                            $imag['banner'] =  $temp["images"]["banner"];       
                        }
                        
                    }
                
                $termdata = serialize(array("link"=>$link,"content"=>$content,"images"=>$imag));
                Pages::where('id',$request->input('id'))->update(['value'=>$termdata,'title'=>$request->input('title')]);
               // $response['status']=102; 
                return Response::json( array( "success" => "102" ) ); 
                echo json_encode($response);
            }
         
    }
    
    // about_us page //
    public function about_us(Request $request)
    {
         $content=Pages::where('id',28)->first();
         $temp= unserialize($content->value);
        
         $data['id']=$content->id;
         $data['pagedata']=$temp;
         $data['title']=$content->title;
         
        //print_r($temp); die;
       
        return view('admin.about_us')->with('data',$data);
    }
    
    // save about_us page //
    public function save_about_us(Request $request)
    {
        $rules = [
            'top_banner_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'midd_first_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'midd_secnd_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'midd_third_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'bottom_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'top_banner_img.required_if' => 'Image required.',
            'top_banner_img.image' => 'Only images are allowed.',
            'top_banner_img.mimes'=>'invalid format',
            
            'midd_first_img.required_if' => 'Image required.',
            'midd_first_img.image' => 'Only images are allowed.',
            'midd_first_img.mimes'=>'invalid format',
            
            'midd_secnd_img.required_if' => 'Image required.',
            'midd_secnd_img.image' => 'Only images are allowed.',
            'midd_secnd_img.mimes'=>'invalid format',
            
            'midd_third_img.required_if' => 'Image required.',
            'midd_third_img.image' => 'Only images are allowed.',
            'midd_third_img.mimes'=>'invalid format',
            
            'bottom_img.required_if' => 'Image required.',
            'bottom_img.image' => 'Only images are allowed.',
            'bottom_img.mimes'=>'invalid format',
            
            
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages);

        if ($validator->fails())
        {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else{
                  $content = array(
                        "title"=>$request->input("title"),
                        "top_left_title"=>$request->input("top_left_title"),
                        "top_right_desc"=>$request->input("top_right_desc"),
                        "middle_title"=>$request->input("middle_title"),
                        "midd_first_sub_title"=>$request->input("midd_first_sub_title"),
                        "midd_first_sub_desc"=>$request->input("midd_first_sub_desc"),
                        "midd_secnd_sub_title"=>$request->input("midd_secnd_sub_title"),
                        "midd_secnd_sub_desc"=>$request->input("midd_secnd_sub_desc"),
                        "midd_third_sub_title"=>$request->input("midd_third_sub_title"),
                        "midd_third_sub_desc"=>$request->input("midd_third_sub_desc"),
                        "bottom_desc"=>$request->input("bottom_desc"),
                        "bottom_title"=>$request->input("bottom_title"),
                         
                        );
                        
                    
                    $content1=Pages::where('id',28)->first();
                    $temp= unserialize($content1->value);
                    // echo "<pre>";
                    // print_r($temp); die;
                   
                    $imag = array();
                    $imageName = '';
                    
                    
                    if ($request->hasFile('top_banner_img')) 
                    {
                        $imageName = "1".time().'.'.request()->top_banner_img->getClientOriginalExtension();
                        request()->top_banner_img->move(public_path('page_images'), $imageName);        
                        $imag['banner'] = $imageName;
                    }
                        else 
                        {
                            $imag['banner'] = '';
                            if($temp["images"]["banner"])
                            {
                                $imag['banner'] =  $temp["images"]["banner"];       
                            }
                        }
                    
                    if ($request->hasFile('midd_first_img')) 
                    {
                        $imageName = "2".time().'.'.request()->midd_first_img->getClientOriginalExtension();
                        request()->midd_first_img->move(public_path('page_images'), $imageName);        
                        $imag['midd_first_img'] = $imageName;
                    }
                        else{
                            $imag['midd_first_img'] = '';
                            if($temp["images"]["midd_first_img"])
                            {
                                $imag['midd_first_img'] =  $temp["images"]["midd_first_img"];       
                            }
                        }
                    if ($request->hasFile('midd_secnd_img')) 
                    {
                        $imageName = "3".time().'.'.request()->midd_secnd_img->getClientOriginalExtension();
                        request()->midd_secnd_img->move(public_path('page_images'), $imageName);        
                        $imag['midd_secnd_img'] = $imageName;
                    }
                        else{
                        $imag['midd_secnd_img'] = '';
                        if($temp["images"]["midd_secnd_img"])
                        {
                            $imag['midd_secnd_img'] =  $temp["images"]["midd_secnd_img"];       
                        }
                        }
                   
                    if ($request->hasFile('midd_third_img')) 
                    {
                        $imageName = "4".time().'.'.request()->midd_third_img->getClientOriginalExtension();
                        request()->midd_third_img->move(public_path('page_images'), $imageName);        
                        $imag['midd_third_img'] = $imageName;
                    }
                        else{
                           $imag['midd_third_img'] = '';
                            if($temp["images"]["midd_third_img"])
                            {
                                $imag['midd_third_img'] =  $temp["images"]["midd_third_img"];       
                            }
                        }
                    if ($request->hasFile('bottom_img')) 
                    {
                        $imageName = "5".time().'.'.request()->bottom_img->getClientOriginalExtension();
                        request()->bottom_img->move(public_path('page_images'), $imageName);        
                        $imag['bottom_img'] = $imageName;
                    }
                        else{
                            $imag['bottom_img'] = '';
                            if($temp["images"]["bottom_img"])
                            {
                                $imag['bottom_img'] =  $temp["images"]["bottom_img"];       
                            }
                            
                        }
                    
                    $termdata = serialize(array("content"=>$content,"images"=>$imag));
                    Pages::where('id',$request->input('id'))->update(['value'=>$termdata,'title'=>$request->input('title')]);
                   // $response['status']=102; 
                    return Response::json( array( "success" => "102" ) ); 
                    echo json_encode($response);
           }
    }
    
    //home page //
     public function home(Request $request)
     {
         $data=Home::get()->toArray();
         $home_text=DB::table('home_text')->where('id',1)->first();
        //  echo'<pre>';
        // print_r();die;
        //  ;
       
        return view('admin.home',array('home_text'=>json_decode($home_text->json_all)))->with('data',$data);
    }
    
    
    //save home page//
    public function save_home(Request $request)
    {
         $rules = [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            'image.required_if' => 'Image required.',
            'image.image' => 'Only images are allowed.',
            'image.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails()) {
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
        
        else
        {
        
         $imageName = '';
        if ($request->hasFile('image')) 
        {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('page_images'), $imageName);        
        }
     
           Home::insert(['image_name'=>$imageName]);
         //  $response['status']=102;  
         return Response::json( array( "success" => "102" ) ); 
           echo json_encode($response);
  }        
    }
    
    // edit home banner image //
     public function edit_home_image(Request $request)
    {
        $rules = [
            'editimage' => 'image|mimes:jpeg,png,jpg,gif,svg',
           ];

        $rule_messages = [
            
            'editimage.image' => 'Only images are allowed.',
            'editimage.mimes'=>'invalid format',
        ];

        $validator = Validator::make( $request->all() , $rules, $rule_messages );

        if ($validator->fails()) 
        { 
            return Response::json( array( "errors" =>  $validator->getMessageBag()->toArray() ) ); 
        } 
            else
            {
             
                $catdata=Home::where('id',$request->hidd)->first();
                $imageName = '';
                if ($request->hasFile('editimage')) 
                {
                    $imageName = time().'.'.request()->editimage->getClientOriginalExtension();
                    request()->editimage->move(public_path('page_images'), $imageName);        
                }
                          else 
                          {
                            $imag= '';
                            if($catdata->image_name)
                            {
                                $imageName =  $catdata->image_name;    
                            }
                        }
                
                  $cat_lists = Home::where('id',$request->hidd)->update(['image_name'=>$imageName]);
                //  $response['status']=102;     
                  return Response::json( array( "success" => "102" ) ); 
                 echo json_encode($response);
             
            }

 }
 
  // get data from home  //
  public function select_home_image(Request $request)
  {
     $mycat=Home::where('id',$request->id)->first();
  
    // return Response::json(array("success"=>"1","category"=>$mycat));
    echo json_encode($mycat);
  }
  
   
 // delete home image//
 public function delete_home_image(Request $request)
 {  
    Home::where('id',$request->id)->delete();
    //Deals::where('id',$request->id)->update(['status'=>3]);
    $response['status'] =102; 
    
    echo json_encode($response);
 }
 
 //blog comment //
   public function view_blog_comment(Request $request)
    { 
       $data['blog_review']=blog_comments::with('blog_info')->with('user_info')->orderby('id','asc')->get();
       
       return view('admin.blog_comment')->with('data',$data);
    }
    
 // delete blog_comment//
 public function delete_comment(Request $request)
 {  
     
        blog_comments::where('id',$request->id)->delete();
        //Deals::where('id',$request->id)->update(['status'=>3]);
        $response['status'] =102; 
        
        echo json_encode($response);
 }
 
   //listing review //
    public function listing_review(Request $request)
    { 
       $data['listing_review']=rating::with('listing_info')->with('user_info')->get()->toArray();
    
       return view('admin.listing_review')->with('data',$data);
    }
    
    // delete listing reviews//
 public function delete_listing_reviews(Request $request)
 {  
     
        rating::where('id',$request->id)->delete();
        //Deals::where('id',$request->id)->update(['status'=>3]);
        $response['status'] =102; 
        
        echo json_encode($response);
 }
    
    
    // save home page //
    // public function save_home(Request $request)
    // {

    //          $content =  array(
    //         "title"=> $request->input("title"),
    //         );
            
    //         $content1=Pages::where('id',30)->first();
    //         $temp= unserialize($content1->value);
    //         // echo "<pre>";
    //         // print_r($temp); die;
           
    //         $imag = array();
    //         $imageName = '';
            
            
    //         if ($request->hasFile('first_slide_img')) 
    //         {
    //             $imageName = time().'.'.request()->first_slide_img->getClientOriginalExtension();
    //             request()->first_slide_img->move(public_path('page_images'), $imageName);        
    //             $imag['first_slide_img'] = $imageName;
    //         }
    //             else 
    //             {
    //                 $imag['first_slide_img'] = '';
    //                 if($temp["images"]["first_slide_img"])
    //                 {
    //                     $imag['first_slide_img'] =  $temp["images"][first_slide_img];       
    //                 }
    //             }
            
    //         if ($request->hasFile('second_slide_img')) 
    //         {
    //             $imageName = time().'.'.request()->second_slide_img->getClientOriginalExtension();
    //             request()->second_slide_img->move(public_path('page_images'), $imageName);        
    //             $imag['second_slide_img'] = $imageName;
    //         }
    //             else{
    //                 $imag['second_slide_img'] = '';
    //                 if($temp["images"]["second_slide_img"])
    //                 {
    //                     $imag['second_slide_img'] =  $temp["images"]["second_slide_img"];       
    //                 }
    //             }
    //         if ($request->hasFile('third_slide_img')) 
    //         {
    //             $imageName = time().'.'.request()->third_slide_img->getClientOriginalExtension();
    //             request()->third_slide_img->move(public_path('page_images'), $imageName);        
    //             $imag['third_slide_img'] = $imageName;
    //         }
    //             else{
    //             $imag['third_slide_img'] = '';
    //             if($temp["images"]["third_slide_img"])
    //             {
    //                 $imag['third_slide_img'] =  $temp["images"]["third_slide_img"];       
    //             }
    //             }
           
    //         if ($request->hasFile('fourth_slide_img')) 
    //         {
    //             $imageName = time().'.'.request()->fourth_slide_img->getClientOriginalExtension();
    //             request()->fourth_slide_img->move(public_path('page_images'), $imageName);        
    //             $imag['fourth_slide_img'] = $imageName;
    //         }
    //             else{
    //               $imag['fourth_slide_img'] = '';
    //                 if($temp["images"]["fourth_slide_img"])
    //                 {
    //                     $imag['fourth_slide_img'] =  $temp["images"]["fourth_slide_img"];       
    //                 }
    //             }
           
            
    //         $termdata = serialize(array("content"=>$content,"images"=>$imag));
    //         Pages::where('id',$request->input('id'))->update(['value'=>$termdata,'title'=>$request->input('title')]);
    //         $response['status']=102; 
    //         echo json_encode($response);
        
        
    // }
    
  // seen_notification
 public function seen_notification(Request $request)
 {  
    if(Notifications::where('id',$request->id)->update(['seen'=>1])) $response['status'] =102; 
    else $response['status'] =103; 
    
    echo json_encode($response);
 }

   // delete_notification
 public function delete_notification(Request $request)
 {  
    if(Notifications::where('id',$request->id)->delete()) $response['status'] =102; 
    else $response['status'] =103; 
    
    echo json_encode($response);
 }


  //---view_blog---
    public function view_blog(Request $request )
 { 
       $data =categories::get();
       $tags=Tags::get();
       $blogdata=Blog::where('id',$request->id)->first();
     return view('admin.edit-blog')->with('data',$data)->with('tags',$tags)->with('blogdata',$blogdata);
 }
 
   //---messages---
    public function messages(Request $request )
 { 
       $data= Contact_emails::get()->toArray();
    //   echo'<pre>';
    //   print_r($data);die;
       return view('admin.messages')->with('data',$data);
 }
 
    //---delete_messages---
    public function delete_messages(Request $request )
 { 
       $data= Contact_emails::where('id',$request->id)->delete();
       echo $data;
 }
 
     //---view_message---
    public function view_message(Request $request )
 { 
       $data= Contact_emails::where('id',$request->id)->first();
       $message=$data['message'];
       echo $message;
 }
 
     //---for_home_text---
    public function for_home_text(Request $request )
 { 
     $values =array('h1'=>$request->head1,'sb1'=>$request->subhead1,'h2'=>$request->head2,'sb2'=>$request->subhead2,'h3'=>$request->head3,'sb3'=>$request->subhead3,'h4'=>$request->head4,'sb4'=>$request->subhead4);
     $query = DB::table('home_text')->where('id',1)->update(['json_all'=>json_encode($values)]);
     echo $query;
 }
 
 
 
}
