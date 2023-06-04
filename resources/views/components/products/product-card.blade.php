<div class="card col-lg-3 col-md-5 col-10 mr-2 p-0">
    <img src="{{asset('img/product/' . $image)}}"
         class="card-img-top">
    <div class="card-body d-flex flex-column justify-content-between" style="height: 100%">
        <div>
            <h5 class="card-title">{{$title}}</h5>
            <p class="card-text">{{Str::limit($description, 25)}}</p>
        </div>
        <div class="mt-2">
            <a href="{{$route}}" class="btn btn-primary w-100">More info</a>
        </div>
    </div>
</div>
