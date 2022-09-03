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
                    
                    <a class="btn btn-success" href="{{ route('admin.product-telephones.restore.all') }}">{{ __("Barchasini arxivdan chiqarish") }}</a>
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
                    <th>Deleted at</th>
                    <th>Amallar</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($pt_trashed as $trashed)
                <tr >
                    <td>{{$loop->iteration}}</td>
                    <td>{{$trashed->model}}</td>
                    <td>{{$trashed->slug}}</td>
                    <td>
                        @foreach ($trashed->telephoneFrontDescs as $frontDesc)
                            {{ $frontDesc->description }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($trashed->telephoneFullDescs as $fullDesc)
                            {{ $fullDesc->full_description }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($trashed->telephoneSpecifications as $phoneSpec)
                            {{ $phoneSpec->width }}
                        @endforeach
                    </td>
                    <td>{{$trashed->created_at}}</td>
                    <td>{{$trashed->deleted_at}}</td>
                    <td class=" d-flex justify-content-center">
                        {{-- @can('trashed-delete') --}}                            
                        <form action="{{route('admin.product-telephones.restore', $trashed->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-success deleteCat">
                                <i class="far fa-window-restore"></i>
                            </button>
                        </form>
                        {{-- @endcan --}}

                        <form action="{{route('admin.product-telephones.forcedelete', $trashed->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger deleteCat ">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
              </tbody>

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
