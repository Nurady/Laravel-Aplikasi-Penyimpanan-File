@extends('layouts.master')
@section('title', 'Create file')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create File</h1>  
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nama File</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                  @error('name')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>    
@endsection