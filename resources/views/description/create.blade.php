@extends('layouts.masters.master-auth')

@section('title')

    <title>Create a Description</title>

@endsection



@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Create Description</h1>

                <section class="mt-20">

                    @include('description.create-form')

                </section>

        </div>

    </div>

@endsection

