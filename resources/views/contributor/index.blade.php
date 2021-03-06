@extends('layouts.masters.master-auth')

@section('meta')

    <script src="/ckeditor/ckeditor.js"></script>

@endsection


@section('content')

    <div class="container">

        <div class="row">


            <h1 class="flow-text grey-text text-darken-1">Contributor Status</h1>
            <p>Help other writers and promote your work.</p>


            @if($contributor == 'Approved')

                <p>You are approved.  You may contribute articles, snippets and more.</p>

            @elseif($contributor == 'Pending')

                <p>Your application is pending</p>

            @elseif($contributor == 'Rejected')

                <p>We're sorry.  We were unable to approve your application.</p>

            @else

                    @include('contributor.apply-form')

             @endif





        </div>




    </div>






    @endsection