@extends('layouts.masters.master-auth')

@section('content')





    <div class="container">

        <div class="row">



                <h1 class="flow-text grey-text text-darken-1">{{ $contact->contactTopic->name }}</h1>

            <div class="mt-20">

                @include('contact.reply-form', ['user_id' => $contact->user_id, 'contact_id' => $contact->id])


            </div>






                <div class="row mt-20">


                    <div>
                        <!-- Default panel contents -->
                        <div><h5 class="flow-text grey-text text-darken-1">Message History:</h5></div>
                        <div>
                            <!-- List group -->
                            <ul class="collection">

                                @foreach($messages as $message)

                                    @if( ! $message->reply)

                                        <span class="grey-text">{{ $message->created }} {{ $contact->user->name }} requested:</span>

                                <li class="collection-item">

                                  <p class="grey-text text-darken-3">"{{ $message->message }}"</p>

                                </li>

                                        @else

                                         <span class="grey-text mt-10">{{ $message->created }} {{ $contact->user->name }} requested:</span>

                                        <li class="collection-item"><p class="grey-text text-darken-3">"{{ $message->message}}"</p></li>

                                    @endif




                                @if($message->reply)

                                    <li class="collection-item blue-text lighten-5">Support replied on {{ $message->replied }}:

                                        <p class="grey-text text-darken-1">"{{ $message->reply }}"</p></li>

                                    @else

                                        <li class="collection item mt-10 mb-10">
                                            <a href="/contact/{{ $message->id }}">No Reply From Support yet.</a>
                                        </li>


                                    @endif



                                @endforeach

                            </ul>
                        </div>



                    </div>




                </div>



        </div> <!-- end column -->



    </div> <!-- end container -->


@endsection
