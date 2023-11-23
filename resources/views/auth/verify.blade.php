@extends('layouts.backend.admin.master')


@section('content')
<div class="container">
<div class="card o-hidden border-Ø shadow-lg my-5"> <div class="card-body p-0">
<div class="card">
<div class="card-header">{{ ____('Verify Your
Email Address') }}</div>
<div class="card-body">
    @if (session('resent'))
    <div class="alert alert-success"
    role="alert">
{{ ___('A fresh verification link
has been sent to your email address.') }}
</div>
@endif
{{ ___('Before proceeding, please check
your email for a verification link.') }}

{{ ___('If you did not receive the email')
}},
<form class="d-inline" method="POST"
action="{{ route('verification.resend') }}">
@csrf
<button type="submit" class="btn
btn-link p-0 m-0 align-baseline">{{ ____('click here to request
another') }}</button>.
</form>
</div>
</div>
</div>
</div>
</div>
@endsection