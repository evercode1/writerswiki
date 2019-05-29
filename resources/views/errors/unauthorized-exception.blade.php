@extends('layouts.masters.master-guest')

@section('content')

    <div class="container">

    <div class="alert alert-danger alert-dismissible alert-important mt-25 text-center" role="alert">

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>

        <strong>Oh Snap!</strong> {{ $exception->getMessage() }} You are not authorized to do this.

    </div>

    </div>

@endsection