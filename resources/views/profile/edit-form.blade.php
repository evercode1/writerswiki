<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/profile/'. $profile->id) }}"
enctype="multipart/form-data">

{{ method_field('PATCH') }}
{{ csrf_field() }}


<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $profile->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- description input -->

    <div class="{{ $errors->has('body') ? ' has-error' : '' }}">

        <label>Description</label>

        <textarea id="description" name="body">{!! $profile->description !!} </textarea>

        @if ($errors->has('body'))

            <span class="help-block">

                    <strong>{{ $errors->first('body') }}</strong>

                </span>

        @endif

    </div>

    <!-- end description input -->





    <!-- is_contributor select -->

            <div class="{{ $errors->has('is_contributor') ? ' has-error' : '' }}">

                <label>Contributor?</label>

                <select id="is_contributor" name="is_contributor">

                    <option value="{{ $profile->is_contributor }}">{{ $profile->is_contributor == 1 ? 'Yes' : 'No' }}</option>

                    @if($profile->is_contributor == 1)

                        <option value="0">No</option>

                    @else

                        <option value="1">Yes</option>

                    @endif

                </select>

                @if ($errors->has('is_contributor'))

                    <span class="help-block">

                        <strong>{{ $errors->first('is_contributor') }}</strong>

                    </span>

                @endif

            </div>

    <!-- end is_contributor select -->

    <!-- Begin file input -->

    <div class="row mt-20">

        <div class="{{ $errors->has('image') ? 'has-error' : '' }}">

            <div class="row">
                <label>Book Image</label>

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






