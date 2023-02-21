@extends('layouts.app')

@section('title', 'Manage teachers')

@section('content')
<a href="{{ url()->previous() }}" class="display-4">
  <i class="fas fa-arrow-left"></i>
</a>

<div class="row justify-content-center mt-5">
  <div class="col-8">
    <div class="mt-5 p-5 bg-white shadow">
      <p class="text-secondary display-6">Teacher List</p>
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <th></th>
          <th>Name</th>
          <th>Email</th>
          <th>

          </th>
        </thead>
        <tbody>
          @foreach($teachers as $teacher)
            <tr>
              <td>
                @if($teacher->avatar)
                  <img src="{{ asset('/storage/images/' . $teacher->avatar) }}" alt="{{ $teacher->avatar }}" class="rounded-circle avatar-md"  style="width: 3rem; height: 3rem; object-fit: cover; ">
                @else
                  <i class="fa-solid fa-circle-user icon-md"></i>
                @endif
              </td>
              <td>{{ $teacher->name }}</td>
              <td>{{ $teacher->email }}</td>
              <td class="text-center">
                @if($teacher->trashed())
                  <form action="{{ route('admin.activate.teacher', $teacher->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn text-success shadow-none">Activate</button>
                  </form>
                @else
                  <form action="{{ route('admin.delete.teacher', $teacher->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn text-danger shadow-none">Deactivate</button>
                  </form>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection