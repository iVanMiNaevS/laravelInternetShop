@extends('layouts')


@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-success text-white">
            <h4>Создание новой категории</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <!-- Название категории -->
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        id="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Описание -->
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        id="description" rows="4">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Кнопки -->
                <button type="submit" class="btn btn-primary">Создать</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Назад</a>
            </form>
        </div>
    </div>
</div>
@endsection