<div class="row">
    <div class="col-3 w-100">
      <ul class="list-group rounded-0">
        <li class="list-group-item text-light bg-dark">
          Create &nbsp; <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
        </li>
        <a href="{{ route('admin.students.create') }}" class="list-group-item">Register a student</a>
        <a href="{{ route('admin.teachers.create') }}" class="list-group-item">Register a Teacher</a>
        <li class="list-group-item text-light bg-primary">
          Manage &nbsp; <i class="fas fa-book"></i>
        </li>
        <a href="{{ route('admin.students.index') }}" class="list-group-item">Manage students</a>
        <a href="{{ route('admin.teachers.index') }}" class="list-group-item">Manage Teachers</a>
        <li class="list-group-item text-light bg-success">
          Dashboard &nbsp; <i class="fas fa-folder"></i>
        </li>
        <div class="list-group-item">The number of students: <span class="badge bg-danger">{{$students_count}}</span></div>
        <div class="list-group-item">The number of teachers: <span class="badge bg-danger">{{$teachers_count}}</span></div>
        <li class="list-group-item text-light bg-warning">
          The List of Classes
        </li>


        
          @if ($webbasic_count > 0)
          <div class="list-group-item">
            <p>Web Basic : <span class="badge bg-danger">{{$webbasic_count}}</p></span>
          </div>
          @endif
          @if ($webstandard_count > 0)
          <div class="list-group-item">
            <p>Web Development Standard : <span class="badge bg-danger">{{$webstandard_count}}</p></span>
          </div>
          @endif
          @if ($webadvanced_count > 0)
          <div class="list-group-item">
            <p>Web Development Advanced : <span class="badge bg-danger">{{$webadvanced_count}}</p></span>
          </div>
          @endif
          @if ($webexpert_count > 0)
          <div class="list-group-item">
            <p>Web Development Expert : <span class="badge bg-danger">
             {{$webexpert_count}}</p></span>
          </div>
          @endif
          @if ($designstandard_count > 0)
          <div class="list-group-item">
            <p>Design Standard : <span class="badge bg-danger">{{$designstandard_count}}</p></span>
          </div>
          @endif
          @if ($designadvanced_count > 0)
          <div class="list-group-item">
            <p>Design Advanced : <span class="badge bg-danger">{{$designadvanced_count}}</p></span>
          </div>
          @endif

      </ul>
    </div>
</div>