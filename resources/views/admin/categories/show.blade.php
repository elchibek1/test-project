@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>
            Категория: {{$category->name}}
        </h3>
        <button class="btn btn-warning">
            <a href="{{route('admin.categories.index')}}">Назад</a>
        </button>
    </div>
@endsection
