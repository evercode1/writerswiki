@extends('layouts.masters.master-auth')

@section('title')

    <title>Subcategory</title>

@endsection

@section('content')



        <h1>Subcategory Details</h1>



        <div class="panel panel-default">

                <!-- Table -->
                <table class="table table-striped">
                    <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Date Created</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>


                    <tr>
                        <td>{{ $subcategory->id }} </td>
                        <td> <a href="/subcategory/{{ $subcategory->id }}/edit">
                                {{ $subcategory->name }}</a></td>
                                <td>{{ $category }}</td>
                        <td>{{ $subcategory->created_at }}</td>

                        <td> <a href="/subcategory/{{ $subcategory->id }}/edit">

                                <button type="button" class="btn btn-default">Edit</button></a></td>

                        <td>

                        <div class="form-group">

                        <form class="form" role="form" method="POST"
                        action="{{ url('/subcategory/'. $subcategory->id) }}">

                        <input type="hidden" name="_method" value="delete">

                        {{ csrf_field() }}

                        <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>

                       </div>

                       </td>

                    </tr>

                </table>

        </div>

@endsection

@section('scripts')

    <script>

        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection