@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		
			<div class="login-center">
                <div class="navbar-header text-center mt-2 mb-4">
                    <a href="index.html">
                        <img alt="" src="{{URL('UserAsset/images/lg_black.png')}}">
                    </a>
					<p style="margin-top:20px;">Welcome back! Login to access <span>MrSabi</span></p>
                </div>
                <!-- /.navbar-header -->
                <form class="form-horizontal" method="POST" action="{{route('adminauth')}}" id="Login_form"> 
					{{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="example-email">Email</label>
						
						 <input id="email" type="email" class="form-control  form-control-line" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						
                       
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="example-password">Password</label>
                        <input id="password" type="password" class="form-control form-control-line" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
				
                    </div>
                    <div class="form-group">
						<button type="submit" class="btn btn-block btn-lg btn-secondary text-uppercase fw-600">
                                    Login
                                </button>
                                @if(Session::has('failed')) {{Session::get('failed')}}
                                @endif
						
                    </div>
                    
                    <!-- /.form-group -->
                </form>
                <!-- /.form-material -->
             
               
            </div>

        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    $('#Login_form').validate();

</script>

@endsection('script')
