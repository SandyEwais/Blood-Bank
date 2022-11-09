<x-mail::message>
#Reset Password.



<x-mail::button :url="'https://www.google.com/'">
Reset
</x-mail::button>

#Your Reset Code Is : {{$code}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

