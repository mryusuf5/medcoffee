<x-admin-layout :title="$category->name" :backRoute=$backRoute>
    <div class="row">
        <form action="{{route('admin.productcategories.update', $category->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img style="width: 300px" src="{{asset('img/category/' . $category->image)}}" alt="">
            <div class="form-group col-md-5 col-12">
                <label>Afbeelding aanpassen</label>
                <input name="image" type="file" class="form-control">
            </div>
            <br>
            <div class="form-group col-md-5 col-12">
                <label>Categorie naam</label>
                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </div>
        </form>
        <form action="{{route('admin.productcategories.destroy', $category->id)}}" method="post" class="confirmForm mt-2">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Verwijderen">
        </form>
    </div>
    <hr>
    <a href="#" data-bs-toggle="modal" data-bs-target="#newProduct" class="btn btn-primary">Nieuwe product toevoegen</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="1">#</th>
                    <th colspan="2">@sortablelink('name', 'Naam')</th>
                    <th colspan="2">Beschrijving</th>
                    <th colspan="2">@sortablelink('stock', 'Aantal in stock')</th>
                    <th colspan="2">@sortablelink('price', 'Prijs')</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td colspan="1">
                        {{$index + 1}}
                        <img style="object-fit: cover" width="100" height="100" src="{{asset('img/product/' . $product->image)}}">
                    </td>
                    <td colspan="2">
                        {{$product->name}}
                    </td>
                    <td colspan="2">{{$product->description}}</td>
                    <td colspan="2">{{$product->stock}}</td>
                    <td colspan="2">&euro; {{number_format($product->price, 2, ',', '.')}}</td>
                    <td colspan="2">
                        <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-primary">Bekijken</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @component('components.modal')
        @slot('modalId')
            {{$modalId}}
        @endslot
        @slot('modalTitle')
            {{$modalTitle}}
        @endslot
        @slot('formRoute')
            {{$formRoute}}
        @endslot
        <div class="form-group">
            <label>Product naam <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="Product naam">
        </div>
        <br>
        <div class="form-group">
            <label>Prijs <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="price" placeholder="Prijs" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label>Beschrijving (optioneel)</label>
            <textarea name="description" id="" cols="30" rows="10"
                      class="form-control" placeholder="Beschrijving"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label>Stock (optioneel)</label>
            <input type="number" class="form-control" name="stock" placeholder="Stock">
        </div>
        <br>
        <div class="form-group">
            <label>Afbeelding (optioneel)</label>
            <input type="file" class="form-control" name="image">
        </div>
        <input type="text" value="{{$category->id}}" hidden name="category_id">
    @endcomponent
</x-admin-layout>
