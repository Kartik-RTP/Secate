<?php
session_start();
include("admin_header.php");
include("../includes/functions.php");
include("../includes/connection.php");
?>

<?php

if (!isset($_SESSION['admin'])) {
        redirect_to('../index.php');
    }
?>    
<?php

    if(isset($_POST['add_new_admin_button'])){
        $new_admin_username = $_POST['new_admin_username'];
        $new_admin_email = $_POST['new_admin_email'];
        $new_admin_password = password_encryption($_POST['new_admin_password']);
        $query = "INSERT INTO usr_details VALUES('{$new_admin_username}','{$new_admin_email}','{$new_admin_password}','{$new_admin_username}',NULL,2)" or die("error");
        mysqli_query($conn,$query);
        redirect_to('add_new_admin.php');
        
    }

?>

<div class="container">    
        <div id="signupbox" style="margin-top:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Add new admin</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="signupform" class="form-horizontal" role="form" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="new_admin_username" placeholder="username">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="login-email" type="text" class="form-control" name="new_admin_email" placeholder="email">                                        
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="new_admin_password" placeholder="password">
                                    </div>
                                    
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" id="btn-login" class="btn btn-success" name="add_new_admin_button" value="Signup">
                                    </div>
                                </div>


                               
                            </form>     



                        </div>                     
                    </div>  
        </div>
    </div>
        
