@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Пользователи</h4>
                        <p class="card-category">Пользователи</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable-tabletools">
                                <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>E-mail</th>
                                    <th>Роль</th>
                                    <th>Город</th>
                                    <th>Ник</th>
                                    <th>Рэйтинг</th>
                                    <th>Дата регистрации</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->city->name}}</td>
                                        <td>{{$user->nickname}}</td>
                                        <td>{{$user->rating_score}}</td>
                                        <td>{{$user->created_at}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
