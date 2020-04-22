@extends('Users.master')
@section('body')
     <section class="bred-crumb-sec" style="background-image: url('{{URL('public/page_images/brdcrmbbg.jpg')}}');">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>Categories</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>Categories</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="block gray">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="mini-title">Categories</h3>
                     <div class="categories-sec cat_sec">
                        <div class="row">
                           @foreach($data as $key)
                           <div class="col-md-3 col-sm-6 col-xs-12 idx-catgry-w-st">
                              <div class="category-box">
                                 <a href="{{route('listing',$key->id)}}" title="">
                                    @if($key->image && file_exists('public/category/'.$key->image))
                                    <img src="{{URL('public/category')}}/{{$key->image}}" alt=""></a>
                                    @else <img src="{{URL('public/images/default-small.jpg')}}" alt=""  width="30%"/>
                                    @endif
                                 <div class="category-box-detail" data-toggle="tooltip" data-placement="top" title="{{$key->category}}">
                                    <span>
                                       @if($key->icon)
                                       <i class="{{$key->icon}}"></i>
                                       @else  <i class="la la-bed"></i>
                                       @endif   
                                    </span>
                                    <h3><a href="{{route('listing',$key->id)}}" title="">{{$key->category}}</a></h3>
                                    <p>
                                {{$key->total}} listings

                                    </p>
                                 </div>
                              </div>
                              <!-- Category Box -->
                           </div>
                           @endforeach            
                         </div>
                     </div>

                     <div>
                    {{$data->links('Users.default')}}
                     </div>

                    </div>
               </div>
            </div>
         </div>
      </section>
 
@endsection('body')
@section('script')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
@endsection('script')