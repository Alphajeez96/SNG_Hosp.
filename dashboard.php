<?php 
include_once('lib/header.php'); 
include_once('lib/dbcss.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to login
    header("Location: login.php"); 
}
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">logged in as (<?php echo $_SESSION['role'] ?>)</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="reset.php">
        <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Reset password</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- Heading -->
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
          <h4>User ID:<?php echo $_SESSION['loggedIn'] ?></h4>

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
                  <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Reset password
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
          <div class="d-sm-flex align-items-center col-12  mb-4">
            <div class='col-md-8'>
            <h1 class="h3 mb-0 text-gray-800">Patient Dashboard</h1>
            </div>
            <div class='ml-5 col-md-4'>
            <button type="button" class="btn btn-primary mx-2" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-user fa-sm text-white-50"></i>
    Book Appointment
  </button>

  <a href="bill.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-yen-sign fa-sm text-white-50"></i> Pay Bill</a>
  </div>

  

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Book An Appointment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form method='POST' onsubmit='sweet_alert();' id='appointment_form' action='processappointment.php'>
         <div class="form-group">
                        <label class="control-label">Full Name</label>
                        <div>
                            <input required placeholder='Full Name' type="text" class="form-control input-lg" name="full_name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input placeholder='Email' required type="email" class="form-control input-lg" name="appointment_email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Date Of Appointment</label>
                        <div>
                            <input required type="date" class="form-control input-lg" name="appointment_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Time Of Appointment</label>
                        <div>
                            <input required type="time" class="form-control input-lg" name="appointment_time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nature Of Appointment</label>
                        <div>
                        <select id='new_appointment' required class="form-control input-lg" name="appointment_nature" >
                <?php              
                    if(isset($_SESSION['appointment_nature'])){
                        echo "value=" . $_SESSION['appointment_nature'];                                                             
                    }                
                ?>
                    <option value="">Click To Select</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'New'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >  New </option>
                    <option 
                    <?php              
                        if(isset($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Follow-Up'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Follow-Up</option>
                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for='department' class="control-label"> Department</label>
                        <div>
                        <select id='department' required class="form-control input-lg" name="apppointment_department" >
                <?php              
                    if(isset($_SESSION['apppointment_department'])){
                        echo "value=" . $_SESSION['apppointment_department'];                                                             
                    }                
                ?>
                    <option value="">Click To Select</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['apppointment_department']) && $_SESSION['apppointment_department'] == 'Laboratory'){
                            echo "selected";                                                           
                        }                
                    ?>
                    > Laboratory </option>
                    <option 
                    <?php              
                        if(isset($_SESSION['apppointment_department']) && $_SESSION['apppointment_department'] == 'Radiology Unit'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Radiology Unit</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['apppointment_department']) && $_SESSION['apppointment_department'] == 'General Surgery'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >General Surgery</option>
                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Initial Complaint</label>
                        <div>
                        <textarea required name="initial_complaint" placeholder='Enter Complaint here...' class="form-control input-lg" ></textarea>
                        </div>
                    </div>
          
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button class="btn btn-success" type="submit">Book</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

 
  
</div>
            <!-- <a href='appointment.php' class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Book Appointment</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Date Joined</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $_SESSION['register_at'] ?> (GMT)</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Login Time</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $_SESSION['loggedin_at'] ?> (GMT)</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Appointments</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
           
          </div>

          <!-- Content Row -->

         
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script src="js/sb-admin-2.min.js"></script> -->

  <!-- Page level plugins -->
  <!-- <script src="vendor/chart.js/Chart.min.js"></script>  -->

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->

</body>

<?php include_once('lib/footer.php'); ?>