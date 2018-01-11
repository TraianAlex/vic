@component('mail::message')
# Hi Traian

The follower user is registered in your site:
- Name: {{$user->name}}
- Email: {{$user->email}}

@component('mail::button', ['url' => 'https://vic.com.ro/adm/login'])
Login Admin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
