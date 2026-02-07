@extends("backend.layouts.master")

@section("content")
<div class="content-wrapper">
    <div class="content-header sty-one">
        <h1 class="text-black">Departments</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Department</li>
        </ol>
    </div>

    <div class="content">
        <div class="info-box">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Department Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $dept)
                        <tr>
                            <td>{{ $dept->id }}</td>
                            <td>{{ $dept->name }}</td>
                            <td>
                                <span class="label {{ $dept->status == 1 ? 'label-success' : 'label-danger' }}">
                                    {{ $dept->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection