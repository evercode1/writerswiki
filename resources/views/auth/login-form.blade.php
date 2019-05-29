

    <div class="row">

        <h1 class="flow-text grey-text text-darken-1">Login</h1>

    </div>



<form  method="POST"
       action="{{ url('/login') }}">

       {{ csrf_field() }}

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
                          name="password"
                          type="password"
                          class="validate"
                          placeholder="enter your password..."
                          required>
                   <label for="password">Password</label>
               </div>

               @if ($errors->has('password'))

                   <span class="form-error">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>

               @endif
           </div>




    <!-- end password input -->



        <!-- remember me -->


        <div class="row">
            <div class="ml-10">

                <p>
                    <label>
                        <input type="checkbox"
                               id="remember"
                               name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                               />
                        <span>Remember Me</span>
                    </label>
                </p>

            </div>
        </div>


        <!-- end remember me -->

        <!-- submit button -->

        <div class="row ml-10" >

            <button class="btn waves-effect waves-light" type="submit">Submit<i class="material-icons right">send</i>

            </button>

        </div>

        <!-- end submit button -->



    <!-- end row for remember me and submit -->

</form>



