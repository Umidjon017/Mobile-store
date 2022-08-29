@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">

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
                <a class="nav-link active" href="#">All <span class="badge badge-white">10</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Draft <span class="badge badge-primary">2</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pending <span class="badge badge-primary">3</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
              </li>
            </ul>
          </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
      <div class="card">
            {{-- @can('telephone_category-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Telefon Kategoriyalari jadvali") }}</h5>
                    
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
                        <h5><i class="icon fas fa-check"></i></h5>
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @if (Session::has('warning'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
                    <h5><i class="icon fas fa-ban"></i> </h5>
                    {{session('warning')}}
                </div>
            @endif
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table-1">
              <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>Telefon kategoriyasi</th> --}}
                    <th>Nomi</th>
                    <th>Slug</th>
                    <th>Created at</th>
                    <th>Amallar</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($telephone_categories as $telephone_category)
                <tr >
                    <td>{{$loop->iteration}}</td>
                    {{-- <td>{{$telephone_category->productCategories->name}}</td> --}}
                    <td>{{$telephone_category->name}}</td>
                    <td>{{$telephone_category->slug}}</td>
                    <td>{{$telephone_category->created_at}}</td>
                    <td class=" d-flex justify-content-center">
                        {{-- @can('product-category.edit') --}}
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProductCategory{{$telephone_category->id}}"><i class="fas fa-edit"></i></button>
                        {{-- @endcan --}}
                        {{-- @can('telephone_category-delete') --}}
                            <form action="{{route('admin.product-categories.destroy', $telephone_category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger deleteCat ">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
                
                @include('admin.category_telephones.edit')

                @endforeach
              </tbody>

              @include('admin.category_telephones.create')

            </table>
          </div>
        </div>
      </div>
    </div>
</div>





@endsection

@section('scripts')
    <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
    <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection
