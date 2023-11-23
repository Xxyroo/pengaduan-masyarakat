
@extends ('layouts.backend.admin.master')
@section('content')
<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5"> <div class="card-body p-0">
<div class="card">
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success"
    role="alert">
{{ session('status') }}
</div>
@endif
{{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div>
@endsection