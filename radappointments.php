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
      <a class="nav-link" href="radiologydashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="radappointments.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Appointments</span></a>
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
      
        <h6 class='mx-2'>DEPARTMENT: <?php echo $_SESSION['department'] ?></h6>
        <h6 class='mx-4'>STAFF ID: <?php echo $_SESSION['loggedIn'] ?></h6>
       
       

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
          <h1 class="h3 ml-4 mb-2 text-gray-800">Appointments</h1>
         
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Complaint</th>
                      <th>Time</th>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Department</th>
                    </tr>
                  </thead>


<?php 


require_once('functions/alert.php');
include_once('lib/dbcss.php');
require_once('functions/redirect.php');
require_once('functions/appointments.php');
require_once('functions/user.php');




$allAppointments = scandir("db/appointments/"); 
    $countAllAppointments = count($allAppointments);

    for ($counter = 2; $counter < $countAllAppointments ; $counter++) {
       
        $currentAppointment = $allAppointments[$counter];

            $appointmentString = file_get_contents("db/appointments/".$currentAppointment);
            $appointmentObject = json_decode($appointmentString);
        
    $patient_name = $appointmentObject->full_name;
    $appointment_email = $appointmentObject->appointment_email;
    $appointment_nature = $appointmentObject->appointment_nature;
    $appointment_date = $appointmentObject->appointment_date;
    $appointment_time = $appointmentObject->appointment_time;
    $appointment_nature = $appointmentObject->appointment_nature;
    $appointment_department = $appointmentObject->apppointment_department;
    $complaint = $appointmentObject->initial_complaint;
  

    // $UserPath = "db/users/".$currentAppointment;
		// 			$userlogin = json_decode(file_get_contents($UserPath));
		// 			$patient_name = $userlogin->first_name." ".$userlogin->last_name;
					if(($appointment_department) == 'Radiology Unit' && ($_SESSION['department']) == 'Radiology Unit'){
?>
                            <tbody>
                    <tr>
                      <td><?php echo $patient_name;?></td>
                      <td><?php echo $appointment_email;?></td>
                      <td><?php echo $complaint;?></td>
                      <td><?php echo $appointment_time;?></td>
                      <td><?php echo $appointment_date;?></td>
                      <td><?php echo $appointment_nature;?></td>
                      <td><?php echo $appointment_department;?></td>
                    </tr>
                   
 <?php } }
 ?>  
