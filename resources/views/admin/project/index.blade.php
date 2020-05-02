@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Проекты</h4>
                        <p class="card-category">Проекты</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable-tabletools">
                                <thead class=" text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Категория</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Старт</th>
                                    <th>Финиш</th>
{{--                                    <th>Создатель</th>--}}
{{--                                    <th>Исполнитель</th>--}}

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->category->name}}</td>
                                        <td>{{$project->price}}</td>
                                        <td>@if($project->status == 1)
                                                <span class="text-success">
                                            Завершен
                                        </span>
                                            @elseif($project->status == 0)
                                                <span class="text-info">
                                            В разработке
                                        </span>
                                            @else
                                                <span class="text-danger">
                                            Не начат
                                        </span>
                                            @endif</td>
                                        <td>{{$project->start}}</td>
                                        <td>{{$project->finish}}</td>
{{--                                        <td>{{$project->creator->lastname}}</td>--}}
{{--                                        <td>{{$project->implementer->nickname}}</td>--}}

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
