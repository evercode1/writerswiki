@extends('layouts.masters.master-guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="center">
            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Reset Password</h1>

            </div>


                <div class="center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

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



                            <!-- submit button -->

                            <div class="row ml-10" >

                                <button class="btn waves-effect waves-light" type="submit">Send Password Reset Link<i class="material-icons right">send</i>

                                </button>

                            </div>

                            <!-- end submit button -->
                    </form>
        </div>
    </div>
</div>
@endsection
