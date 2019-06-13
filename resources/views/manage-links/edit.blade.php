@extends('layouts.masters.master-auth')

@section('title')

    <title>Edit ContributorLink</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit ContributorLink</h1>

                <section class="mt-20">

                @include('manage-links.edit-form')

                </section>

            </div>

    </div>

@endsection

