@extends('site.auth.layout.login-layout')

@section('title',__('site.register'))

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="post" action="{{ route('site.register') }}" class="login100-form validate-form">
                    @csrf
                    <a href="{{route('site.index')}}">
                        <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                    </a>
                    <span class="login100-form-title p-b-49">
						{{__('site.register')}}
					</span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times">&times;</i>
                            </button>
                            <span>
                        {{$errors->first()}}
                    </span>
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input m-b-23" data-validate="First Name is required">
                        <span class="label-input100">{{__('site.first_name')}}</span>
                        <input class="input100" type="text" name="first_name"
                               value="{{old('first_name')}}"
                               placeholder="{{__('site.first_name')}}">

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Last Name is required">
                        <span class="label-input100">{{__('site.last_name')}}</span>
                        <input class="input100" type="text" name="last_name"
                               value="{{old('last_name')}}"
                               placeholder="{{__('site.last_name')}}">

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Email is required">
                        <span class="label-input100">{{__('site.email')}}</span>
                        <input class="input100" type="email" name="email"
                               value="{{old('email')}}"
                               placeholder="{{__('site.email')}}">

                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Phone is required">
                        <span class="label-input100">{{__('site.phone')}}</span>
                        <input class="input100" type="tel" name="phone"
                               value="{{old('phone')}}"
                               placeholder="{{__('site.phone')}}">

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">{{__('site.password')}}</span>
                        <input class="input100" type="password" name="password" placeholder="{{__('site.password')}}">

                    </div>

                    <div class="text-right p-t-8 p-b-31">

                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                {{__('site.register')}}
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							{{__('site.login')}}
						</span>

                        <a href="{{route('site.login')}}" class="txt2">
                            {{__('site.login')}}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
