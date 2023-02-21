@extends('layouts.app')

@section('title', 'Book a class')

@section('content')
  <div class="container">
    @if(session('book-success'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Book success</strong>  {{ session('book-success') }}
      </div>
    @endif
  </div>
  <a href="{{ url()->previous() }}" class="display-4">
    <i class="fas fa-arrow-left"></i>
  </a>
  <div class="row justify-content-center mt-5">
    <div class="col-8">
      <div class="p-5 bg-white shadow">
        <p class="display-6 text-secondary">Book a class</p>
        <table class="table table-hover table-bordered">
          <thead class="table-dark">
            <td>Teacher</td>
            <td>Subject</td>
            <td>Status</td>
            <td>Student</td>
            <td>Start Time</td>
            <td>End Time</td>
            <td>Class Date</td>
          </thead>
          <tbody>
            @foreach($all_class as $class)
              <tr>
                <td>
                  @if (is_null($class->teacher_id))
                    <form action="{{ route('admin.teacher.book', $class->id) }}" method="post">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="btn text-info shadow-none">Book this class?</button>
                    </form>
                  @else
                    {{ $class->user->name }}
                  @endif
                </td>
                <td>
                  {{ $class->subject }}
                </td>
                <td>
                  {{ $class->status }}
                </td>
                <td>
                  @if (is_null($class->student_id))
                    <form action="{{ route('admin.student.book', $class->id) }}" method="post">
                        @method('PATCH')
                        <button type="submit" class="btn text-info shadow-none">No Student booked yet</button>
                    </form>
                  @else
                    {{ $class->student->name }}
                  @endif
                </td>
                <td>
                  {{ $class->start_time }}
                </td>
                <td>
                  {{ $class->end_time }}
                </td>
                <td>
                  {{ $class->class_date }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
@endsection