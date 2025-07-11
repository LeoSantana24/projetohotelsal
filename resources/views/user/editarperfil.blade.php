@extends('user.profile')

@section('title', 'Editar Perfil')

@section('page-title', 'Edit Profile')
@section('page-subtitle', 'Update your profile')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('user.perfil.atualizar') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
        @error('phone')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
    <label for="country" class="form-label">Country</label>
    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $user->country) }}">
</div>


    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('user.perfil') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
