@extends('admin.master')
@section('body')
<div></div>
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="page-title">
                <div class="container">
                    <div class="row">
                        <div class="page-title-left">
                            <h6 class="page-title-heading mr-0 mr-r-5">Notifications</h6>
                        </div>
                        <!-- /.page-title-left -->
                        <div class="page-title-right d-none d-sm-inline-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('adm.admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Notifications</li>
                            </ol>
                        </div>
                        <!-- /.page-title-right -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>Notifications               
                                </h5>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                @if(!empty($notifications))
                                <ul class="widget-user-activities list-noti">

                                      @foreach($notifications as $key)
                                    <li class="media" id="{{$key['id']}}">
                                        <figure class="thumb-xs2">
                                            <a href="#">
                                                @if(isset($key['user']['profile_image']) && file_exists('public/profile_pictures/'.$key['user']['profile_image']))
                                               <img src="{{URL('public/profile_pictures/')}}/{{$key['user']['profile_image']}}" class="rounded-circle" alt="">
                                               @else  <img src="{{URL('public/profile_pictures/default-profile-picture-gmail-2.png')}}" class="rounded-circle" alt="">
                                               @endif

                                            </a>
                                        </figure>
                                        <div class="media-body"><a href="#" class="single-user-name">
                                     <!--    Name:<small>  </small> --></a>
                                        Email:<small> {{$key['user']['email']}}
                                             </small><br>   

                                    <small>
                                        {{$key['user']['name']}} 
                                    @if($key['type']==1) register as a new user
                                    @elseif($key['type']==2) has reset account password
                                    @elseif($key['type']==3) has added the new listing <a href="{{route('adm.edit-listing',$key['added_list']['id'])}}">{{$key['added_list']['title']}}  
                                    </a>
                                    @elseif($key['type']==4) has edited the listing <a href="{{route('adm.edit-listing',$key['edited_list']['id'])}}">{{$key['edited_list']['title']}}  
                                    </a> 
                                    @elseif($key['type']==5) has reviewed the listing <a href="{{route('adm.edit-listing',$key['lisitng']['id'])}}">{{$key['lisitng']['title']}}  
                                    </a>
                                     @elseif($key['type']==6) has commented on the blog <a href="{{route('adm.view_blog',$key['blog']['id'])}}">{{$key['blog']['title']}}  
                                    </a>
                                    @endif            
                                        </small>
                                   
                                   
                                         <span class="float-right tct-sa"> <i class="fa fa-clock-o"></i>  
                                            {{\Carbon\Carbon::parse($key['created_at'])->DiffForHumans() }}
                                                <a href="javascript:void(0)"  class="btn btn-warning btn-circle btn-sm ripple delete_notif" data-toggle="modal" data-target=".delete-pop">
                                                        <i data-toggle="tooltip" title="Delete"  class="list-icon lnr lnr-trash"></i>
                                                    </a></span>

                                        </div>
                                        <!-- /.media-body -->
                                    </li>
                               @endforeach
                                    <!-- /.media -->
                                </ul>
                                @else <h5 class="text-dels">All caught up!!</h5>
                                @endif
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
               </div>
            </div>
            <!-- /.container -->
        </main>
        <!-- /.main-wrappper -->
       
    </div>
    <!-- /.content-wrapper -->
    <footer class="footer text-center">
        <div class="container"><span>Copyright @ 2019. All rights reserved</span>
        </div>
        <!-- /.container -->
    </footer>
    </div>
    @endsection('body')

@section('script')
          <script>
            $(document).on('click','.delete_notif',function(){
                var thiss = $(this);
      var id = $(this).closest('.media').attr('id');
        $('.yes_delete').click(function(){
        $('.delete-pop').modal('hide');
           $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:"{{route('adm.delete_notification')}}",
                data:{'id':id},
                success:function(data)
                   { 
                 var result= $.parseJSON(data);
                if(result.status==102){
                    thiss.closest('.media').animate({"opacity": 0,"left":"-1000px" }, 1000, function() {
                $(this).hide();
             });
                   
                }  
                else swal("Sorry, unknown error was occured");          
       
                   }
           });

      });
        
            });
            
         </script>
 @endsection('script')