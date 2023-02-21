@extends('layouts.app')

@section('title', 'Create a class')

@section('content')
  <div class="container">
    @if(session('class-success'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong> Success!</strong> Class created successfully
      </div>
    @endif
  </div>
  <a href="{{ url()->previous() }}" class="display-4">
    <i class="fas fa-arrow-left"></i>
  </a>

  <div class="row justify-content-center mt-5">
    <div class="col-8">
      <form action="{{ route('admin.classroom.store') }}" method="post" class="p-5 shadow">
        <p class="display-6 text-secondary">
          Create a class
        </p>
        @csrf
        <div class="mb-3">
          <select name="subject" id="" class="form-control">
            <option value="" disabled hidden>Subject</option>
            <option value="Web Basic">Web Basic</option>
            <option value="Web Development Standard">Web Development Standard</option>
            <option value="Web Development Advanced">Web Development Advanced</option>
            <option value="Web Development Expert">Web Development Expert</option>
            <option value="Design Standard">Design Standard</option>
            <option value="Design Advanced">Design Advanced</option>
          </select>
          <div class="form-text">Select class subject</div>
        </div>
        <div class="mb-3">
          <input type="time" name="start" id="" class="form-control">
          <div class="form-text">Starting time</div>
        </div>
        <div class="mb-3">
          <input type="time" name="end" id="" class="form-control">
          <div class="form-text">End time</div>
        </div>
        <div class="mb-3">
          <input type="date" name="date" id="" class="form-control">
          <div class="form-text">Class date</div>
        </div>
        <button type="submit" class="btn btn-outline-secondary px-5">Create class</button>
      </form>
    </div>
  </div>
@endsection