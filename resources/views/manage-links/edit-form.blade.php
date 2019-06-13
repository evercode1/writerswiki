<form class="mt-20"
      role="form"
      method="POST"
      action="{{ url('/manage-links/'. $contributorLink->id) }}">

{{ method_field('POST') }}
{{ csrf_field() }}

<!-- Parent Dropdown -->

    <div class="{{ $errors->has('contributor_link_type_id') ? ' has-error' : '' }}">

                             <label for="contributor_link_type_id">ContributorLinkType Name:</label>

                             <select  name="contributor_link_type_id">

                             <option value="{{ $oldId }}">{{ $oldValue }}</option>

                             @foreach($contributorLinkTypes as $contributorLinkType)

                                 <option value="{{ $contributorLinkType->id }}">{{ $contributorLinkType->name }}</option>

                                 @endforeach

                                 </select>

                             @if ($errors->has('contributor_link_type_id'))

                                 <span class="help-block">

                                 <strong>{{ $errors->first('contributor_link_type_id') }}</strong>

                                 </span>

                             @endif

                          </div>


    <!-- End Parent Dropdown -->

<!-- name input -->

    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $contributorLink->name }}" />

        @if ($errors->has('name'))

            <span class="help-block">

                <strong>{{ $errors->first('name') }}</strong>

            </span>

        @endif

    </div>

    <!-- end name input -->

    <!-- url input -->

    <div class="{{ $errors->has('url') ? ' has-error' : '' }}">

        <label>Url</label>

        <input type="text"
               name="url"
               value="{{ $contributorLink->url  }}" />

        @if ($errors->has('url'))

            <span class="help-block">

                <strong>{{ $errors->first('url') }}</strong>

            </span>

        @endif

    </div>

    <!-- end url input -->




    <!-- submit button -->

        <div class="row">

            <button type="submit"
                    class="waves-effect waves-light btn">

                Update

            </button>

        </div>

    <!-- end submit button -->

    </form>






