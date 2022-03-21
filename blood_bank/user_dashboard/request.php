<?php
  include('../connection.php');
  session_start();

  if(!isset($_SESSION['membername']) AND $_SESSION['userid'] == ''){
    header('location:login.php');
  }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Welcome To User Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
  <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
  <!-- WRAPPER -->
  <div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="index.html"><img src=""  class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left">
          <div class="input-group">
            <input type="text" value="" class="form-control" placeholder="Search dashboard...">
            <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
          </div>
        </form>
      
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
            <?php
            $image = $connection->query("SELECT * FROM member WHERE username='".$_SESSION['membername']."'");
            $row = $image->fetch_array(); ?>
            
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php ?> <span><?php echo $_SESSION['membername'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <!-- <li><a href="" data-toggle="modal" data-target="#profile"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li> -->
                
                <li><a href="" data-toggle="modal" data-target="#logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
              </ul>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="user_dashboard.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            <li><a href="request.php" class="active"><i class="lnr lnr-code"></i> <span>Request</span></a></li>
            <li><a href="donor.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Donate</span></a></li>
            
            
            
          </ul>
        </nav>
      </div>
    </div>

    <!-- logout modal -->
     <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to logout now ?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="../logout.php"> <button type="button" class="btn btn-danger">Logout</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- edit profile modal -->
   <div class="modal fade" id="profile" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit My Profile</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript">
	$(document).ready(function() {
    $('#request').DataTable();
} );
</script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

  <h2>Hello,  <span style="color: blue"> <?php echo $_SESSION['membername']?></span> Listed Requester. </h2> <br />
  <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#needblood">Request For Blood</button></p> <br />           
  
  <table class="table table-bordered" id="request">
    <thead>
      <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Hospital</th>
        <th>Image</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      $members= $connection->query("SELECT * FROM requester WHERE member_fk='".$_SESSION['membername']."'");
      while($row = $members->fetch_array()) {
       ?>

        <tr>
        <td><?php echo $row['patient_name'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['contact_no'];?></td>
        <td><?php echo $row['hospital_name'];?></td>

       
        <td><?php if($row['image'] == ''){ ?>
        <img src="http://wiki.bdtnrm.org.au/images/8/8d/Empty_profile.jpg" width="30px" height="30px">
        <?php   } else { ?>
        <img src="../<?php echo $row['image'];?>" width="30px" height="30px">
        <?php  } ?></td>
          
          <td><button type="button" data-toggle="modal" data-target="#deletrequester<?php echo $row['requester_id']?>" class="btn btn-danger">Delete</button>
         


          </td>
         
        </tr>
         <!-- delete city modal -->
        <div class="modal fade" id="deletrequester<?php echo $row['requester_id']?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure ?</h4>
        </div>
        <div class="modal-body">
          <p>Want to delete ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <a href="delete_requester.php?requester_id=<?php echo $row['requester_id'];?>"> <button type="button" class="btn btn-danger">Delete</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end of delete state modal -->
 

   
<?php }
      ?>
    </tbody> 
  </table>
</div>
	</div>
</div>

<!-- add state modal -->
<div class="modal fade" id="needblood" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Need For Blood</h4>
        </div>
        <div class="modal-body">
        <form action="need_blood.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
          	<input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"></input>
          </div>
          
          <div class="form-group">
           <select name="gender" class="form-control">
             <option value="male">Male </option>
             <option value="female">Female </option>
             <option value="other">Other </option>
           </select>
          </div>

           <div class="form-group">
           <select name="group" class="form-control">
             <option value="a+">A+ </option>
             <option value="b+">B+ </option>
             <option value="ab+">AB+ </option>
             <option value="o+">O+ </option>
           </select>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter unit"></input>
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="hospital" id="hospital" placeholder="Enter hospital"></input>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Enter date"></input>
          </div>

           <div class="form-group">
            <input type="text" class="form-control" name="contactperson" id="contactperson" placeholder="Enter contact person"></input>
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
          </div>

           <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"></input>
          </div>

           <div class="form-group">
            <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact"></input>
          </div>
             <div class="form-group">
            <textarea type="text" class="form-control" name="reason" id="reason" placeholder="Enter Reason"></textarea>
          </div>

          
          <div class="form-group">
            <input type="file" class="form-control" name="photo" id="photo" ></input>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="needblood">Add</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<?php
	include('user_footer.php');
?>