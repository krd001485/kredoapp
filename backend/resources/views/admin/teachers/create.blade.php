@extends('layouts.app')

@section('title', 'Register a teacher')

@section('content')
<div class="container">
  <div class="container">
    @if(session('teacher-added'))
      <div class="alert alert-primary alert-dismissble fade show mt-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>  Success!</strong>{{ session('teacher-added') }}
      </div>
    @endif
  </div>
</div>

    
  <a href="{{ url()->previous() }}" class="display-4">
    <i class="fas fa-arrow-left"></i>
  </a>
  <div class="row justify-content-center mt-5">
    <div class="col-8">
      <form action="{{ route('admin.teachers.store') }}" class="bg-white shadow rounded-3 p-5" method="post" enctype="multipart/form-data">
      @csrf
        
        <h2 class="h3 mb-3 fw-light text-muted">Create a teacher</h2>
        <div class="row mb-3">
          <div class="col-auto align-self-end">
            <input type="file" name="avatar" id="" class="form-controle form-control-sm mt-1">
            <div class="form-text">
              Acceptable formats: jpeg, jpg, png, gif only <br>
              Max file size: 1048kb
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label fw-bold">Name</label>
          <input type="text" name="name" id="" class="form-control" autofocus>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label fw-bold">Email</label>
          <input type="text" name="email" id="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label fw-bold">Password</label>
          <input type="password" name="password" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-info px-5">Submit</button>
    </form>
    </div>
  </div>

@endsection