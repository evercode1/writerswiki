<div class="row">



    <div class="row">

        <h1 class="flow-text grey-text text-darken-1">Update Settings</h1>

    </div>



    <form  method="POST"
           action="{{ url('/settings') }}">

    <input type="hidden"
               name="_method"
               value="PATCH">

    {{ csrf_field() }}

    <!-- name input -->
        <div class="row">
            <div class="input-field col s12">
                <input id="name"
                       name="name"
                       type="text"
                       class="validate"
                       value="{{ old('name') ? old('name') : $user->name }}"
                       placeholder="enter your username...">
                <label for="name">User Name</label>
            </div>

            @if ($errors->has('name'))

                <span class="form-error">
                     <strong>{{ $errors->first('name') }}</strong>
                </span>

            @endif
        </div>



    <!-- end name input -->

    <!-- email input -->

        <div class="row">
            <div class="input-field col s12">
                <input id="email"
                       name="email"
                       type="email"
                       class="validate"
                       value="{{ old('email') ? old('email') : $user->email }}"
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


        <!-- is_subscribed checkbox -->

        <div class="row">

            <div class="row">
                <div class="ml-20">

                    <p>
                        <label>
                            <input type="checkbox"
                                   id="is_subscribed"
                                   name="is_subscribed"
                                    {{ old('is_subscribed') ? 'checked' : $user->isUserSubscribed($user) ? 'checked' : '' }}
                            />
                            <span>Subscribe to Newsletter?</span>
                        </label>
                    </p>

                </div>
            </div>

            @if ($errors->has('is_subscribed'))

                <span class="form-error">
                        <strong>{{ $errors->first('is_subscribed') }}</strong>
                    </span>

            @endif

        </div>

        <!-- end is_subscribed checkbox -->


        <!-- submit button -->

        <div class="row ml-10" >

            <button class="btn waves-effect waves-light" type="submit">Update<i class="material-icons right">send</i>

            </button>

            <a href="/password/reset" class="waves-effect waves-light btn right">Reset Password</a>

        </div>

        <!-- end submit button -->


    </form>





</div>