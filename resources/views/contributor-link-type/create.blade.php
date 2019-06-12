@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Create a ContributorLinkType</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Contributor Link Type</h1>

                <section class="mt-20">

                    @include('contributor-link-type.create-form')

                </section>

        </div>

    </div>

@endsection

