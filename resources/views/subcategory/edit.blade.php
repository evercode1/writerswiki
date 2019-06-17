@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Edit Subcategory</title>

@endsection


@section('content')

    <div class="container ">

            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Edit Subcategory</h1>

                <section class="mt-20">

                @include('subcategory.edit-form')

                </section>

            </div>

    </div>

@endsection

