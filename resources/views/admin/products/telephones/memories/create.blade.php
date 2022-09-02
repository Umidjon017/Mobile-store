{{-- Category Modal --}}
<div class="modal fade" id="addTelephoneMemory" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Telefon xotira qo'shish") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.telephone-memories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                
                    <div class="form-group">
                        <label>{{ __("Asosiy xotira") }}</label>
                        <input type="number" class="form-control" placeholder="Asosiy xotirani kiriting" name="memory_main"  value="{{ old('memory_main') }}">
                        @error('memory_main')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __("Tezkor xotira") }}</label>
                        <input type="number" class="form-control" placeholder="Tezkor xotirani kiriting" name="memory_ram"  value="{{ old('memory_ram') }}">
                        @error('memory_ram')
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