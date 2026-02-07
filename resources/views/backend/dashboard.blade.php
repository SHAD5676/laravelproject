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

</head>
@endsection


@section("scripts")
    <!-- jQuery 3 --> 
<script src="{{url('')}}/dist/js/jquery.min.js"></script>  
<script src="{{url('')}}/dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="{{url('')}}/dist/js/bizadmin.js"></script> 

<!-- Jquery Sparklines --> 
<script src="{{url('')}}/dist/plugins/jquery-sparklines/jquery.sparkline.min.js"></script> 
<script src="{{url('')}}/dist/plugins/jquery-sparklines/sparkline-int.js"></script> 

<!-- Morris JavaScript --> 
<script src="{{url('')}}/dist/plugins/raphael/raphael-min.js"></script> 
<script src="{{url('')}}/dist/plugins/morris/morris.js"></script> 
<script src="{{url('')}}/dist/plugins/functions/dashboard1.js"></script> 

<!-- for demo purposes --> 
<script src="{{url('')}}/dist/js/demo.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b7257d2afc2c34e96e78bfc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
@endsection

@section("content")

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
        <h1>User Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('')}}/#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Dashboard</li>
        </ol>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>Total Balance</p>
                                <h2 class="font-weight-bold">$15,859</h2>
                                <a href="{{url('')}}/#">View Statement</a>
                            </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-bar"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-aqua">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>Online Revenue</p>
                                <h2 class="font-weight-bold">$8,859</h2>
                                <a href="{{url('')}}/#">View Statement</a>
                            </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-line"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 m-b-3">
                <div class="widget-info bg-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-white">
                                <p>Total Profit</p>
                                <h2 class="font-weight-bold">$85,085</h2>
                                <a href="{{url('')}}/#">View Statement</a>
                            </div>
                            <div class="col-md-6 m-t-2 text-right"> <span id="spa-pie"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="info-box">
                    <div class="col-12">
                        <h5>Revenue Statistics</h5>
                        <div class="row m-t-2 m-b-2">
                            <div class="col-md-6">
                                <h1 class="font-weight-500">$23,743</h1>
                                <p>Total Revenue</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="text-blue font-weight-bold">Organic Traffic</h6>
                                <p class="f-13">+ 40% this month</p>
                            </div>
                            <div class="col-md-3">
                                <h6 class="text-green font-weight-bold">Page Views</h6>
                                <p class="f-13">+ 25% this month</p>
                            </div>
                        </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>

        </div>
        <!-- /.row -->


        <!-- /.row -->
    </div>
    <!-- /.content -->
</div>

@endsection