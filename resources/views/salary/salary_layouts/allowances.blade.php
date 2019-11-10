
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') Control Panel</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">


    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>@yield('utypemin')</b>CP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><small><b>@yield('utype') </b>Control Panel</small></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        @section('avators')
        @show
        </div>
        <div class="pull-left info">
        
        @section('names')
        @show
        <i class="fa fa-circle text-success"></i> Online</a>
          
          
        </div>
        <br/><br/>
      </div>
      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Actions</li>
        <!-- Optionally, you can add icons to the links -->
        
        <li class="">
          @section('homes')
          @show
  
          <i class="fa fa-home"></i><span>Home</span></a></li>
        
        
        <li class="">
        @section('records')
        @show

        <i class="fa fa-tasks"></i> <span>@yield('functions01')</span></a></li>

        @section('allowance')
        @show

        @section('deduction')
        @show

        @section('funds')
        @show

        @section('sal_grp')
        @show

        @section('attendance')
        @show

        @section('generate_salary')
        @show
            

        <li class="">
        @section('myprofile')
        @show

        <i class="fa fa-user"></i> <span>My Profile</span></a></li>

        
            @section('calander_event')
            @show

            

        <li class=""><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        <i class="fa fa-sign-out"></i> <span>Sign-Out</span></a></li>
        
      </ul>

  
                                       
                                    

                                   

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      <section class="content">



        @section('core')
        @show





</section>
</div>
</div>


<footer class="main-footer">

    <div class="pull-right hidden-xs">
      Company Name Here
    </div>
    
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

  <div class="control-sidebar-bg"></div>
</div>

<div class="modal fade" id="add_allow">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create New Allowance Type</h4>
        </div>
        <div class="modal-body">
          
            <form action="{{route('addallowance')}}" method="post">
                    {{csrf_field()}}
  
  
                <div class="form-group">
                <label for="allowance_type">Allowance Type</label>
                <input type="text" class="form-control" name="allowance_type" id="allowance_type" placeholder="Allowance Type">
                </div>
  
                <div class="form-group">
                <label for="amount">Allowance Amount</label>
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Allowance Amount">
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  <div class="modal fade" id="add_deduct">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create New Deduction Type</h4>
        </div>
        <div class="modal-body">
          
            <form action="{{route('adddeduction')}}" method="post">
                    {{csrf_field()}}
  
  
                <div class="form-group">
                <label for="deduction_type">Deduction Type</label>
                <input type="text" class="form-control" name="deduction_type" id="deduction_type" placeholder="Deduction Type">
                </div>
  
                <div class="form-group">
                <label for="amount">Deduction Amount</label>
                <input type="text" class="form-control" name="amount" id="amount" placeholder="Deduction Amount">
                </div>
  
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal fade" id="epf_cal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Create New Fund Level</h4>
        </div>
        <div class="modal-body">
          
            <form action="{{route('addepf')}}" method="post">
                    {{csrf_field()}}
  
  
                <div class="form-group">
                <label for="level">Fund Level Name</label>
                <input type="text" class="form-control" name="level" id="level" placeholder="Fund Level Name">
                </div>
  
                <div class="form-group">
                <label for="epf">EPF Percentege</label>
                <input type="text" class="form-control" name="epf" id="epf" placeholder="EPF Percentege">
                </div>
  
                <div class="form-group">
                <label for="etf">ETF Percentege</label>
                <input type="text" class="form-control" name="etf" id="etf" placeholder="ETF Percentege">
                </div> 
                
                <div class="form-group">
                  <label for="stamp">Stamp Duty Deduction</label>
                  <input type="text" class="form-control" name="stamp" id="stamp" placeholder="Stamp Duty Deduction">
                  </div> 
  
                
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create Fund Level</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->




<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../js/jquery.spinner.js"></script>

<script>
$("#spinner").spinner();

$("#spinner")

  .spinner('delay', 200)//delay in ms

  .spinner('changed',function(e, newVal, oldVal){

    //trigger lazed, depend on delay option.

  .spinner('changing',function(e, newVal, oldVal){

  });


</script>

</body>
</html>