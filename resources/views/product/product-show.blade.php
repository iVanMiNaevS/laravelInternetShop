@extends('layouts')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4>Продукт: {{ $product->name }}</h4>
        </div>

        <div class="card-body row">
            <!-- Изображение -->
            @if($product->image)
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="img-fluid rounded">
            </div>
            @endif

            <!-- Информация о продукте -->
            <div class="{{ $product->image ? 'col-md-8' : 'col-12' }}">
                <p><strong>ID:</strong> {{ $product->id }}</p>
                <p><strong>Название:</strong> {{ $product->name }}</p>
                <p><strong>Описание:</strong><br> {{ $product->description }}</p>
                <p><strong>Категория:</strong> {{ $product->category->name ?? 'Без категории' }}</p>
                <p><strong>Цена:</strong> {{ number_format($product->price, 2) }} ₽</p>

                <div class="mt-3">
                    <a href="{{ route('products.getEdit', $product) }}" class="btn btn-warning">Редактировать</a>

                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить этот продукт?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection