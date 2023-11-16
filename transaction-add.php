<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
    <?php include("includes/sidebar.php"); ?>
    </div>
    </div>

    <div class="main-panel">
    <?php include("includes/navbar.php"); ?>
<?php 
    require("config/config.php");
    require("config/db.php");

    if(isset($_POST["submit"])){
        $documentcode = mysqli_real_escape_string($conn, $_POST['documentcode']);
        $action = mysqli_real_escape_string($conn, $_POST['action']);
        $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
        $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
        $office_id = mysqli_real_escape_string($conn, $_POST['office_id']);

        $query = "INSERT INTO transaction(documentcode, action, remarks, employee_id, office_id)
        VALUES('$documentcode', '$action', '$remarks', '$employee_id','$office_id')";
        
        if(mysqli_query($conn, $query)){
            
        }else{
            echo "ERROR: ".mysqli_error($conn);
        }
    }
?>    <div class="content">
            <div class="container-fluid">
                <div class="section">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transactions</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                    <div class="row">
                                    <div class="col-md-3 pr-1">
                                            <div class="form-group">
                                                <label>Document Code</label>
                                                <input name="documentcode" type="text" class="form-control">
                                            </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Action</label>
                                                <select class="form-control" input name="action">
                                                    <option>IN</option>
                                                    <option>OUT</option>
                                                    <option>COMPLETE</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Remarks</label>
                                                <input name="remarks" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Employee</label>
                                                <select class="form-control" name='employee_id'>
                                                <option>Select.....</option>
                                                <?php
                                                     $query = "SELECT id, CONCAT(lastname,', ',firstname) as Employee from recordapp_db.employee";
                                                     $result = mysqli_query($conn, $query);
                                                     while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value=" . $row['id'] . ">" . $row['Employee'] . "</option>";
                                                     }
                                                ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pr-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Office</label>
                                                <select class="form-control" name='office_id'>
                                                <option>Select.....</option>
                                                <?php
                                                     $query = "SELECT id, name FROM recordapp_db.office";
                                                     $result = mysqli_query($conn, $query);
                                                     while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                     }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                        
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" value="Submit" class="btn btn-info btn-fill pull-right">Save</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                                    
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
