<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/subcategory') }}">

{{ csrf_field() }}


    <!-- Parent Name dropdown -->

    <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">

               <label for="category_id">Category Name:</label>

               <select name="category_id">

               <option value="">Please Choose One</option>

               @foreach($categories as $category)

                   <option value="{{ $category->id }}">{{ $category->name }}</option>

                   @endforeach

                   </select>

               @if ($errors->has('category_id'))

                   <span class="help-block">

                   <strong>{{ $errors->first('category_id') }}</strong>

                   </span>

               @endif

            </div>




    <!-- end Parent Name dropdown -->

    <!-- name input -->

        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

            <label>Subcategory Name</label>

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




    <!-- submit button -->

    <div class="row">

        <button type="submit"
                class="waves-effect waves-light btn">

            Create

        </button>

    </div>

    <!-- end submit button -->

</form>



