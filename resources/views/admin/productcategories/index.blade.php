<x-admin-layout :title=$title>
    <a href="#" data-bs-toggle="modal" data-bs-target="#newCategory" class="btn btn-primary">
        Nieuwe categorie toevoegen
    </a>

    <div class="mt-4 row gap-2 justify-content-center">
        @foreach($categories as $category)
            <x-category-card :image="$category->image" :title="$category->name" :category="$category">
            </x-category-card>
        @endforeach
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
            <label>Categorie naam <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="Categorie naam">
        </div>
        <br>
        <div class="form-group">
            <label>Afbeelding (optioneel)</label>
            <input type="file" class="form-control" name="image">
        </div>
    @endcomponent
</x-admin-layout>
