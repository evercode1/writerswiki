<div id="settings" class="col s12">
    <div class="settings-group">
        <div class="setting">

            <a href="/settings">Settings</a>

        </div>
        <div class="setting">

            <a href="/password/reset">Reset Password</a>

        </div>

        <div class="setting">

            <form role="form"
                  id="cancel-form"
                  method="POST"
                  action="{{ url('/cancel') }}">

                {{ method_field('PATCH') }}
                {{ csrf_field() }}



            </form>



            <a href="/cancel" onclick="ConfirmDelete();">Cancel Account</a>

        </div>





    </div>
</div>



@section('scripts')

    <script>

        function ConfirmDelete()
        {

            if(confirm("Are you sure you want to Cancel?  This cannot be undone!")){

                event.preventDefault();

                return document.getElementById('cancel-form').submit();

            }

            event.preventDefault();

            return false;

        }



    </script>


@endsection