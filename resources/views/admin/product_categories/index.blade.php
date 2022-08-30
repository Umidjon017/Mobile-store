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
                <a class="nav-link active" href="#">Barchasi <span class="badge badge-white">{{ count($product_categories) }}</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Arxivlanganlar <span class="badge badge-primary">{{ count($pc_archived) }}</span></a>
              </li>
            </ul>
          </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
      <div class="card">
            {{-- @can('product_category-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Mahsulot Kategoriyalari jadvali") }}</h5>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductCategory">{{ __("Qo'shish") }}</button>
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
                @foreach ($product_categories as $product_category)
                <tr >
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product_category->name}}</td>
                    <td>{{$product_category->slug}}</td>
                    <td>{{$product_category->created_at}}</td>
                    <td class=" d-flex justify-content-center">
                        {{-- @can('product-category.edit') --}}
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProductCategory{{$product_category->id}}"><i class="fas fa-edit"></i></button>
                        {{-- @endcan --}}

                        {{-- @can('product_category-delete') --}}                            
                            <form action="{{route('admin.product-categories.table.destroy', $product_category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary deleteCat ">
                                  <i class="fas fa-cloud-upload-alt"></i>
                                </button>
                            </form>
                        {{-- @endcan --}}

                        <form action="{{route('admin.product-categories.table.forcedelete', $product_category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger deleteCat ">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                
                @include('admin.product_categories.edit')

                @endforeach
              </tbody>

              @include('admin.product_categories.create')

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
