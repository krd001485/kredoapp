@extends('layouts.app')

@section('title', 'View details')

@section('content')

  <a href="{{ url()->previous() }}" class="display-4">
    <i class="fas fa-arrow-left"></i>
  </a>
  <div class="row justify-content-center mt-5">
    <div class="col-8">
      <div class="p-5 bg-white shadow">
        <p class="display-6 text-secondary">View details</p>
        <table class="table table-hover table-bordered">
          <thead class="table-dark">
            <td>Teacher</td>
            <td>Subject</td>
            <td>Status</td>
            <td>Student</td>
            <td>Start time</td>
            <td>End time</td>
            <td>Class Date</td>
          </thead>
          <tbody>

              <tr>
                <td>@if (is_null($class->teacher_id))
                  <p>No Teacher booked yet</p>
                @else
                  {{ $class->user->name }}
                @endif</td>
                <td>{{ $class->subject }}</td>
                <td>{{ $class->status }}</td>
                <td>
                  @if (is_null($class->student_id))
                    <form action="" method="post">
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
                
              </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection