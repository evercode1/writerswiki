@extends('layouts.masters.master-auth')

@section('title')

    <title>Manage Links</title>

@endsection


@section('content')

    <div class="container">

        <div class="row">

            <h1 class="flow-text grey-text text-darken-1">Manage Links</h1>

            <div><p>Add up to 12 Links</p></div>

            <a href="/manage-links/create" class="waves-effect waves-light btn-small mb-20">Add New</a>


        </div>


        <div class="row">

            @foreach($links as $name => $infos)

                <h4><u>{{ $name }}</u></h4>


                @forEach($infos as $info)

                <ul>
                    <li><a href="{{ $info->Url }}" class="grey-text text-darken-2">
                            <h5 class="grey-text text-darken-1">{{ $info->Name }}</h5></a>

                       <div><a href="/manage-links/{{ $info->Id }}/edit" class="waves-effect waves-light btn-small mt-20">edit</a></div>
                        <div>
                        <form class="form" role="form" method="POST" action="/manage-links-delete/{{ $info->Id }}">
                            <input type="hidden" name="_method" value="POST">
                            {{ csrf_field() }}
                            <input class="waves-effect waves-light btn-small mt-20"  Onclick="return ConfirmDelete();" type="submit"
                                   value="Delete">

                        </form>
                        </div>

                    </li>
                </ul>

                <hr>


            @endforeach


            @endforeach







        </div>


    </div>


@endsection

@section('scripts')
    <script>
        function ConfirmDelete()
        {
            return confirm("Are you sure you want to delete?");

        }
    </script>
@endsection