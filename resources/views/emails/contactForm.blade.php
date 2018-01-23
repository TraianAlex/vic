@component('mail::message')
# Hi

Name: {{$name}}<br>
Email: {{$email}}<br>
Message: {{$message}}

@component('mail::button', ['url' => 'https://vic.com.ro/adm/login'])
Login Admin
@endcomponent

@component('mail::panel', ['url' => 'https://vic.com.ro/auth/login'])
Login User
@endcomponent

@component('mail::table', ['url' => 'https://vic.com.ro'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
