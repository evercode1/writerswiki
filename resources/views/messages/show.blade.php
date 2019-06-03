@extends('layouts.masters.master-auth')

@section('content')


    <div class="container">


        <div class="row">

            <div>

                <h1 class="flow-text grey-text text-darken-1">Support Message #{{ $message->id }}</h1>

                <section class="mt-20">

                <div class="row">

                    <!-- create button -->

                    <div>
                        <a href="/contact/create"><button class="waves-effect waves-light btn">
                            Create New Support Request
                        </button>
                        </a>
                    </div>

                    <ul class="collection mt-50">

                        @if($reply)

                        <li class="collection-item grey-text lighten-4">
                            Support replied on {{ $reply->created_at->format('m-d-Y') }}:



                        <p class="">{{ $reply->reply }}</p>

                        </li>

                        <li class="collection-item grey-text lighten-4">
                            In reply to your {{ $message->created_at->format('m-d-Y') }} message:

                        @endif

                            <p> {{ $message->message }}  </p>

                        </li>

                    </ul>


                </div>

                </section>



            </div>

        </div> <!-- end row -->



    </div> <!-- end container -->



@endsection

@section('scripts')

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="/js/format_brackets.js"></script>
    @endsection