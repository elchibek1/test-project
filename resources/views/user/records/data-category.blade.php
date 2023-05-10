@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Данные за определенную категорию</h1>
        <div class="category">
            <div class="form">
                <form action="{{route('get-data-category')}}" method="post">
                    @csrf
                    <select name="category_id" class="custom-select">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-primary">Проверить</button>
                </form>
            </div>
            <div class="data-category">
                <h3>Сумма за данную категорию</h3>
                <h3 class="text-info">
                    @if($category_sum)
                        {{$category_sum->sum('total')}}
                    @else
                        0
                    @endif
                </h3>
            </div>
        </div>

        <div class="back">
            <a href="{{route('records.index')}}">
                <button class="btn btn-outline-success">Назад</button>
            </a>
        </div>
    </div>
@endsection
