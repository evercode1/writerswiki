<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/contributor-link') }}">

{{ csrf_field() }}

<!-- hidden input -->

    <div class="{{ $errors->has('user') ? ' has-error' : '' }}">


        <input type="hidden"
               name="user"
               value="{{ 'user' }}" />

        @if ($errors->has('user'))

            <span class="help-block">

                    <strong>{{ $errors->first('user') }}</strong>

                </span>

        @endif

    </div>

    <!-- end hidden input -->


    <!-- Parent Name dropdown -->

    <div class="{{ $errors->has('contributor_link_type_id') ? ' has-error' : '' }}">

               <label for="contributor_link_type_id">ContributorLinkType Name:</label>

               <select name="contributor_link_type_id">

               <option value="">Please Choose One</option>

               @foreach($contributorLinkTypes as $contributorLinkType)

                   <option value="{{ $contributorLinkType->id }}">{{ $contributorLinkType->name }}</option>

                   @endforeach

                   </select>

               @if ($errors->has('contributor_link_type_id'))

                   <span class="help-block">

                   <strong>{{ $errors->first('contributor_link_type_id') }}</strong>

                   </span>

               @endif

            </div>




    <!-- end Parent Name dropdown -->

    <!-- name input -->

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>ContributorLink Name</label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}" />

            @if ($errors->has('name'))

                <span class="help-block">

                    <strong>{{ $errors->first('name') }}</strong>

                </span>

            @endif

        </div>

    <!-- end name input -->

    <!-- url input -->

    <div class="{{ $errors->has('url') ? ' has-error' : '' }}">

        <label>ContributorLink Url</label>

        <input type="text"
               name="url"
               value="{{ old('url') }}" />

        @if ($errors->has('url'))

            <span class="help-block">

                    <strong>{{ $errors->first('url') }}</strong>

                </span>

        @endif

    </div>

    <!-- end url input -->






    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>

    <!-- end submit button -->

</form>



