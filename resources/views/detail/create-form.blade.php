<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/detail') }}">

{{ csrf_field() }}



    <select name="description_id" id="description_id">

        <option value="">Please Choose One</option>

        @foreach($descriptions as $description)

            <option value="{{ $description->id }}">{{ $description->name }}</option>

            @endforeach


    </select>

    <!-- label input -->

        <div class="{{ $errors->has('label') ? ' has-error' : '' }}">

            <label>label</label>

            <input type="text"
                   name="label"
                   value="{{ old('label') }}" />

            @if ($errors->has('label'))

                <span class="help-block">

                    <strong>{{ $errors->first('label') }}</strong>

                </span>

            @endif

        </div>

    <!-- end label input -->

    <!-- is_active select -->

        <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

            <label>Is Active?</label>

            <select id="is_active" name="is_active">

                <option value="1">Active</option>
                <option value="0">Inactive</option>

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

            <textarea id="body" name="body"></textarea>

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

            Create

        </button>

    </div>

    <!-- end submit button -->

</form>

@section('scripts')

    <script>
        CKEDITOR.replace( 'body' );
    </script>

@endsection

