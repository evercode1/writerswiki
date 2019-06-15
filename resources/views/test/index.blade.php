@extends('layouts.masters.master-auth')


@section('content')


    <!-- calls to Auth need to be replaced.  The profile thumb method will have to extracted, probably to a trait, so
         that whatever controller needs can access with a use statement. We want the info for the user that created
         the record, not the authenticated user. Auth user was just used to populate sample data -->

    <signature userid="{{ Auth::id() }}"
               username="{{ Auth::user()->profiles->name  }}"
               profile="{{ Auth::user()->profiles->id  }}"
               thumb="{{ Auth::user()->profileThumb() }}"
               tagline="{{ Auth::user()->profiles->tagline  }}"
    ></signature>

@endsection