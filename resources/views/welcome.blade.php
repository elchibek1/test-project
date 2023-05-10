@extends('layouts.app')
@section('content')
      <div class="container" style="text-align: center">
          <div class="welcome" style="margin-bottom: 50px">
              <h2>Добро пожаловать на сайт!</h2>
          </div>
          <div class="">
              <h3 class="text-center">Мои записи</h3>
              <a href="{{route('records.index')}}">
                  <button class="btn btn-outline-primary">Зайти</button>
              </a>
          </div>
      </div>
@endsection
