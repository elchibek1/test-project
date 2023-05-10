@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <div class="create text-center">
            <form action="{{route('records.store')}}" method="post">
                @csrf
                <div class="form-group mt-4" style="width: 50%;">
                    <label for="date">Дата</label>
                    <input type="date" class="form-control" name="date" value="{{old('date')}}">
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
                    <input type="text" class="form-control" name="total" value="{{old('total')}}">
                    @error('total')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-5">
                    <textarea name="comment" style="width: 75%">
                        {{old('comment')}}
                    </textarea>
                    <label for="comment">Комментарий</label>
                    @error('comment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button  type="submit" class="btn btn-primary mt-3">Создать</button>
            </form>
        </div>
        <a href="{{route('records.index')}}"><button  type="submit" class="btn btn-warning mt-3">Назад </button></a>
    </div>

@endsection
