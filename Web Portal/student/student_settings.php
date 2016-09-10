<?php
session_start();
include("student_header.php");
include("../includes/functions.php");

if (!isset($_SESSION['student'])) {
        redirect_to('../index.php');
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
                            
                        <form id="signupform" class="form-horizontal" role="form" action="add_new_admin.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="password1" value="" placeholder="enter new password">                                        
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="password2" value="" placeholder="re-enter new password">                                        
                            </div>
                                
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                <div class="col-sm-12 controls">
                                  <a id="btn-login" href="#" class="btn btn-success" name="add_new_admin_button">Change</a>
                                </div>
                            </div>


                               
                            </form>     



                        </div>                     
                    </div>  
        </div>
    </div>
        
