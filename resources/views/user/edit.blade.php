@extends('layouts.masters.master-admin-dash')

@section('title')

    <title>Edit a User</title>

@endsection

@section('content')

    <div class="container">

        <div class="row">


            @include('user.edit-form')


        </div>

        <div class="row">

            @if($contributor)

                <div class="row">
                    <div class="col s12 m6">
                        <div class="card ">
                            <div class="card-content grey-text text-darken-2">
                                <span class="card-title">Contributor Application</span>
                                <p>{!! $contributor->description !!}</p>
                            </div>

                        </div>
                    </div>
                </div>



                @endif



        </div>


    </div>



@endsection