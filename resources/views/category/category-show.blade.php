@extends('layouts')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
            <h4>Категория: {{ $category->name }}</h4>
        </div>
        <div class="card-body">

            <p class="mb-4"><strong>Описание:</strong> {{ $category->description }}</p>

            <h5>Продукты в категории:</h5>

            @if($category->products->count())
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th class="text-center">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 2) }} ₽</td>
                        <td class="text-center">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">Посмотреть</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить этот продукт?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-muted">В этой категории пока нет продуктов.</p>
            @endif
        </div>
    </div>
</div>
@endsection