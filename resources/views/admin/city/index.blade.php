@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Города</h4>
                        <p class="card-city">Города</p>
                    </div>
                    <div class="card-body">
                        <a href="{{route('city.create')}}" class="btn btn-primary">Добавить<i class="material-icons">add</i></a>
                        <div class="table-responsive">
                            <table class="table" id="datatable-tabletools">
                                <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->id}}</td>
                                        <td>{{$city->name}}</td>

                                        <td>
                                            <a class="btn btn-outline-primary btn-sm mb-2 "
                                               href="{{route('city.edit', ['id' => $city->id])}}">
                                                <i class="material-icons md-12">edit</i>
                                            </a>
                                        </td>
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
