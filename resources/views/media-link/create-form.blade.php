<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/media-link') }}">

{{ csrf_field() }}

    <div class="row">

        <div class="{{ $errors->has('type') ? ' has-error' : '' }}">


            @if ($errors->has('type'))

                <span class="help-block">

                    <strong>{{ $errors->first('type') }}</strong>

                </span>

            @endif

        </div>

        <div class="{{ $errors->has('category') ? ' has-error' : '' }}">


            @if ($errors->has('category'))

                <span class="help-block">

                    <strong>{{ $errors->first('category') }}</strong>

                </span>

            @endif

        </div>

        <div class="{{ $errors->has('subcategory') ? ' has-error' : '' }}">


            @if ($errors->has('subcategory'))

                <span class="help-block">

                    <strong>{{ $errors->first('subcategory') }}</strong>

                </span>

            @endif

        </div>

       <div class="mb-20">

           <label>Link Type</label>


       </div>

        <select class="browser-default" name="type">

            <option value="">Please Choose One</option>

            @foreach($types as $key => $value)


                <option value="{{ $key }}">{{ $value }}</option>


                @endforeach



        </select>

        <create-category></create-category>

    </div>

    <!-- name input -->

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Link Name</label>

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

    <!-- author input -->

    <div class="{{ $errors->has('author') ? ' has-error' : '' }}">

        <label>Author</label>

        <input type="text"
               name="author"
               value="{{ old('author') }}" />

        @if ($errors->has('author'))

            <span class="help-block">

                    <strong>{{ $errors->first('author') }}</strong>

                </span>

        @endif

    </div>

    <!-- end author input -->

    <!-- url input -->

    <div class="{{ $errors->has('url') ? ' has-error' : '' }}">

        <label>Url</label>

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

    <!-- by_contributor select -->

    <div class="{{ $errors->has('by_contributor') ? ' has-error' : '' }}">

        <label>Is the Contributor the Author of the Content?</label>

        <select id="by_contributor" name="by_contributor">

            <option value="0">No</option>
            <option value="1">Yes</option>


        </select>

        @if ($errors->has('by_contributor'))

            <span class="help-block">

                    <strong>{{ $errors->first('by_contributor') }}</strong>

                </span>

        @endif

    </div>

    <!-- end by_contributor select -->



    <!-- submit button -->

    <div class="row mt-20">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>

    <!-- end submit button -->

</form>



