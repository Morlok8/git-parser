@extends('layouts.layout')

@section('content')
    <div class = "row main_row">
        <form action="{{route('search-result')}}" method="post" class="col-lg-6 offset-lg-3 ">
            @csrf
            <div class="form-group mx-auto my-3">
                <label for="exampleInputPassword1">Запрос поиска в Github</label>
                <input type="text" class="form-control" id="query" name="query" placeholder="Введите запрос">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div> 
@endsection