{{-- Category Modal --}}
<div class="modal fade" id="addColor" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Rang qo'shish") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.colors.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                
                    <div class="form-group">
                        <label>Nomi</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="name"  value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>