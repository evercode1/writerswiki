@extends('layouts.masters.master-auth')

@section('title')

    <title>Create a Contributor Link</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Contributor Link</h1>

                <section class="mt-20">

                    @include('manage-links.create-form')

                </section>

        </div>

    </div>

@endsection

