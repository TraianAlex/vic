@component('mail::message')
# Hi {{$admin->name}}

You created a new link

@component('mail::button', ['url' => 'https://vic.com.ro/auth/login'])
User login
@endcomponent

@component('mail::button', ['url' => 'https://vic.com.ro'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
