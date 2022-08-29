{{-- Category Modal --}}
<div class="modal fade" id="editProductCategory{{$telephone_category->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Mahsulot kategoriya nomini tahrirlash") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.product-categories.telephones.update', $telephone_category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group ">
                        <label>Mahsulot Kategoriyasiga biriktirish</label>
                        <select name="product_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                <option value="0"> - </option>
                                @foreach ($product_categories as $category )
                                    <option value="{{$category->id}}" {{ $category->id == $telephone_category->product_category_id ? 'selected' : '' }} >{{$category->name}}</option>
                                @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>{{ __("Nomi") }}</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="name"  value="{{ old('name', $telephone_category->name) }}" >
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Saqlash") }}</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>