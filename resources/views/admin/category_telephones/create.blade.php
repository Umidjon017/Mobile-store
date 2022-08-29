{{-- Category Modal --}}
<div class="modal fade" id="addProductCategory" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Telefon Kategoriya qo'shish") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.product-categories.telephones.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                
                    <div class="form-group">
                        <label>Mahsulot Kategoriyasiga biriktirish</label>
                        <select name="product_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                            <option value="0"> </option>
                            @foreach ($product_categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

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