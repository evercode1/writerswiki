
<h1 class="flow-text grey-text text-darken-1">Please Apply to Contribute</h1>

<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/contributor') }}">

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

    <!-- description input -->

    <div class="{{ $errors->has('body') ? ' has-error' : '' }}">

        <label>Briefly Tell Us Why You Want to Contribute</label>

        <textarea id="description" name="body"></textarea>

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

            Apply

        </button>

    </div>

    <!-- end submit button -->

</form>

@section('scripts')

    <script>
        CKEDITOR.replace( 'body' );
    </script>

@endsection



