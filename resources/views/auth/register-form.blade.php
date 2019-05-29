<div class="container">

    <div class="row">
        <h1 class="flow-text grey-text text-darken-1">Registration</h1>

    </div>

    <div class="row">

     <form class="col s12"
      method="POST"
      action="{{ url('/register') }}">

      {{ csrf_field() }}

    <!-- name input -->


      <div class="row">
          <div class="input-field col s12">
              <input placeholder="enter name..."
                     id="name"
                     name="name"
                     type="text"
                     value="{{ old('name') }}"
                     class="validate">
              <label for="name">Name</label>
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
               type="email"
               name="email"
               class="validate"
               value="{{ old('email') }}"
               placeholder="enter email..."
               required autofocus>

            <label for="name">Email</label>

        @if ($errors->has('email'))

            <span class="form-error">
                 <strong>{{ $errors->first('email') }}</strong>
            </span>

        @endif

        </div>
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

    <!-- row needed for separation of social links -->

        <div class="row">

        <!-- terms checkbox -->

            <div class="row">
                <div class="ml-20">

                    <p>
                        <label>
                            <input type="checkbox"
                                   id="terms"
                                   name="terms"
                                    {{ old('terms') ? 'checked' : '' }}
                                   required autofocus/>
                            <span>I agree to the <a href="/terms-of-service">terms of service</a></span>
                        </label>
                    </p>

                </div>
            </div>



        @if ($errors->has('terms'))

            <span class="form-error">
                        <strong>{{ $errors->first('terms') }}</strong>
                    </span>

        @endif


        </div>

        <!-- end terms checkbox -->

        <!-- is_subscribed checkbox -->

        <div class="row">

            <div class="row">
                <div class="ml-20">

                    <p>
                        <label>
                            <input type="checkbox"
                                   id="is_subscribed"
                                   name="is_subscribed"
                                    {{ old('is_subscribed') ? 'checked' : '' }}
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
        <div class="row">

            <button class="btn waves-effect waves-light left ml-10" type="submit" name="action">Submit
                <i class="material-icons left">send</i>
            </button>

        </div>

        <!-- end submit button -->



</form>

</div>
</div>