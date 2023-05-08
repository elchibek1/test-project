@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1 class="text" style="display: inline-block">Список категорий</h1>
        <div class="mt-3 mx-3" style="display: inline-block">
            <a href="{{route('admin.categories.create')}}">
                <button type="submit" class="btn btn-outline-primary">
                    Добавить
                </button>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 pb-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$category->name}}</td>
                        <td>

                            <a href="{{route('admin.categories.edit', ['category' => $category])}}">
                                <button class="btn btn-warning" style="display: inline-block">
                                    Изменить
                                </button>
                            </a>
                            <form action="{{route('admin.categories.destroy', ['category' => $category])}}"
                                  method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                            <a href="{{route('admin.categories.show', ['category' => $category])}}">
                                <button class="btn btn-success" style="display: inline-block">
                                    Просмотреть
                                </button>
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
