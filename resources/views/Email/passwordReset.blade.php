@component('mail::message')
# Change password Request

Click on button below to change password.

@component('mail::button', ['url' => 'http://recipe.ardinasiri.me/response-password-reset?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
