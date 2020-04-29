{{csrf_field()}}
<div class="row">
    <div class="col-md-6">

            <label class="bmd-label-floating">Название</label>
            <input type="text" class="form-control"
                   name="name"
                   value="{{$category ? $category->name : old('name')}}"
                   id="name"
                   required
            >

    </div>
</div>


<button type="submit" class="btn btn-primary pull-right">Сохранить<i class="material-icons">check</i> </button>
<a href="{{route('category.index')}}" type="button" class="mb-2 btn btn-medium btn-primary mr-1">
    <i class="material-icons md-12">arrow_back</i> Назад
</a>
<div class="clearfix"></div>





