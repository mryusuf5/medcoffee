<div class="modal fade" id="{{$modalId ?? 'defaultId'}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{$formRoute}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{$modalTitle ?? 'test'}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Opslaan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
