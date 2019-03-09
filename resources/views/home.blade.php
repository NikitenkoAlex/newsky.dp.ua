@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            Здравствуйте: <b>{{$name}}</b> ваш айпи {{ $ip}}
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <td> id</td>
                                <td> Имя</td>
                                <td> Почта</td>
                                <td> Дата регистрации</td>
                                <td> Редактировать  </td>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td> {{$user->id}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->created_at}} </td>
                                    <td>
                                        <a href="{{route('users.save',['id'=>$user->id]) }}">Редактировать</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
