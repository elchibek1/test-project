@extends('layouts.app')
@section('content')
    <h1 class="text-center">Мои записи</h1>
    <div class="action text-center" >
        <a href="{{route('records.create')}}">
            <button class="btn btn-outline-primary">Создать</button>
        </a>
        <a href="{{route('data')}}"><button class="btn btn-outline-success">Все данные</button></a>
        <a href="{{route('data-category')}}"><button class="btn btn-outline-warning">Данные за категорию</button></a>
        <a href="{{route('data-month')}}"><button class="btn btn-success">Данные за месяц</button></a>
    </div>
    <div class="container overflow-hidden text-center mt-5">
        @foreach($records as $record)
            <div class="card mb-2 mx-3" style="width: 18rem; display: inline-block">
                <div class="card-body">
                    <h2> {{$record->date}} </h2>
                    <h3> @if($record->kind == 'income') Доход @else Расход @endif</h3>
                    <h3> {{$record->category->name}}</h3>
                    <h3> {{$record->total}}</h3>
                </div>
                <a href="{{route('records.edit', compact('record'))}}"><button class="btn btn-outline-success">Изменить</button></a>
            </div>
        @endforeach

    </div>
@endsection
