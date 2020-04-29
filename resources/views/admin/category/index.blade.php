@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Категории</h4>
                        <p class="card-category">Категории</p>
                    </div>
                    <div class="card-body">
                        <a href="{{route('category.create')}}" class="btn btn-primary">Добавить<i class="material-icons">add</i></a>
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>

                                        <td>
                                            <a class="btn btn-outline-primary btn-sm mb-2 "
                                               href="{{route('category.edit', ['id' => $category->id])}}">
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
