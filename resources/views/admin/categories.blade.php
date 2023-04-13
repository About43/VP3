@extends('layouts.app')

@section('content')
    <div class="content-middle">
        <div class="card-header">
            <h3 class="card-title">Categories</h3>
            <div class="card-tools">
                <a href="{{ route('admin.categories') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Добавить категорию</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.categories', $category->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('admin.categories', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы точно хотите удалить эту категорию?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Категории не найдены.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
