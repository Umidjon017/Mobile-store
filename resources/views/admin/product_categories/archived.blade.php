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
                  <a class="nav-link {{ request()->is('admin/product-categories/table') ? 'active' : ''  }}"
                    href="{{ route('admin.product-categories.table.index') }}">
                      {{ __("Barchasi") }}
                      <span class="badge badge-white">{{ count($product_categories) }}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->is('admin/product-categories/table/archived') ? 'active' : ''  }}"
                    href="{{ route('admin.product-categories.table.archived') }}">
                    {{ __("Arxivlanganlar") }}
                    <span class="badge badge-white">{{ count($pc_trashed) }}</span>
                  </a>
                </li>
            </ul>
          </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
      <div class="card">
            {{-- @can('pc_trash-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Mahsulot Kategoriyalari jadvali") }}</h5>

                    <a class="btn btn-success" href="{{ route('admin.product-categories.table.restore.all') }}">{{ __("Barchasini arxivdan chiqarish") }}</a>
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
                    <th>Nomi</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Amallar</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($pc_trashed as $pc_trash)
                <tr >
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pc_trash->name}}</td>
                    <td>{{$pc_trash->slug}}</td>
                    <td>{{$pc_trash->created_at}}</td>
                    <td class=" d-flex justify-content-center">
                        {{-- @can('pc_trash-delete') --}}                            
                        <form action="{{route('admin.product-categories.table.restore', $pc_trash->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-success deleteCat">
                                <i class="far fa-window-restore"></i>
                            </button>
                        </form>
                        {{-- @endcan --}}

                        <form action="{{route('admin.product-categories.table.forcedelete', $pc_trash->id)}}" method="POST">
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
