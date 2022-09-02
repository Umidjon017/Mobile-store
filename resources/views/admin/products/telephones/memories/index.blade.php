@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')

<div class="row">

    <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
      <div class="card">
            {{-- @can('color-create') --}}
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">{{ __("Telefon xotiralari jadvali") }}</h5>
                    
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTelephoneMemory">{{ __("Qo'shish") }}</button>
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
                    <th>Asosiy xotira</th>
                    <th>Tezkor xotira</th>
                    <th>Created at</th>
                    <th>Amallar</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($memories as $memory)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$memory->memory_main}}</td>
                    <td>{{$memory->memory_ram}}</td>
                    <td>{{$memory->created_at}}</td>
                    <td class=" d-flex justify-content-center">
                        {{-- @can('product-category.edit') --}}
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editTelephoneMemory{{$memory->id}}"><i class="fas fa-edit"></i></button>
                        {{-- @endcan --}}
                        {{-- @can('memory-delete') --}}
                            <form action="{{route('admin.telephone-memories.destroy', $memory->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger deleteCat ">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
                
                @include('admin.products.telephones.memories.edit')

                @endforeach
              </tbody>

              @include('admin.products.telephones.memories.create')

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
