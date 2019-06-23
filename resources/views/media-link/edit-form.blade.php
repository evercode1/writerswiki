<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/media-link/'. $mediaLink->id) }}">

    {{ method_field('PATCH') }}
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

            <option value="{{ $oldType->id  }}">{{ $oldType->name }}</option>

            @foreach($types as $key => $value)


                <option value="{{ $key }}">{{ $value }}</option>


            @endforeach



        </select>

        <edit-category  :oldcat="{{ json_encode($oldcategory) }}"
                        :oldsub="{{ json_encode($oldsubcategory) }}"

        ></edit-category>

        <!-- name input -->

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Name</label>

            <input type="text"
                   name="name"
                   value="{{ $mediaLink->name }}" />

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
                   value="{{ $mediaLink->author }}" />

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
                   value="{{ $mediaLink->url }}" />

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

                <option value="{{ $mediaLink->by_contributor }}">{{ $mediaLink->by_contributor == 1 ? 'Yes' : 'No' }}</option>

                @if($mediaLink->by_contributor == 1)

                    <option value="0">No</option>

                @else

                    <option value="1">Yes</option>

                @endif

            </select>

            @if ($errors->has('by_contributor'))

                <span class="help-block">

                        <strong>{{ $errors->first('by_contributor') }}</strong>

                    </span>

            @endif

        </div>

        <!-- end by_contributor select -->



        <!-- is_active select -->

        <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

            <label>Is Active?</label>

            <select id="is_active" name="is_active">

                <option value="{{ $mediaLink->is_active }}">{{ $mediaLink->is_active == 1 ? 'Yes' : 'No' }}</option>

                @if($mediaLink->is_active == 1)

                    <option value="0">No</option>

                @else

                    <option value="1">Yes</option>

                @endif

            </select>

            @if ($errors->has('is_active'))

                <span class="help-block">

                        <strong>{{ $errors->first('is_active') }}</strong>

                    </span>

            @endif

        </div>

        <!-- end is_active select -->





        <!-- submit button -->

        <div class="row mt-20">

            <button type="submit"
                    class="waves-effect waves-light btn">

                Update

            </button>

        </div>

        <!-- end submit button -->

</form>






