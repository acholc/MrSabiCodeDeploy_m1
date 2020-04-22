@extends('Users.master')
@section('body')

<section class="bred-crumb-sec">
         <div class="block no-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="inner-header">
                        <h2>{{$page}}</h2>
                        <ul class="breadcrumbs">
                           <li><a href="{{route('/')}}" title="">Home</a></li>
                           <li>{{$page}}</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<section class="error-page">
<div class="container">
    <div class="row">
        <div class="col-md-12"><p>{{$message}}</p>
            <a href="{{route('/')}}" class="btn btn-error">Go Home</a>
        </div>
    </div>
</div>
</section>

@endsection('body')