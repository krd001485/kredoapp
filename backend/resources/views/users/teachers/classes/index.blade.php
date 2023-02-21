@extends('layouts.app')

@section('title', 'Booked classes')

@section('content')
<div class="container">
  @if(session('class-end'))
    <div class="alert alert-primary alert-dismissble fade show mt-3" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>  Success!</strong>{{ session('class-end') }}
    </div>
  @endif
</div>
<div class="container">
  @if(session('class-cancel'))
    <div class="alert alert-primary alert-dismissble fade show mt-3" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>  Success!</strong>{{ session('class-cancel') }}
    </div>
  @endif
</div>
<div class="container">
  @if(session('class-reschedule'))
    <div class="alert alert-primary alert-dismissble fade show mt-3" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>  Success!</strong>{{ session('class-reschedule') }}
    </div>
  @endif
</div>

  <a href="{{ url()->previous() }}" class="display-4">
    <i class="fas fa-arrow-left"></i>
  </a>
  <div class="row justify-content-center mt-5">
    <div class="col-8">
      <div class="p-5 bg-white shadow">
        <p class="display-6 text-secondary">Booked classes</p>
        <table class="table table-hover table-bordered">
          <thead class="table-dark">
            <td>Teacher</td>
            <td>Subject</td>
            <td>Status</td>
            <td>Student</td>
            <td>Start time</td>
            <td>End time</td>
            <td>Class Date</td>
            <td colspan="2"></td>
          </thead>
          <tbody>
            @foreach ($classes as $class)
              <tr>
                <td>{{ $class->user->name }}</td>
                <td>{{ $class->subject }}</td>
                <td>{{ $class->status }}</td>
                <td>
                  @if (is_null($class->student_id))
                    <form action="{{ route('admin.student.book', $class->id) }}" method="post">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn text-info shadow-none">No student booked yet</button>
                    </form>
                  @else
                    {{ $class->student->name }}
                  @endif
                </td>
                <td>{{ $class->start_time }}</td>
                <td>{{ $class->end_time }}</td>
                <td>{{ $class->class_date }}</td>
                <td>
                  @if (!$class->trashed())
                    <form action="{{ route('teacher.cancel.class', $class->id) }}" method="post" class="float-start">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-secondary">Cancel class</button>
                    </form>
                    <form action="{{ route('teacher.end.class', $class->id) }}" method="post" class="float-end">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn btn-sm btn-outline-danger">End Class</button>
                    </form>
                  @endif
                 
                  @if($class->trashed())
                  <form action="{{ route('teacher.reschedule.class', $class->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-sm btn-outline-success">
                      reschedule &nbsp; <i class="fas fa-check"></i>
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