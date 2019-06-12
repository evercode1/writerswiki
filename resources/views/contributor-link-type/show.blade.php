@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>ContributorLinkType</title>

@endsection

@section('content')

        <div class="container">

        <h1 class="flow-text grey-text text-darken-1">Contributor Link Type</h1>

        <div class="row">

        <ul class="collection with-header">
                        <li class="collection-header"><h4>{{ $contributorLinkType->name }}</h4></li>



        </ul>



        </div>

        </div>

@endsection

