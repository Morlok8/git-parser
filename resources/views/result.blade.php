@extends('layouts.layout')
@section('content')
<div class = "row main_row">
    <pre>
    @if(isset($array))
                @foreach($array['items'] as $key => $value)
                <div class="card mt-3 mx-auto" style="width: 18rem;">
                    <div class="card-body">
                        <h4 class="card-title">Карта репозитория</h4>
                        <h5>Имя: <p class="card-title">{{$value['name']}}</p></h5>
                        <h5>Автор:<p class="card-title">{{$value['owner']['login']}}</p></h5>
                        <h5>Количество звезд:<p class="card-title">{{$value['stargazers_count']}}</p></h5>
                        <h5>Количество просмотров :<p class="card-title">{{$value['watchers']}}</p></h5>
                        <a href="{{$value['html_url']}}" class = "stretched-link"> </a>
                    </div>
                </div>
                                    
                @endforeach
    @else
        <h2> No array </h2>
    @endif
        
</div>
@endsection
