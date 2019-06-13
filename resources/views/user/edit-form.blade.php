<div class="row">



    <div class="row">

        <h1 class="flow-text grey-text text-darken-1">Update User</h1>

    </div>



    <form  method="POST"
           action="{{ url('/user/'. $user->id) }}">

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

        <!-- status -->
        <div class="row">

        <div class="input-field col s12">
            <select id="status_id" name="status_id">
                <option value="{{ $user->status_id }}" selected>{{ $user->showStatusName($user->status_id) }}</option>

                @if($user->status_id != 10)
                <option value="10">Active</option>
                @endif
                @if($user->status_id == 10)
                <option value="7">Inactive</option>
                @endif
            </select>
            <label>Status</label>
        </div>




        @if ($errors->has('status_id'))

            <span class="form-error">

                <strong>{{ $errors->first('status_id') }}</strong>

            </span>

    @endif
        </div>


        <!-- end status -->

        <!-- contributor_status select -->

        <div class="row">

            <div class="row">

        <div class="{{ $errors->has('contributor_status ') ? ' has-error' : '' }}">

            <label>Contributor Status?</label>

            <select id="contributor_status" name="contributor_status">

                <option value="{{ $user->contributor_status }}">{{ $user->formatContributorStatus($user->contributor_status) }}</option>



                    <option value="5">None</option>
                    <option value="7">Pending</option>
                    <option value="10">Approved</option>



            </select>

            @if ($errors->has('contributor_status'))

                <span class="help-block">

                        <strong>{{ $errors->first('contributor_status') }}</strong>

                    </span>

            @endif

        </div>
            </div>

        </div>

        <!-- end contributor_status select -->

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

        <!-- is_admin checkbox -->

            <div class="row">

                <div class="row">
                    <div class="ml-20">

                        <p>
                            <label>
                                <input type="checkbox"
                                       id="is_admin"
                                       name="is_admin"
                                        {{ old('is_admin') ? 'checked' : $user->isUserAdmin($user) ? 'checked' : '' }}
                                />
                                <span>Is Admin?</span>
                            </label>
                        </p>

                    </div>
                </div>

                @if ($errors->has('is_admin'))

                    <span class="form-error">
                        <strong>{{ $errors->first('is_admin') }}</strong>
                    </span>

                @endif

        </div>

        <!-- end is_admin checkbox -->

        <!-- is_contributor checkbox -->

        <div class="row">

            <div class="row">
                <div class="ml-20">

                    <p>
                        <label>
                            <input type="checkbox"
                                   id="is_contributor"
                                   name="is_contributor"
                                    {{ old('is_contributor') ? 'checked' : $user->isUserContributor($user) ? 'checked' : '' }}
                            />
                            <span>Is Contributor?</span>
                        </label>
                    </p>

                </div>
            </div>

            @if ($errors->has('is_contributor'))

                <span class="form-error">
                        <strong>{{ $errors->first('is_contributor') }}</strong>
                    </span>

            @endif

        </div>

        <!-- end is_contributor checkbox -->



        <!-- submit button -->

        <div class="row ml-10" >

            <button class="btn waves-effect waves-light" type="submit">Update<i class="material-icons right">send</i>

            </button>

        </div>

        <!-- end submit button -->



        <!-- end row for remember me and submit -->

    </form>





</div>