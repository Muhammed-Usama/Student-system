@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Grade</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('teacher.grade_continue') }}" method="post">
                            @csrf

                            <div class="card-body">
                                <input type="hidden" name="id" id="id" value="{{ $id }}"
                                    id="id" />
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Course</label>
                                    <select id="demo-multiple-group-select" class="form-control" name='courses'>
                                        @foreach ($teacher->courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputEmail1">Students</label>
                                    <select id="demo-multiple-group-select" class="form-control" name='courses'>
                                        @foreach ($teacher->courses as $course)
                                            @foreach ($course->students as $student)
                                                {{ $student->name_en }}
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div> --}}



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">continue</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
