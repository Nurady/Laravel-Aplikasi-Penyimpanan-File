@extends('layouts.master')
@section('title','Files')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Files</h1>  
        <a href="{{ route('files.create') }}" class="btn btn-success shadow-sm">
        <i class="fas fa-plus fa-sm text-white-100"></i> Tambah File
        </a>
      </div>

    <div class="row">
        <div class="table-responsive">
            <table id="table-files" class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="thead-dark text-center">
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th style="width: 75%;">Nama File</th>
                        <th style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($files as $key=>$file)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $file->name }}</td>
                        <td style="text-align:center;">
                            <a href="{{ Storage::url($file->file) }}" target="_blank" class="btn btn-success mr-2">
                                <span class="fa fa-download"></span>
                            </a> 
                            <a href="#" 
                                data-id={{ $file->id }}
                                class="btn btn-danger delete" 
                                data-toggle="modal" 
                                data-target="#deleteModal">
                                <i class="fa fa-trash" ></i>
                            </a>
                            {{-- <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="d-inline form-delete">
                                @csrf
                                @method('delete')
                                <button 
                                    class="btn btn-danger" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom" 
                                    title="delete"
                                    id="btn-delete">
                                    <i class="fa fa-trash" ></i>
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Belum Ada Files
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.backend.delete')
@endsection

@push('after-script')
    <script src="{{ asset('backend/datatables/jquery.dataTables.js ') }}"></script>
    <script src="{{ asset('backend/datatables-bs4/js/dataTables.bootstrap4.js ') }}"></script>
    <script>
        $(function () {
            $("#table-files").DataTable();
        });
    </script>
    <script>
        $(document).on('click','.delete',function(){
                let id = $(this).attr('data-id');
                $('#id').val(id);
           });
   </script>
@endpush

@push('after-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
@endpush

