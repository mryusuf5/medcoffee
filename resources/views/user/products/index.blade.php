<x-user-layout>
    <section class="banner-area" style="background-image: url('{{asset('img/products-header-bg.png')}}')" id="home">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-start">
                <div class="banner-content col-lg-7">
                    <h6 class="text-white text-uppercase">Now you can feel the Energy</h6>
                    <h1>
                        Start your day with <br>
                        MedCoffee
                    </h1>
                    <a href="#" class="primary-btn text-uppercase">Buy Now</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container" id="coffee">
            <div class="row" style="overflow-x: auto; white-space: nowrap">
                <div class="col-12">
                    <h3>Categories</h3>
                    <hr>
                </div>
                <div class="categoriesContainer d-flex" style="height: 21rem">
                    @foreach($categories as $category)
                        <div class="card mr-2 p-0" style="display: inline-block; float: none; width: 18rem;">
                            <img src="{{asset('img/category/' . $category->image)}}"
                                 class="card-img-top" style="height: 12rem; object-fit: cover">
                            <div class="card-body d-flex flex-column justify-content-between" style="height: 8rem;">
                                <div>
                                    <h5 class="card-title">{{$category->name}}</h5>
                                </div>
                                <div class="mt-2">
                                    <a id="{{$category->id}}" href="{{route('showCategory', $category->id)}}"
                                       class="btn btn-primary w-100 category-button">See products</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <br>
            <h3>All products</h3>
            <p>{{count($products)}} results</p>
            <hr>
            <div class="row justify-content-center">
                <br>
                @foreach($products as $product)
                    <x-products.product-card :title="$product->name" :description="$product->description"
                                    :image="$product->image" :route="route('showProduct', $product->id)"></x-products.product-card>
                @endforeach
            </div>
        </div>
    </section>

{{--    @section('scriptsBottomUser')--}}
{{--        <script>--}}
{{--            let categoryButtons = document.querySelectorAll('.category-button');--}}
{{--            let route = '{{route('api-userShowCategory')}}';--}}

{{--            categoryButtons.forEach(async (button) => {--}}
{{--               button.addEventListener('click', async (e) => {--}}
{{--                   e.preventDefault();--}}
{{--                   await fetchProducts(button.id)--}}
{{--               })--}}
{{--            });--}}

{{--            const fetchProducts = async (id) => {--}}
{{--                const json = {id: id};--}}
{{--                const res = await fetch(route, {--}}
{{--                    method: 'post',--}}
{{--                    body: JSON.stringify(json)--}}
{{--                });--}}
{{--                const data = await res.json();--}}

{{--                data.items.forEach((item) => {--}}

{{--                })--}}
{{--            }--}}
{{--        </script>--}}
{{--    @endsection--}}
</x-user-layout>
