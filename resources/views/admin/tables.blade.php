@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header-primary">
                        <h4 class="card-title text-center">Пользователи</h4>
                        <h3 class="card-category text-center">{{$usersCount}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header-primary">
                        <h4 class="card-title text-center ">Проекты</h4>
                        <h3 class="card-category text-center" >{{$projectsCount}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header-primary">
                        <h4 class="card-title text-center ">Категории</h4>
                        <h3 class="card-category text-center" >{{$categoriesCount}}</h3>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
