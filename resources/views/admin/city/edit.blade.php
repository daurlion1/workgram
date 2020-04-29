@extends('admin.layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Города</h4>
                        <p class="card-city">Редактирование города</p>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{route('city.update', ['id'=>$city->id])}}" enctype="multipart/form-data">
                            @include('admin.city.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

