@component('mail::message')
# Welcome!

Hi {{$user->name}}
<br>
Welcome to Ideacan, your account has been created successfully. Now you can choose your best match ticket!

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
