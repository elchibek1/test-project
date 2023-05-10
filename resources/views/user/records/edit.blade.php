@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <div class="create text-center">
            <form action="{{route('records.update', compact('record'))}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group mt-4" style="width: 50%;">
                    <label for="date">Дата</label>
                    <input type="date" class="form-control" name="date" value="{{$record->date}}">
                    @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-2" style="width: 75%;">
                    <label for="kind">Тип</label>
                    <select name="kind">
                        <option value="income">Доход</option>
                        <option value="expense">Расход</option>
                    </select>
                    @error('kind')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4" style="width: 75%;">
                    <label for="category_id">Категория</label>
                    <select name="category_id" class="custom-select">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2" style="width: 50%;">
                    <label for="total">Сумма</label>
                    <input type="text" class="form-control" name="total" value="{{$record->total}}">
                    @error('total')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="comment" class="mt-4 mb-0 pb-0">Комментарий</label>
                <div class="form-group ">

                    <textarea name="comment" style="width: 75%">
                        {{$record->comment}}
                    </textarea>
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button  type="submit" class="btn btn-primary mt-3">Изменить</button>
            </form>
        </div>
        <a href="{{route('records.index')}}"><button  type="submit" class="btn btn-warning mt-3">Назад </button></a>
    </div>

@endsection
