@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Student</h2>
                    </div>
                    <div class="card-body">
                         @if (session('message'))
                        <h3 class="alert alert-success">{{session('message')}}</h3>
                        @endif
                        <a href="{{ route('student.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name_en }}</td>
                                        <td>{{ $item->address_en }}</td>
                                        <td>{{ $item->mobile }}</td>

                                        <td>
                                            <a href="{{route('student.show',$item->id)}}"class="btn btn-success">
                                            <i class="fa-solid fa-eye">
                                            </i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{route('student.edit',$item->id)}}"  class="btn btn-primary">
                                            <i class="fa-solid fa-pen-to-square">
                                            </i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{route('student.delete',$item->id)}}" class="btn btn-danger">
                                            <i class="fa-solid fa-trash">
                                            </i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
