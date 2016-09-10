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
    if(isset($_POST['change_admin_password_button'])){
        $new_password1 = $_POST['password1'];
        $new_password2 = $_POST['password2'];
        $admin_email_id = $_SESSION['email'];
        if($new_password1 == $new_password2){
            $hashed_new_password = password_encryption($new_password1);
            $query = "UPDATE usr_details SET password = '{$hashed_new_password}'  WHERE email = '{$admin_email_id}' LIMIT 1";
            mysqli_query($conn,$query);
            $link  = "<html>";
            $link .= "<script type='text/javascript'>";
            $link .= "window.location.href = 'admin_settings.php';";
            $link .= "</script>";
            $link .= "</html>";
            echo $link;
        }
    }
?>

<div class="container">    
        <div id="signupbox" style="margin-top:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Change Password</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="signupform" class="form-horizontal" role="form" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-username" type="password" class="form-control" name="password1" value="" placeholder="enter new password">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-username" type="password" class="form-control" name="password2" value="" placeholder="re-enter new password">                                        
                            </div>
                                
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                <div class="col-sm-12 controls">
                                  <input id="btn-login" type="submit" class="btn btn-success" name="change_admin_password_button" value="Change">
                                </div>
                            </div>


                               
                            </form>     



                        </div>                     
                    </div>  
        </div>
    </div>
        
