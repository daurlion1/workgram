@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Города</h4>
                        <p class="card-city">Добавить город</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('city.store')}}" enctype="multipart/form-data">
                            @include('admin.city.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
