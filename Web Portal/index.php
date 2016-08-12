<?php
  session_start();
  include("includes/functions.php");
  include("includes/connection.php");
?>

<?php

// Use ajax instead
if (isset($_POST['admin_signin_button'])){
  $admin_email_id = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];
  $if_found_email = find_admin_email($admin_email_id,$conn);
  if ($if_found_email != NULL){
      $found_password = find_admin_password($if_found_email,$conn);
      if(password_check($admin_password,$found_password)){
        $_SESSION["admin"] = $admin_email_id;
        redirect_to('admin/admin_index.php');
      }
      else{
        redirect_to('index.php');
      }
    }
    else{
      redirect_to('index.php');
    }
  }
  
elseif (isset($_POST['student_signin_button'])){
  $student_email_id = $_POST['student_email'];
  $student_password = $_POST['student_password'];
  $if_found_email = find_student_email($student_email_id,$conn);
  
  if ($if_found_email != NULL){
      $_SESSION["student"] = $student_email_id;
      $found_password = find_student_password($if_found_email,$conn);
      if(password_check($student_password,$found_password)){
        $_SESSION["student"] = $student_email_id;
        redirect_to('student/student_index.php');
      }
    
      else{
      redirect_to('index.php');
    }
   } 
    else{
      redirect_to('index.php');
    }
  
}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Secate Web Portal">
    
    <title>Secate Web Portal</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="dist/js/jquery-1.12.0.min.js"></script>
    <link href="dist/css/styles.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js'></script>



  </head>

  <body>
      <nav style="background:#193655 " class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <a class="navbar-brand" href="index.php">Secate Web Portal</a>
          </div>
         </nav>
          <div style="background:#1d3f63 !important" id="second_header" class="jumbotron">
            <h4 align="center">Welcome</h4>
          </div>
              <div class="panel panel-success">
              <div class="panel-heading">
                <p class="panel-title" align="center">Admin Login</p>
              </div>
            
          <div class="panel-body">
            <div align="center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" name="admin_signin" id="signin_button">Login</button>
          </div>
      <!-- Modal -->
          <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title1">Admin Login</h4>
                </div>
                <div class="modal-body">
                  
                  
                  <form class="form-signin" method="POST" id="signin_form" >
                      <div style="margin-bottom: 25px" class="input-group">
                        <label for="AdminEntry" class="sr-only">Email</label>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="admine_email" type="text" class="form-control" name="admin_email" value="" placeholder="Email">                                        
                      </div>
                              
                      <div style="margin-bottom: 25px" class="input-group">
                          <label for="inputPassword" class="sr-only">Password</label>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input id="admin_password" type="password" class="form-control" name="admin_password" value="" placeholder="Password">                                        
                      </div>
                          <button class="btn btn-primary btn-block" type="submit" name="admin_signin_button" id="signin">Sign in</button>
                  </form>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
        </div>
  </div>


<div class="panel panel-success">
              <div class="panel-heading">
                <p class="panel-title" align="center">Student Login</p>
              </div>
            
          <div class="panel-body">
            <div align="center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" name="student_signin" id="signin_button">Login</button>
          </div>
      <!-- Modal -->
          <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title2">Student Login</h4>
                </div>
                <div class="modal-body">
                  <div class="tabbale">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">Login</a></li>
                      <li><a href="#tab2" data-toggle="tab">Request Password</a></li>
                    </ul>
                    </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <form class="form-signin" method="POST" id="signin_form" >
                        <div style="margin-bottom: 25px" class="input-group">
                          <label for="studentEntry" class="sr-only">Email</label>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="student_email" type="text" class="form-control" name="student_email" value="" placeholder="Email">                                        
                          <span class="status"></span>
                        </div>
                                
                        <div style="margin-bottom: 25px" class="input-group">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="student_password" type="password" class="form-control" name="student_password" value="" placeholder="Password">                                        
                            <span class="status"></span>
                        </div>
                            <button class="btn btn-primary btn-block" type="submit" name="student_signin_button" id="signin">Sign in</button>
                    </form >
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form class="form-signin" method="POST" id="signin_form">
                          <div style="margin-bottom: 25px" class="input-group">
                          <label for="studentEntry" class="sr-only">Email</label>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="student_email_signup" type="text" class="form-control" name="student_email_signup" value="" placeholder="Email">                                        
                          <span class="status"></span>
                        </div>
                         <button class="btn btn-primary btn-block" type="submit" name="student_signup_button" id="signin">Send Mail</button>
                        </form>
                  </div>
                  </div>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
        </div>
  </div>
  <script>
 
</script>
</html>



</body>

</html>



