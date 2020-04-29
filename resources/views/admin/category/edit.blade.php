@extends('admin.layouts.admin')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Категории</h4>
                        <p class="card-category">Редактирование категории</p>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{route('category.update', ['id'=>$category->id])}}" enctype="multipart/form-data">
                            @include('admin.category.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

