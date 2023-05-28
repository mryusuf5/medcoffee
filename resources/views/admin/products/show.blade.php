<x-admin-layout :title="$product->name" :backRoute="$backRoute">
    <div class="row">
        <form action="{{route('admin.products.update', $product->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img style="width: 300px" src="{{asset('img/product/' . $product->image)}}" alt="">
            <div class="form-group col-md-5 col-12">
                <label>Afbeelding aanpassen</label>
                <input name="image" type="file" class="form-control">
            </div>
            <br>
            <div class="form-group col-md-5 col-12">
                <label>Naam</label>
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group col-md-5 col-12">
                <label>Beschrijving</label>
                <input type="text" name="description" class="form-control" value="{{$product->description}}">
            </div>
            <br>
            <div class="form-group col-md-5 col-12">
                <label>Stock</label>
                <input type="text" name="stock" class="form-control" value="{{$product->stock}}">
            </div>
            <br>
            <div class="form-group col-md-5 col-12">
                <label>Prijs</label>
                <input type="text" name="price" class="form-control" value="{{number_format($product->price, 2, ',', '.')}}">
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group d-flex gap-2">
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </div>
        </form>
        <form action="{{route('admin.products.destroy', $product->id)}}" method="post" class="mt-2 confirmForm">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Verwijderen">
        </form>
    </div>
</x-admin-layout>
