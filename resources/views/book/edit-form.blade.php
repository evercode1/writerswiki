<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/book/'. $book->id) }}"
      enctype="multipart/form-data">

{{ method_field('PATCH') }}
{{ csrf_field() }}

    <edit-category  :oldcategory="{{ json_encode($oldcategory) }}"
                           :categories="{{ json_encode($categories) }}"
                           :oldsubcategory="{{ json_encode($oldsubcategory) }}"
                           :subcategories="{{ json_encode($subcategories) }}"

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

    <!-- image file Form Input -->

        <div class="row mt-20">

            <div class="{{ $errors->has('image') ? 'has-error' : '' }}">

                <div class="row">

                    <label>Image Upload</label>

                </div>

                <div class="row">

                    <input type="file" name="image" id="image">
                </div>

                @if ($errors->has('image'))

                    <span class="help-block">

                    <strong>{{ $errors->first('image') }}</strong>

                    </span>

                @endif

            </div>

        </div>

    <!-- end file input -->


    <!-- submit button -->

        <div class="row">

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



