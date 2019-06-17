<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/book/'. $book->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

    <div class="row">

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

    <edit-category  :oldcat="{{ json_encode($oldcategory) }}"
                    :oldsub="{{ json_encode($oldsubcategory) }}"

    ></edit-category>

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $book->name }}" />

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
                   value="{{ $book->author }}" />

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
                   value="{{ $book->url }}" />

            @if ($errors->has('url'))

                <span class="help-block">

                <strong>{{ $errors->first('url') }}</strong>

            </span>

            @endif

        </div>

        <!-- end url input -->



    <!-- is_active select -->

            <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

                <label>Is Active?</label>

                <select id="is_active" name="is_active">

                    <option value="{{ $book->is_active }}">{{ $book->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($book->is_active == 1)

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


    <!-- description input --use of CKEditor forces us to name the field body, saves as description -->

        <div class="{{ $errors->has('body') ? ' has-error' : '' }}">

            <label>Description</label>

            <textarea id="description" name="body">{!! $book->description !!}</textarea>

            @if ($errors->has('body'))

                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>

            @endif

        </div>

    <!-- end description input -->




    <!-- submit button -->

        <div class="row mt-20">

            <button type="submit"
                    class="waves-effect waves-light btn">

                Update

            </button>

        </div>

    <!-- end submit button -->

    </form>


    @section('scripts')

        <script>
            CKEDITOR.replace( 'body' );
        </script>

    @endsection



