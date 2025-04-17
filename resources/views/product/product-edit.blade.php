@extends('layouts')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-dark">
            <h4>Редактировать продукт: {{ $product->name }}</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('products.edit', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Название -->
                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $product->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Описание -->
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <!-- Цена -->
                <div class="mb-3">
                    <label for="price" class="form-label">Цена (₽)</label>
                    <input type="number" name="price" id="price" step="0.01" min="0"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $product->price) }}">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Текущая картинка -->
                @if($product->image)
                <div class="mb-3">
                    <label class="form-label">Текущая картинка:</label><br>
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" class="img-thumbnail" width="200">
                </div>
                @endif

                <!-- Загрузка новой картинки -->
                <div class="mb-3">
                    <label for="image" class="form-label">Новая картинка (опционально)</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Кнопки -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection