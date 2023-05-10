@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Данные за определенный месяц</h1>
        <div class="category">
            <div class="form">
                <form action="{{route('get-data-month')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="month">Месяц</label>
                        <input type="text" class="form-control" name="month" value="{{old('month')}}">
                        @error('month')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="year">Год</label>
                        <input type="text" class="form-control" name="year" value="{{old('year')}}">
                        @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-outline-primary mt-3">Проверить</button>
                </form>
            </div>
            <div class="data-category">
                <div class="income">
                    <h3>Доход за данный месяц</h3>
                    <h3 class="text-info">
                        @if($month_sum_income)
                            {{$month_sum_income}}
                        @else
                            0
                        @endif
                    </h3>

                </div>
                <div class="expense">
                    <h3>Расход за данный месяц</h3>
                    <h3 class="text-info">
                        @if($month_sum_expense)
                            {{$month_sum_expense}}
                        @else
                            0
                        @endif
                    </h3>

                </div>
            </div>
        </div>

        <div class="back">
            <a href="{{route('records.index')}}">
                <button class="btn btn-outline-success">Назад</button>
            </a>
        </div>
    </div>
@endsection
