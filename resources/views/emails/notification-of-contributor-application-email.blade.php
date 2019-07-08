@component('mail::message')
# A User has Applied to be Contributor

##  {{ $user->name }} would like to be a contributor.

Go to admin and approve or disapprove.

@component('mail::button', ['url' => 'https://www.writerswiki.com'])
Visit Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@component('mail::panel', ['url' => ''])
You are receiving this email because you subscribed to WritersWiki.
You may Unsubscribe by clicking <a href="https://www.writerswiki.com/unsubscribe">here</a>.
@endcomponent

@endcomponent


