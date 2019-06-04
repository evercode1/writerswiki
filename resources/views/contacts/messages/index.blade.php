@extends('layouts.masters.master-auth')

@section('content')



    <div class="container">


            <div class="row">

                <h1 class="flow-text grey-text text-darken-1">Support</h1>

                <section>

                <div class="row">

                    <!-- create button -->
                    <div class="mb-50">

                        <a href="/contact/create">
                            <button class="btn waves-effect waves-light">
                            Create New Support Request
                            </button>
                        </a>

                    </div>


                    <div class="row">

                    @if (count($messages) > 0)

                        <!-- List group -->

                        <ul class="collection">


                            @foreach($messages as $message)

                            <li class="collection-item mt-10 {{ $message->read ? '' :  ' make-bold'}}">

                                <a href="/support-messages-show/{{ $message->id }}">

                                        {{ $message->created }} -
                                        {{ \App\Utilities\Summarize::summary($message->message) }}

                                </a>
                                <a href="/support-messages-show/{{ $message->id }}">

                                @if ($message->reply )

                                    @if($message->read)

                                            <span class="square-badge-grey">read</span>




                                    @else



                                            <span class="square-badge-blue">new reply</span>



                                    @endif

                                @else

                                        <span class="square-badge-orange">pending</span>

                                @endif

                                </a>

                            </li>

                                @endforeach

                        </ul>

                        @else

                        You have no support messages.

                        @endif


                    </div>


                </div>

                </section>


            </div><!-- end blog-post -->


    </div> <!-- end container -->



@endsection

@section('scripts')

    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="/js/format_brackets.js"></script>
    @endsection