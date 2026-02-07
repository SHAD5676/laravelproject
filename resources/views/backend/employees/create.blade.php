@extends ("backend.layouts.master")

@section("head")
<title>HR Admin - Employee Entry</title>
@endsection

@section("content")
<div class="content-wrapper">

  <div class="content-header sty-one">
    <h1>Employee Form</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li><i class="fa fa-angle-right"></i> Employee</li>
      <li><i class="fa fa-angle-right"></i> Create</li>
    </ol>
  </div>

  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline">

          <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">Employee Entry Form</h5>
          </div>

          <div class="card-body">

            {{-- Error Messages --}}
            @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="row">
                {{-- Employee Name --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Employee Name <span class="text-danger">*</span></label>
                    <input type="text" name="emp_name" value="{{ old('emp_name') }}" class="form-control" placeholder="Full Name">
                  </div>
                </div>

                {{-- Email --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email@example.com">
                  </div>
                </div>

                {{-- Password --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Login Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Minimum 6 characters">
                  </div>
                </div>

                {{-- Employee Code --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Employee Code <span class="text-danger">*</span></label>
                    <input type="text" name="employee_code" value="{{ old('employee_code') }}" class="form-control" placeholder="EMP-101">
                  </div>
                </div>

                {{-- Designation --}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" value="{{ old('designation') }}" class="form-control" placeholder="Software Engineer">
                  </div>
                </div>

                {{-- Salary --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Salary <span class="text-danger">*</span></label>
                    <input type="number" name="salary" value="{{ old('salary') }}" class="form-control" placeholder="0.00">
                  </div>
                </div>

                {{-- Status --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                      <option value="">Select Status</option>
                      <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                      <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                  </div>
                </div>

                {{-- Department --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Department <span class="text-danger">*</span></label>
                    <select name="department" class="form-control">
                      <option value="">Select One</option>
                      @foreach($departments as $dept)
                      <option value="{{ $dept->id }}" {{ old('department') == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- Photo --}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-success">Save Employee</button>
              <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back to List</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection