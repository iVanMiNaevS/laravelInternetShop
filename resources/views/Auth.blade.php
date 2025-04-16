@extends('layouts')

@section('title', 'Вход в аккаунт')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Вход</h3>
        <form action="auth" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email адрес</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Введите email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </form>
        <div class="mt-3 text-center">
            <a href="#">Забыли пароль?</a>
        </div>
    </div>
</div>
@endsection