@component('mail::message')
# Welcome to Blogcone

Thank you so much for registering.<br/>
Your username is: {{ $user->username }}

@component('mail::button', ['url' => ''])
Explore
@endcomponent

Thanks,<br/>
{{ config('app.name') }}
@endcomponent
