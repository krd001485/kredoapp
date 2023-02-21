@extends('layouts.app')

<style>
  .list-group-item {
    padding: 15px !important;
  }
</style>

@section('title', 'Admin Home')

@section('content')
  <div class="row">
    <div class="col-3">
      @include('admin.sidebar')
    </div>
    <div class="col-8">
      <form action="#" method="post">
        <textarea name="news" id="" cols="30" rows="10" class="form-control" placeholder="Post a news"></textarea>
        <button type="submit" class="btn btn-lg btn-outline-primary px-5 mt-3">Post</button>
      </form>
      <div class="div p-5 mt-5 bg-light shadow">
        <p class="display-6 text-secondary">
          Booked classes
        </p>
        <table class="table table-hover table-striped table-bordered">
          <thead class="table-dark">
            <th>
              Teacher
            </th>
            <th>
              Class subject
            </th>
            <th colspan="2">
              Class details
            </th>
          </thead>
          <tbody>
            <tr>
              @foreach ($all_class as $class)
              <td> 
              @if (is_null($class->teacher_id))
                    <p>No Teacher booked yet</p>
                  @else
                    {{ $class->user->name }}
                  @endif
                </td>
              <td> {{ $class->subject }}</td>
              <td> <a href="{{ route('admin.classroom.show', $class->id) }}" class="text-decoration-none">View details &nbsp; <i class="fas fa-eye"></i></a></td>
            </tr>
              @endforeach
          </tbody>
        </table>
  
      </div>
    </div>
  </div>

@endsection