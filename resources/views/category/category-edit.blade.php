@extends('layouts')

@section('title', "Редактировать категорию")

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4>Редактирование категории</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Название категории -->
                <div class="mb-3">
                    <label for="name" class="form-label">Название категории</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $category->name) }}" required>
                </div>

                <!-- Описание категории -->
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Кнопка -->
                <button type="submit" class="btn btn-success">Сохранить изменения</button>
            </form>
        </div>
    </div>
</div>
@endsection