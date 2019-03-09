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
                            <div><input name="search" id="search_text" /> </div>
                            <button id="load"> загрузить</button>
                        <br>
                             <div id="res"></div>
                        <table class="table table-bordered">
                            <tr>
                                <td> id</td>
                                <td> Имя</td>
                                <td> Почта</td>
                                <td> Дата регистрации</td>
                                <td> Редактировать</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        window.onload = function() {
            $('#load').click(function () {
                var name = $('#search_text').val();
                $('body #res').html('Loading....');
                $.getJSON("/public/ajax?name="+name, function (data) {
                    var items = [];
                    $('body #res').html('');
                    $.each(data, function (key, val) {
                        console.log(val);
                        $('body #res').append(
                            '<div>'
                            + '<h4>' + val.email + '</h4>'
                            + '<h4>' + '<hr>' + '</h4>'
                            + '<h4>' + val.name + '</h4>'
                            + '<h4>' + '<hr>' + '</h4>'
                            + '<h4>' + val.created_at + '</h4>'
                            + '<h4>' + '<hr>' + '</h4>'
                            + '<h4>' + val.id + '</h4>'
                            + '<h4>' + '<hr>' + '</h4>'
                            + '</div>'
                        );

                    });
                });
            });
        };
     </script>
@endsection
