@component('mail::message')
# Hi {{$user->name}}

Thank you for registering at <a href="https://vic.com.ro">vic.com.ro</a> !
This site is still in development and I hope to improve everything sooner as possible.

@component('mail::button', ['url' => 'https://vic.com.ro/auth/login'])
User login
@endcomponent

@component('mail::button', ['url' => 'https://vic.com.ro'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
