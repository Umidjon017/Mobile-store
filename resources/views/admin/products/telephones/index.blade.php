@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')

<div class="row">
    
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card mb-0">
          <div class="card-body">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/product-telephones') ? 'active' : ''  }}"
                  href="{{ route('admin.product-telephones.index') }}">
                    {{ __("Barchasi") }}
                    <span class="badge badge-white">{{ count($product_telephones) }}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/product-telephones/archived') ? 'active' : ''  }}"
                  href="{{ route('admin.product-telephones.archived') }}">
                  {{ __("Arxivlanganlar") }}
                  <span class="badge badge-white">{{ count($pt_trashed) }}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
      <div class="card">
            {{-- @can('product_telephone-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Telefon mahsulotlari jadvali") }}</h5>
                    
                    <a class="btn btn-primary" href="{{ route('admin.product-telephones.create')}}">{{ __("Qo'shish") }}</a>
                </div>
            {{-- @endcan --}}

        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <span>&times;</span>
                        </button>
                        <h5>
                          <i class="icon fas fa-check"></i> 
                          {{session('success')}}
                        </h5>
                    </div>
                </div>
            @endif
            @if (Session::has('warning'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
                    <h5>
                      <i class="icon fas fa-ban"></i>
                      {{session('warning')}}
                    </h5>
                </div>
            @endif
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-1">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Modeli</th>
                    <th>Slug</th>
                    <th>Front-Descriptions</th>
                    <th>Full-Descriptions</th>
                    <th>Width</th>
                    <th>Created at</th>
                    <th>Amallar</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($product_telephones as $product_telephone)
                <tr >
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product_telephone->model}}</td>
                    <td>{{$product_telephone->slug}}</td>
                    <td>
                        @foreach ($product_telephone->telephoneFrontDescs as $frontDesc)
                            {{ $frontDesc->description }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($product_telephone->telephoneFullDescs as $fullDesc)
                            {{ $fullDesc->full_description }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($product_telephone->telephoneSpecifications as $phoneSpec)
                            {{ $phoneSpec->width }}
                        @endforeach
                    </td>
                    <td>{{$product_telephone->created_at}}</td>
                    <td class=" d-flex justify-content-center">
                      {{-- <a class="btn btn-primary" href="{{route('admin.product-telephones.show', $product_telephone->id)}}">
                        <i class="fas fa-eye"></i>
                      </a> --}}
                        {{-- @can('product-category.edit') --}}
                            <a class="btn btn-warning" href="{{route('admin.product-telephones.edit', $product_telephone->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                        {{-- @endcan --}}

                        {{-- @can('product_telephone-delete') --}}                            
                            <form action="{{route('admin.product-telephones.destroy', $product_telephone->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary deleteCat ">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                </button>
                            </form>
                        {{-- @endcan --}}

                        <form action="{{route('admin.product-telephones.forcedelete', $product_telephone->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger deleteCat ">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                
                {{-- @include('admin.product_categories.edit') --}}

                @endforeach
              </tbody>

              {{-- @include('admin.product_categories.create') --}}

            </table>
          </div>
        </div>
      </div>
    </div>
</div>





@endsection

@section('scripts')
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/page/datatables.js"></script>
@endsection
