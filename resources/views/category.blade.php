@extends('layouts')
@section('title', 'Категории')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Категории</h2>

    <div class="table-responsive"> <!-- Обернули в таблицу с адаптивной версткой -->
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Кол-во товаров</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cats as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->products_count }}</td>
                    <td>
                        <a href="{{ route('category.show', $category) }}" class="btn btn-info btn-sm" title="Просмотреть">
                            👁️
                        </a>
                        <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm" title="Редактировать">
                            ✏️
                        </a>
                        @if ($category->products_count === 0)
                        <form action="{{ route('category.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить категорию?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить">
                                🗑️
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Пагинация -->
    <div class="d-flex justify-content-center mt-3">
        <ul class="pagination pagination-sm">
            {{ $cats->links() }}
        </ul>
    </div>
</div>
@endsection