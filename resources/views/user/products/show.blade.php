<x-user-layout>
{{--    {{dd(Session::get('cart'))}}--}}
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row flex-row">
            <h1 class="col-12 m-0 p-0">{{$product->name}}</h1>
            <div class="d-flex flex-column justify-content-sm-start justify-content-center gap-2 col-sm-6 col-10 p-0 m-0">
                <img class="singleProductImage" src="{{asset('img/product/' . $product->image)}}">
                <div class="col p-2 d-flex gap-2 flex-wrap"></div>
            </div>
            <div class="col-md-6 col-10 d-flex flex-column gap-2">
                <h3 class="text-primary">&euro; {{$product->price}}</h3>
                <p style="height: 200px">{{$product->description}}</p>
                <form action="{{route('cartStore')}}" method="post">
                    @csrf
                    @method('POST')
                    <input type="text" hidden value="{{$product->id}}" name="product_id">
                    <div class="d-flex flex-column gap-2 w-100">
                        <div class="btn-group btn-group-toggle d-flex flex-column" data-toggle="buttons">
                            <label for="" class="btn btn-outline-primary active w-100 mb-2">
                                <input type="radio" name="options" value="200 Grams" checked> 200 Grams
                            </label>
                            <label for="" class="btn btn-outline-primary w-100">
                                <input type="radio" name="options" value="500 Grams"> 500 Grams
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" value="1">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-cart-shopping"></i> Add to cart
                    </button>
                </form>
            </div>
            <div class="col-10 mt-4">
                <div class="d-flex flex-md-row flex-column justify-content-between">
                    <h2>Customer reviews</h2>
                    <a href="#" data-toggle="modal" data-target="#reviewModal" class="btn btn-primary w-50">
                        Write a review
                    </a>
                </div>
                <div class="d-flex">
                    <h3>Average score: {{$averageScore}}/10</h3>
                </div>
                <hr>
                @foreach($reviews as $review)
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <h4>{{$review->name}}: </h4>
                            <div class="d-flex">
                                @for($i = 0; $i < $review->score; $i++)
                                <h5 class="d-flex align-items-center text-warning m-0">
                                    <i class="fa-solid fa-star"></i>
                                </h5>
                                @endfor
                            </div>
                        </div>
                        <div>
                            <small>{{$review->created_at}}</small>
                            <p>{{$review->review}}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('reviews.store', $product->id)}}" method="post">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group d-flex align-items-center">
                            <label>Score (1-5):</label>
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="score" value="5">
                                <label for="star5">5 stars</label>
                                <input type="radio" id="star4" name="score" value="4">
                                <label for="star4">4 stars</label>
                                <input type="radio" id="star3" name="score" value="3">
                                <label for="star3">3 stars</label>
                                <input type="radio" id="star2" name="score" value="2">
                                <label for="star2">2 stars</label>
                                <input type="radio" id="star1" name="score" value="1">
                                <label for="star1">1 stars</label>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <textarea name="review" cols="30" rows="10" class="form-control" placeholder="Review"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Write">
                        <input type="text" hidden value="{{$product->id}}" name="product_id">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scriptsBottomUser')
        <script>
            @if($message = Session::get('success'))
                Toastify({
                    text: '{{$message}}',
                    duration: 3000,
                    gravity: 'top',
                    position: 'center'
                }).showToast();
            @endif
        </script>
    @endsection
</x-user-layout>
