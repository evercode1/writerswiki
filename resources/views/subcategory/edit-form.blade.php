<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/subcategory/'. $subcategory->id) }}">

{{ method_field('PATCH') }}
{{ csrf_field() }}

<!-- Parent Dropdown -->

    <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">

                             <label for="category_id">Category Name:</label>

                             <select  name="category_id">

                             <option value="{{ $oldId }}">{{ $oldName }}</option>

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


    <!-- End Parent Dropdown -->

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $subcategory->name }}" />

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

                    <option value="{{ $subcategory->is_active }}">{{ $subcategory->is_active == 1 ? 'Yes' : 'No' }}</option>

                    @if($subcategory->is_active == 1)

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

        <div class="row">

            <button type="submit"
                    class="waves-effect waves-light btn">

                Update

            </button>

        </div>

    <!-- end submit button -->

    </form>






