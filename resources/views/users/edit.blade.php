@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать Аккаунт</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            {{--прередаём параметры с роута--}}
                        <form method="post" action="{{route('users.save',['id'=>$user->id])}}">
                            Ваше Имя и Фамилия <br>
                            <b>{{$user->name}} </b><input name="name" value="{{$user->name}}">
                            <input type="submit" value="save"><br>
                            <input name="email" value="{{$user->email}}">
                            <input type="submit" value="save">
                            {{csrf_field()}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
