@extends("backend.layouts.master")

@section("head")
<title>HR Admin - Employee Edit</title>
@endsection

@section("content")
<div class="content-wrapper">

  <div class="content-header sty-one">
    <h1>Employee Edit</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li><i class="fa fa-angle-right"></i> Employee</li>
      <li><i class="fa fa-angle-right"></i> Edit</li>
    </ol>
  </div>

  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline">

          <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">Employee Edit Form</h5>
          </div>

          <div class="card-body">

            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="post"
                  action="{{ route('employee.update', $employee->id) }}"
                  enctype="multipart/form-data">
              @csrf
              @method('put')

              <div class="row">
                {{-- Name --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" name="emp_name" value="{{ old('emp_name', $employee->name) }}" class="form-control">
                  </div>
                </div>

                {{-- Email (লগইনের জন্য জরুরি) --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control">
                  </div>
                </div>

                {{-- Password (ঐচ্ছিক) --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password <small class="text-danger">(Leave blank if you don't want to change)</small></label>
                    <input type="password" name="password" class="form-control" placeholder="******">
                  </div>
                </div>

                {{-- Employee Code --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Employee Code</label>
                    <input type="text" name="employee_code" value="{{ old('employee_code', $employee->employee_code) }}" class="form-control">
                  </div>
                </div>

                {{-- Designation --}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" value="{{ old('designation', $employee->designation) }}" class="form-control">
                  </div>
                </div>

                {{-- Salary --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Salary</label>
                    <input type="number" name="salary" value="{{ old('salary', $employee->salary) }}" class="form-control">
                  </div>
                </div>

                {{-- Status --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
                      <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                  </div>
                </div>

                {{-- Department --}}
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Department</label>
                    <select name="department" class="form-control">
                      @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ $employee->department_id == $dept->id ? 'selected' : '' }}>
                          {{ $dept->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                {{-- Photo --}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Photo</label><br>
                    <img src="{{ asset($employee->image) }}" width="80" class="img-thumbnail mb-2">
                    <input type="file" name="photo" class="form-control">
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-success">Update Employee</button>
              <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection