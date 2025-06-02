@extends('user.profile')

@section('title', 'Perfil do Usuário')

@section('page-title', 'Profile')
@section('page-subtitle', 'Manage your personal information')

@section('content')
<h3><i class="fas fa-user me-2"></i>Personal Information</h3>
<hr class="my-4">

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Full name:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Email:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Phone:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->phone ?? '(Not informed)' }}</p>
    </div>
   
</div>

<button class="btn btn-primary">
    <i class="fas fa-edit me-2"></i>Edit Profile
</button>
@endsection
