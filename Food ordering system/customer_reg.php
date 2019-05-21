<?php
include './function.php';

$message = "";

$date= date('d/m/y');
$action = "1";
$confirm_code = substr(md5(uniqid(rand(0,9), true)),8,8);
if(isset($_REQUEST['email']) ){
    $student_name=$_REQUEST['name'];
    $student_email=$_REQUEST['email'];
    $student_password=$_REQUEST['pass'];
    //$pass = md5($student_password);
 
    $student_reg= add_customer($student_name,$student_email,$student_password,$date,$confirm_code,$action);
   
    
    if($student_reg){
        
        $message="Registration Complete.";
        
    }
    else {
        $message="damage";
    }
 
}
  ?> 




<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="css/mycss.css">
          <link rel="stylesheet" href="css/font-awesome.css"/>  
        <script src="js/jquery-2.1.1.min.js"></script>
   
    </head>
    
    <body style="margin-top:80px; background-color: wheat;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-offset-4 " style="margin-top:15px ">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2><span style="font-family: initial"> <b class="text-success">Customer FORM</b></span></h2>
                            <?php
                              if ($message) {
                                  echo "<h4>".$message."</h4>";
                                  
                              }
                            ?>
                            
                        </div>
                        <div class="panel-body">
                            
                            <form action="" method="POST">
                                
                                        
                    <table>
                        <caption class="text-center btn-lg " style="font-size: 20px; color:red; font-family: cursive">
                            <i><b></b></i>
                            
                            
                             
                        </caption>
                      
                        <thead>
                            
                            
                        </thead>
                         
                        <tbody>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Name</b>
                                </td>
                                <td><input class="form-control"  type="text" name="name" required=""></td>
                            </tr>
                          
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Email:</b>
                                </td>
                                <td><input class="form-control" type="email"  name="email" required=""></td>
                            </tr>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                               <b> Password: </b>
                                </td>
                                <td><input class="form-control"  type="password" name="pass" required=""></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button class="btn btn-lg btn-success" style="font-family: cursive; margin-left: 120px "> Sign Up</button></td>
                                <td><a href="index.php"><span class="text-danger" style="font-family: cursive; font-size: 15px;">Login</span></td>
                            </tr>
                        </tfoot>
                        
                        
                        
                    </table>
                                
                                
                            </form>
                            
                            
                            
                        </div>
                        <!--<div class="panel-footer"></div>-->
                        
                
                
                
                
                
            </div>
            
        </div>
            </div>
        
        </div>
        
        
        
        
        
    </body>
    
    
    
    
    
    
    
</html>

