@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <style>
        .bg-aqua-active{

            background-color: #6777ef;
            border-color: transparent !important;
            color: #fff !important;

        }
    </style>
     <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
     <link rel="stylesheet" href="/assets/bundles/codemirror/lib/codemirror.css">
     <link rel="stylesheet" href="/assets/bundles/codemirror/theme/duotone-dark.css">
@endsection

@section('content')

    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="row mb-2">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <a href="{{ route('admin.product-telephones.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>

                        <h4> Mahsulot qo'shish </h4>

                        <ul class="nav nav-tabs float-sm-right " >
                            <li class="nav-item">
                               <a class="nav-link " href="#" id="ru-link">Ru</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link bg-aqua-active" href="#" id="uz-link">Uzb</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="#" id="en-link">En</a>
                           </li>
                       </ul>
                    </div>
                </div>
                <form action="{{route('admin.product-telephones.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Telefon Kategoriyasiga biriktirish</label>
                                    <select name="telephone_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> </option>
                                        @foreach ($telephone_categories as $category )
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('telephone_category_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Rangga biriktirish</label>
                                    <select name="color_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Rangni tanlang" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                                        <option value="0">  </option>
                                        {{-- @foreach ($colors as $color )
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('color_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Xotiraga biriktirish</label>
                                    <select name="memory_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Xotirani tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> </option>
                                        {{-- @foreach ($memories as $memory )
                                            <option value="{{$memory->id}}">{{$memory->name}}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('memory_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Jamoga biriktirish</label>
                                    <select name="team_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Jamoaga biriktirish tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> </option>
                                        {{-- @foreach ($teams as $team )
                                            <option value="{{$team->id}}">{{$team->name}}</option>
                                        @endforeach --}}
                                    </select>
                                    {{-- @error('team_id')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group ">
                                            <label>Modeli</label>
                                            <input type="text" class="form-control" placeholder="Modelini kiriting" name="model" >
                                            @error('model')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Narx</label>
                                            <input type="number" class="form-control" placeholder="Narxni kiriting" name="price" >
                                            @error('price')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Chegirma(Majburiy emas)</label>
                                            <input type="number" class="form-control" placeholder="Chegirma bo'lsa kiriting" name="discount" >
                                            @error('discount')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="">Rasm</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Rasm</label>
                                                <input type="file" name="image[]" id="image-upload" multiple />
                                            </div>
                                            @error('image')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>Raqamli O'lchamlarga biriktirish</label>
                                                    <select name="size_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="O'lchamlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                        {{-- @foreach ( $sizes as $size )
                                                            <option value="{{ $size->id }}"> {{ $size->number }} </option>
                                                        @endforeach --}}
                                                    </select>
                                                    @error('size_id')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>Harfli O'lchamlarga biriktirish</label>
                                                    <select name="size_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="O'lchamlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                        {{-- @foreach ( $sizes as $size )
                                                            <option value="{{ $size->id }}"> {{ $size->letter }} </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div id="uz-form">
                                            <div class="form-group ">
                                                <label>Tavsif(UZ) </label>
                                                <textarea name="uz[description]" id="" cols="30" rows="10">  </textarea>
                                            </div>
                                        </div>

                                        <div id="ru-form" class="d-none">
                                            <div class="form-group ">
                                                <label>Tavsif(RU)</label>
                                                <textarea name="ru[description]" id="" cols="30" rows="10">  </textarea>
                                            </div>
                                        </div>

                                        <div id="en-form" class="d-none">
                                            <div class="form-group ">
                                                <label>Tavsif(EN)</label>
                                                <textarea name="en[description]" id="" cols="30" rows="10">  </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="">Status</label>
                            <select name="status" class="form-control select2 select2-hidden-accessible" id="">
                                <option value="1">Faol</option>
                                <option value="0">Faol emas</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Meta Nomi(title)</label>
                            <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ old('meta_title' )}}" >
                        </div>

                        <div class="form-group ">
                            <label>Meta Nomi(description)</label>
                            <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ old('meta_description' )}}">
                        </div>

                        <div class="form-group ">
                            <label>Meta kalitso'z (keywords)</label>
                            <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" value="{{ old('meta_keywords' )}}">
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button class="btn btn-primary">Yaratish</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('assets/bundles/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/bundles/ckeditor/adapters/jquery.js') }}"></script>

    <script src="/assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="/assets/bundles/codemirror/lib/codemirror.js"></script>
    <script src="/assets/bundles/codemirror/mode/javascript/javascript.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/create-post.js"></script>

    <script>
        $(function () {

            $('.select2').select2()
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        })

         $('textarea').addClass('summernote')


    </script>
@endsection
