@component('mail::message')
# Introduction

Apply to {{$data["applyto"]}}<br>
Duration {{$data["duration"]}}<br>
Reason {{$data["reason"]}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
