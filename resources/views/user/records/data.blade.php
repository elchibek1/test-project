@extends('layouts.app')
@section('content')
    <div class="container mt-5 text-start">
        <h1 class="text-center">Мои данные:</h1>
        <div class="data">
            <div class="income">
                <h3>
                    Общий доход: {{$income}}
                </h3>
            </div>
            <div class="expense">
                <h3>
                    Общий расход: {{$expense}}
                </h3>
            </div>
            <div class="report">
                <h3>
                    Разность: {{$report}}
                </h3>
            </div>
        </div>
        <div class="back">
            <a href="{{route('records.index')}}"><button class="btn btn-outline-primary">Вернуться</button></a>
        </div>
    </div>

@endsection
