@extends("backend.layouts.master")

@section("head")
    <title>HR Admin - Employee Management</title>
@endsection

@section("content")
<div class="content-wrapper">
    <div class="content-header sty-one">
        <h1>Employee Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><i class="fa fa-angle-right"></i> Employee</li>
        </ol>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-body">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <h4 class="text-black m-b-3">
                    Employee List
                    <span class="pull-right">
                        {{-- আপনার web.php অনুযায়ী রাউট নেম employee.create --}}
                        <a class="btn btn-primary btn-sm" href="{{ route('employee.create') }}">
                            <i class="fa fa-plus"></i> Add Employee
                        </a>
                    </span>
                </h4>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>#ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Salary</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    {{-- ইমেজ দেখানোর জন্য --}}
                                    <img src="{{ asset($item->image) }}" alt="User" style="width: 40px; height: 40px; border-radius: 50%;">
                                </td>
                                <td>{{ $item->name }} <br> <small>{{ $item->email }}</small></td>
                                <td>{{ $item->employee_code }}</td>
                                <td>{{ number_format($item->salary, 2) }} TK</td>
                                <td>
                                    {{-- ডিপার্টমেন্ট রিলেশন চেক --}}
                                    <span class="label label-info">{{ $item->department->name ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('employee.edit', $item->id) }}" class="btn btn-sm btn-info" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <form method="post" action="{{ route('employee.destroy', $item->id) }}" style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
@endsection