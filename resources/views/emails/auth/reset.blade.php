@component('mail::message')
# Introduction

the code is : {{ $code }}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
