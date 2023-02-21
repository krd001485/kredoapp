@extends('layouts.app')

@section('title', 'Manage students')

@section('content')
<a href="{{ url()->previous() }}" class="display-4">
  <i class="fas fa-arrow-left"></i>
</a>

<div class="row justify-content-center mt-5">
  <div class="col-8">
    <div class="mt-5 p-5 bg-white shadow">
      <p class="text-secondary display-6">Student List</p>
      <table class="table table-bordered table-hover">
        <thead class="table-info">
          <th>Name</th>
          <th>Email</th>
          <th>Date Enrolled</th>
          <th colspan="2">Manage</th>
        </thead>
        <tbody>
          @foreach($students as $student)
            <tr>
              <td>{{ $student->name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->created_at }}</td>
              <td>
                @if($student->trashed())
                  <form action="{{ route('admin.activate.student', $student->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-sm btn-success">
                      Activate &nbsp; <i class="fas fa-check"></i>
                    </button>
                  </form>
                @else
                  <form action="{{ route('admin.delete.student', $student->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">
                      Deactivate &nbsp; <i class="fas fa-trash"></i>
                    </button>
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