@extends ("backend.layouts.master")

@section("head")

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Biz Admin - Multipurpose bootstrap 4 admin templates</title>
  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Biz Admin is a Multipurpose bootstrap 4 Based Dashboard & Admin Site Responsive Template by uxliner." />
  <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Biz Admin, Biz Adminadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
  <meta name="author" content="uxliner" />
  <!-- v4.1.3 -->
  <link rel="stylesheet" href="{{url('')}}/dist/bootstrap/css/bootstrap.min.css">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/dist/img/favicon-16x16.png">

  <!-- Google Font -->
  <link href="{{url('')}}/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/style.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/et-line-font/et-line-font.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/simple-lineicon/simple-line-icons.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">

  <!-- form wizard -->
  <link rel="stylesheet" href="{{url('')}}/dist/plugins/formwizard/jquery-steps.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="{{url('')}}/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="{{url('')}}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
@endsection


@section("scripts")
<!-- jQuery 3 -->
<script src="{{url('')}}/dist/js/jquery.min.js"></script>
<script src="{{url('')}}/dist/bootstrap/js/bootstrap.min.js"></script>

<!-- template -->
<script src="{{url('')}}/dist/js/bizadmin.js"></script>

<!-- for demo purposes -->
<script src="{{url('')}}/dist/js/demo.js"></script>

<!-- form wizard -->
<script src="{{url('')}}/dist/plugins/formwizard/jquery-steps.js"></script>
<script src="{{url('')}}/https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
  var frmRes = $('#frmRes');
  var frmResValidator = frmRes.validate();

  var frmInfo = $('#frmInfo');
  var frmInfoValidator = frmInfo.validate();

  var frmLogin = $('#frmLogin');
  var frmLoginValidator = frmLogin.validate();

  var frmMobile = $('#frmMobile');
  var frmMobileValidator = frmMobile.validate();

  $('#demo1').steps({
    onChange: function(currentIndex, newIndex, stepDirection) {
      console.log('onChange', currentIndex, newIndex, stepDirection);
      // tab1
      if (currentIndex === 0) {
        if (stepDirection === 'forward') {
          var valid = frmRes.valid();
          return valid;
        }
        if (stepDirection === 'backward') {
          frmResValidator.resetForm();
        }
      }

      // tab2
      if (currentIndex === 1) {
        if (stepDirection === 'forward') {
          var valid = frmInfo.valid();
          return valid;
        }
        if (stepDirection === 'backward') {
          frmInfoValidator.resetForm();
        }
      }

      // tab3
      if (currentIndex === 2) {
        if (stepDirection === 'forward') {
          var valid = frmLogin.valid();
          return valid;
        }
        if (stepDirection === 'backward') {
          frmLoginValidator.resetForm();
        }
      }

      // tab4
      if (currentIndex === 3) {
        if (stepDirection === 'forward') {
          var valid = frmMobile.valid();
          return valid;
        }
        if (stepDirection === 'backward') {
          frmMobileValidator.resetForm();
        }
      }

      return true;

    },
    onFinish: function() {
      alert('Wizard Completed');
    }
  });
</script>
<script>
  $('#demo').steps({
    onFinish: function() {
      alert('Wizard Completed');
    }
  });
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
  (function() {
    var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/5b7257d2afc2c34e96e78bfc/default';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script>

@endsection

@section("content")
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-white">Form Layouts</h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li><i class="fa fa-angle-right"></i> <a href="#">Form</a></li>
      <li><i class="fa fa-angle-right"></i> Form Layouts</li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline">
          <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">Category Edit Form</h5>
          </div>
          <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
              <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
            </div>
            @endif

            <form method="post" action="{{route('category.update', $category->id)}}">
              @csrf
              @method('put')
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" name="cat_name" value="{{!old('cat_name')? $category->name :old('cat_name') }}" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
              </div>
              <button type="submit" class="btn btn-success">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.content -->
</div>

@endsection