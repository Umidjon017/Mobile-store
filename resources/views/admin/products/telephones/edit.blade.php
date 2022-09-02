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

                        <h4> {{ __("Mahsulotni tahrirlash") }} </h4>
                    </div>
                </div>
                <form action="{{route('admin.product-telephones.update', $pPhones->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>{{ __("Telefon Kategoriyasiga biriktirish") }}</label>
                                    <select name="telephone_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> </option>
                                        @foreach ($tCategories as $category )
                                            <option value="{{$category->id}}" {{ old('telephone_category_id', $pPhones->telephone_category_id) == $category->id ? 'selected' : '' }}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>{{ __("Rangga biriktirish") }}</label>
                                    <select name="color_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Rangni tanlang" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                                        <option value="">  </option>
                                        @foreach ($colors as $color )
                                            <option value="{{ $color->id }}" {{ old('color_id', $colors) == $colors ? 'selected' : '' }}>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>{{ __("Xotiraga biriktirish") }}</label>
                                    <select name="memory_id[]" class="form-control select2 select2-hidden-accessible" multiple data-placeholder="Xotirani tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value=""> </option>
                                        @foreach ($memories as $memory )
                                            <option value="{{$memory->id}}" {{ old('memory_id', $memories) == $memories ? 'selected' : '' }}>
                                                {{$memory->memory_ram. '/' . $memory->memory_main}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>{{ __("Yangi turdagi modelmi") }}</label>
                                    <select name="badge_new" class="form-control select2 select2-hidden-accessible">
                                        <option value="0" {{ old('badge_new', $pPhones->badge_new) == 0 ? 'selected' : '' }} >Yo'q</option>
                                        <option value="1" {{ old('badge_new', $pPhones->badge_new) == 1 ? 'selected' : '' }} >Ha</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group ">
                                            <label>{{ __("Modeli") }}</label>
                                            <input type="text" class="form-control" placeholder="Modelini kiriting" name="model" value="{{ old('model', $pPhones->model) }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>{{ __("Narx") }}</label>
                                            <input type="number" class="form-control" placeholder="Narxni kiriting" name="price" value="{{ old('price', $pPhones->price) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($specifications as $specification)
                        <div class="row">
                            <div class="col-sm-4 col-md-2 col-lg-2">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Kengligi kiriting" name="width" value="{{ old('width', $specification->width) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Bo'yini kiriting" name="height" value="{{ old('height', $specification->height) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Qalinligini kiriting" name="thickness" value="{{ old('thickness', $specification->thickness) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Og'irligini kiriting" name="weight" value="{{ old('weight', $specification->weight) }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Korpusini kiriting" name="material_corps" value="{{ old('material_corps', $specification->material_corps) }}">
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2 col-lg-2">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ekran dioganalini kiriting" name="screen_dioganal" value="{{ old('screen_dioganal', $specification->screen_dioganal) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Piksel zichligini kiriting" name="pixel_density_ppi" value="{{ old('pixel_density_ppi', $specification->pixel_density_ppi) }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ekran o'lchamlarini kiriting" name="display_resolution" value="{{ old('display_resolution', $specification->display_resolution) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Ekran matriksini kiriting" name="screen_matrix" value="{{ old('screen_matrix', $specification->screen_matrix) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Boshqa xususiyatlarini kiriting" name="peculiarities" value="{{ old('peculiarities', $specification->peculiarities) }}">
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Batareya turini kiriting" name="battery_type" value="{{ old('battery_type', $specification->battery_type) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Batareya hajmini kiriting" name="battery_capacity" value="{{ old('battery_capacity', $specification->battery_capacity) }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <select name="fast_charging" class="form-control select2 select2-hidden-accessible">
                                                <option>{{ __("Tez quvvat beradimi") }}</option>
                                                <option value="1" {{ old('fast_charging', $specification->fast_charging == 1 ? 'selected' : '') }}>Ha</option>
                                                <option value="0" {{ old('fast_charging', $specification->fast_charging == 0 ? 'selected' : '') }}>Yo'q</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <select name="wireless_charger" class="form-control select2 select2-hidden-accessible">
                                                <option>{{ __("Simsiz quvvat beradimi") }}</option>
                                                <option value="1" {{ old('wireless_charger', $specification->wireless_charger == 1 ? 'selected' : '') }}>Ha</option>
                                                <option value="0" {{ old('wireless_charger', $specification->wireless_charger == 0 ? 'selected' : '') }}>Yo'q</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Quvvat beruvchini kiriting" name="connector" value="{{ old('connector', $specification->connector) }}">
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Protsessorlar sonini kiriting" name="number_processor_cores" value="{{ old('number_processor_cores', $specification->number_processor_cores) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Video protsessorini kiriting" name="video_processsor" value="{{ old('video_processsor', $specification->video_processsor) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="GPU yadrosini kiriting" name="gpu_frequency" value="{{ old('gpu_frequency', $specification->gpu_frequency) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CPUni kiriting" name="cpu" value="{{ old('cpu', $specification->cpu) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="CPU yadrosini kiriting" name="frequency" value="{{ old('frequency', $specification->frequency) }}">
                                </div>
                            </div>
                            
                            <div class="col-sm-4 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Communication standartsni kiriting" name="communication_standarts" value="{{ old('communication_standarts', $specification->communication_standarts) }}">
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <select name="nfc" class="form-control select2 select2-hidden-accessible">
                                                <option>{{ __("NFC") }}</option>
                                                <option value="1" {{ old('nfc', $specification->nfc == 1 ? 'selected' : '') }}>Mavjud</option>
                                                <option value="0" {{ old('nfc', $specification->nfc == 0 ? 'selected' : '') }}>Mavjud emas</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <select name="bluetooth" class="form-control select2 select2-hidden-accessible">
                                                <option>{{ __("Bluetooth") }}</option>
                                                <option value="1" {{ old('bluetooth', $specification->bluetooth == 1 ? 'selected' : '') }}>Mavjud</option>
                                                <option value="0" {{ old('bluetooth', $specification->bluetooth == 0 ? 'selected' : '') }}>Mavjud emas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Wi-Fini kiriting" name="wifi" value="{{ old('wifi', $specification->wifi) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Sim-kartalar sonini kiriting" name="number_sim_cards" value="{{ old('number_sim_cards', $specification->number_sim_cards) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Satellite navigationni kiriting" name="satellite_navigation" value="{{ old('satellite_navigation', $specification->satellite_navigation) }}">
                                </div>
                            </div>
                            
                            <div class="col-sm-4 col-md-2 col-lg-2">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Asosiy kamerani kiriting" name="main_camera" value="{{ old('main_camera', $specification->main_camera) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Old kamerani kiriting" name="front_camera" value="{{ old('front_camera', $specification->front_camera) }}">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Asosiy kamera xususiyatlarini kiriting" name="features_main_camera" value="{{ old('features_main_camera', $specification->features_main_camera) }}">
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Video yozish xususiyatlarini kiriting" name="video_recording" value="{{ old('video_recording', $specification->video_recording) }}">
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach($front_descriptions as $front_description)
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>{{ __("Asosiy rasmlari") }}</label>
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">{{ __("Rasm") }}</label>
                                            <input type="file" name="image_url[]" id="image-upload" multiple />
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-sm-12 col-md-8 col-lg-8">
                                    <div class="form-group ">
                                        <label>{{ __("Asosiy tavsif") }}</label>
                                        <textarea name="description" cols="30" rows="10"> {{ $front_description->description }} </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary">{{ __("Yaratish") }}</button>
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
