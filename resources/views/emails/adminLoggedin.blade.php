@component('mail::message')
# Hi

The follower user is visiting your admin area
- Name: {{$admin->name}}
- Email: {{$admin->email}}
- Created at: {{$admin->created_at}}

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
