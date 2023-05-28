<div class="card col-lg-3 col-md-5 col-12 p-0">
    <img src="{{asset('img/category/' . $image)}}" class="card-img-top categoryCard">
    <div class="card-body">
        <h5 class="card-title">{{$title}}</h5>
        <a href="{{route('admin.productcategories.show', $category)}}" class="btn btn-primary w-100">Bekijken</a>
    </div>
</div>
