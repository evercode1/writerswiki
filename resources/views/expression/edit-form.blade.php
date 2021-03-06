<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/expression/'. $expression->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

    <select name="emotion_id" id="emotion_id">

        <option value="{{ $expression->emotion->id }}">{{ $expression->emotion->name }}</option>

        @foreach($emotions as $emotion)

            <option value="{{ $emotion->id }}">{{ $emotion->name }}</option>

        @endforeach


    </select>

<!-- label input -->

    <div class="{{ $errors->has('label') ? ' has-error' : '' }}">

        <label>Label</label>

        <input type="text"
               name="label"
               value="{{ $expression->label }}" />

        @if ($errors->has('label'))

            <span class="help-block">

                <strong>{{ $errors->first('label') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->



    <!-- is_active select -->

            <div class="{{ $errors->has('is_active') ? ' has-error' : '' }}">

                <label>Is Active?</label>

                <select id="is_active" name="is_active">

                    <option value="{{ $expression->is_active }}">{{ $expression->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($expression->is_active == 1)

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

            <textarea id="description" name="body">{!! $expression->description !!}</textarea>

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



