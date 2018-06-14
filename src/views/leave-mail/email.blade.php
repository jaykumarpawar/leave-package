@component('mail::message')
# Introduction

{{-- {{dd($data)}} --}}
Apply to {{$data["applyto"]}}<br>
From {{$data["startdate"]}}<br>
To {{$data["enddate"]}}<br>
Reason {{$data["reason"]}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
