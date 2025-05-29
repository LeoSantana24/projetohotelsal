@extends('user.profile')

@section('title', 'Perfil do Usuário')

@section('page-title', 'Perfil')
@section('page-subtitle', 'Gerencie suas informações pessoais')

@section('content')
<h3><i class="fas fa-user me-2"></i>Informações Pessoais</h3>
<hr class="my-4">

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Nome Completo:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Email:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Telefone:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->phone ?? '(Não informado)' }}</p>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><strong>Data de Nascimento:</strong></label>
        <p class="form-control-plaintext">{{ Auth::user()->birth_date ? \Carbon\Carbon::parse(Auth::user()->birth_date)->format('d/m/Y') : '(Não informada)' }}</p>
    </div>
</div>

<button class="btn btn-primary">
    <i class="fas fa-edit me-2"></i>Editar Perfil
</button>
@endsection
