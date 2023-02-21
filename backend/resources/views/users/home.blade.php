@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <p class="display-6 text-secondary">All classes</p>
                <div class="row">
                    @foreach($all_classes as $class)
                        <div class="col-12 my-2 p-5 shadow">
                            <div class="row">
                                <div class="col-6">
                                    <p class="lead">Subject: <span class="fw-bold">{{ $class->subject }}</span>
                                        <br>
                                        @if (is_null($class->teacher_id))
                                            <span class="small">Teacher: No teacher yet </span>
                                        @else
                                            <span class="small">Teacher: {{$class->user->name}}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6 text-end">
                                    Class time: {{$class->start_time}} - {{$class->end_time}}
                                </div>
                            </div>
                            @if ($class->status == 'vacant')
                                <p class="lead">Status: <span class="badge bg-success">{{$class->status}}</span></p>
                            @elseif ($class->status == 'booked')
                                <p class="lead">Status: <span class="badge bg-warning">{{$class->status}}</span></p>
                            @else
                                <p class="lead">Status: <span class="badge bg-danger">{{$class->status}}</span></p>
                            @endif

                            @if (Auth::user()->role_id == 3)
                                @if ($class->status == 'vacant')
                                    <form action="{{ route('admin.student.book', $class->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm px-5 btn-outline-success float-end">Book class</button>
                                    </form>
                                @elseif ($class->status == 'booked')
                                    <button type="submit" class="btn btn-sm px-5 btn-warning float-end" disabled>Class booked</button>
                                @elseif ($class->status == 'ended')
                                    <button type="submit" class="btn btn-sm px-5 btn-danger float-end" disabled>Class ended</button>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
