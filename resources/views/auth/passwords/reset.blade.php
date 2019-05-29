@extends('layouts.masters.master-guest')

@section('content')
    <div class="container">
        <div class="row">
            <div class="center">
                <div class="row">

                    <h1 class="flow-text grey-text text-darken-1">Password Reset</h1>

                </div>

            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

            <input type="hidden" name="token" value="{{ $token }}">

                <!-- email input -->

                <div class="row">
                    <div class="input-field col s12">
                        <input id="email"
                               name="email"
                               type="email"
                               class="validate"
                               value="{{ old('email') }}"
                               placeholder="enter your email...">
                        <label for="email">Email</label>
                    </div>

                    @if ($errors->has('email'))

                        <span class="form-error">
                     <strong>{{ $errors->first('email') }}</strong>
                </span>

                    @endif
                </div>



                <!-- end email input -->

                        <!-- password input -->

            <div class="row">

                            <div class="input-field col s12">

                                <input id="password"
                                       type="password"
                                       name="password"
                                       class="validate"
                                       value="{{ old('password') }}"
                                       placeholder="enter password..."
                                       required autofocus>

                                <label for="name">Password</label>

                                @if ($errors->has('password'))

                                <span class="form-error">

                                     <strong>{{ $errors->first('password') }}</strong>
                                </span>

                                @endif

                            </div>

            </div>
                        <!-- end password input -->

                        <!-- password confirmation -->

                        <div class="row">
                            <div class="input-field col s12">

                                <input id="password_confirmation"
                                       type="password"
                                       name="password_confirmation"
                                       class="validate"
                                       placeholder="retype password..."
                                       required autofocus>

                                <label for="name">Confirm Password</label>

                                @if ($errors->has('password_confirmation'))

                                    <span class="form-error">
                 <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>

                                @endif

                            </div>
                        </div>

                        <!-- end password confirmation -->

                <!-- submit button -->

                <div class="row ml-10" >

                    <button class="btn waves-effect waves-light" type="submit">Submit New Password<i class="material-icons right">send</i>

                    </button>

                </div>

                <!-- end submit button -->
                    </form>
            </div>
    </div>
</div>
@endsection
