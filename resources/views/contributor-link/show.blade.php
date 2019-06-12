@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>ContributorLink</title>

@endsection

@section('content')

<div class="container">

    <h1 class="flow-text grey-text text-darken-1">Contributor Link Details</h1>



        <div class="panel panel-default">

                <!-- Table -->
                <table class="table table-striped">
                    <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date Created</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>


                    <tr>
                        <td>{{ $contributorLink->id }} </td>
                        <td> <a href="/contributor-link/{{ $contributorLink->id }}/edit">
                                {{ $contributorLink->name }}</a></td>
                                <td>{{ $contributorLinkType }}</td>
                        <td>{{ $contributorLink->created_at }}</td>

                        <td> <a href="/contributor-link/{{ $contributorLink->id }}/edit">

                                <button type="button" class="btn btn-default">Edit</button></a></td>

                        <td>

                        <div class="form-group">

                        <form class="form" role="form" method="POST"
                        action="{{ url('/contributor-link/'. $contributorLink->id) }}">

                        <input type="hidden" name="_method" value="delete">

                        {{ csrf_field() }}

                        <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>

                       </div>

                       </td>

                    </tr>

                </table>

        </div>

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