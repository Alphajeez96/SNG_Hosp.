<?php include_once('lib/header.php'); ?>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="mtdashboard.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-1">logged in as (<?php echo $_SESSION['role'] ?>)</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="mtdashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="radappointments.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Staff</span></a>
    </li>
    <hr class="sidebar-divider">
    <!-- Heading -->

    <li class="nav-item">
      <a class="nav-link" href="reset.php">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Reset Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
          <li class="nav-item">
      <a class="nav-link" href="logout.php">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Logout</span></a>
    </li>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search --> 
      
      
       
       

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">1</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500"><?php echo $_SESSION['register_at'] ?> </div>
                  <span class="font-weight-bold">Welcome to SNG Hospital, Thanks For Creating an Account</span>
                </div>
              </a>
              
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>

          
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Welcome, <?php echo $_SESSION['fullname'] ?></span>
              <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="reset.php" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Reset Password
              </a>
              <div class="dropdown-divider"></div>

              
              <a class="dropdown-item" href="logout.php" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 ml-4 mb-2 text-gray-800">All Staff</h1>
         
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
<thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Date Joined</th>
                      <th>Last Login</th>
                    </tr>
                  </thead>

<?php 

include_once('lib/header.php'); 
require_once('functions/alert.php');
include_once('lib/dbcss.php');
require_once('functions/redirect.php');
require_once('functions/appointments.php');
require_once('functions/user.php');


    $all_staff = scandir("db/users/");
    $count_staff= count($all_staff ) ;
    // print_r($count_patients);
    // die();
       
    for($counter = 2; $counter < $count_staff; $counter++ ){
        $current_staff= $all_staff[$counter];
    //        print_r($current_patient);
    // die();
      
        $staff_string = file_get_contents("db/users/".$current_staff);
        $staff_object = json_decode($staff_string);
        //     print_r($staff_object);
        //  die(); 
        // $designation = $patient_object->designation;
 
            $staff_name = $staff_object->first_name. " " . $staff_object->last_name;
            $staff_email = $staff_object->email;
            $staff_gender = $staff_object->gender;
            $staff_designation= $staff_object->designation;
            $staff_department = $staff_object->department;
            $date_joined = $staff_object->register_at;   

if ($staff_designation == 'Medical Team (MT)') {


?>


                  <tbody>
                    <tr>
                      <td><?php echo $staff_name;?></td>
                      <td><?php echo $staff_email;?></td>
                      <td><?php echo $staff_gender;?></td>
                      <td><?php echo $staff_designation;?></td>
                      <td><?php echo $staff_department;?></td>
                      <td><?php echo $date_joined;?></td>
                    </tr>

             <?php   } }
?>