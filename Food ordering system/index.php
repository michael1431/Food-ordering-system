<?php 
session_start();
include './function.php';
 $msg = "";
if (!isset($_SESSION['customer'])){
    
if (isset($_POST['c_mail'])){
    
    $email= $_POST['c_mail'];
    $c_pass= $_POST['c_pass'];
    //$pass = md5($c_pass);
    
    $customer_info= check_customer($email, $c_pass) ;

    if($customer_info){
        $_SESSION['customer']=$customer_info;
         header('Location:homepage.php'); 
    }
 else {
            $msg= 'login failed';   
    }  
 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/font-awesome.css"/>
         <style>
             body{
                 margin-top: 170px;
                 background-color: wheat;
             }
         </style>
    </head>
    <body >
             <form action="" method="post">
            <div class="container ">
                <div class="row">
                   
                    <div class="col-md-4 col-md-offset-4  " >
                        <div class="panel panel-info text-center">
                            <div class=" panel-heading">
                                <h3> <b class="text-success">Customer Login</b></h3>
                                
                            </div>
                            <div class=" panel-body">
            <table class="table table-striped">
                                <tr>
                    <td class="text-right"> <b style="color: red;font-family: cursive;" >User Email:</b></td>
                    <td><input class="form-control" type="text" name="c_mail" placeholder="enter your mail" required=""></td>
                </tr>
                <tr>
                    <td class="text-right"><b style="color: red;font-family: cursive;" >User Password: </b></td>
                    <td><input class="form-control" type="password" name="c_pass" placeholder="enter your password" required=""></td>
                </tr>
                
               
                
                <tr>
                    <td colspan="2" class="text-center">
                        <button class="btn btn-block btn-lg btn-primary"><b><i class="fa fa-sign-in" aria-hidden="true"></i>
 LOG IN</b></button>
                
                      </td>
                </tr>
                
            </table>
                            </div>
                              <div class=" panel-footer">
                                  <b style="color: black">Haven't registered?please <a href="customer_reg.php">Sign Up</a></b>
                            </div>
                        </div>
                        <center>
                        <?php
                        if($msg){
                            echo '<b>'.$msg.'</b>';
                        }
                        
                        ?> </center>   
                        </div>
                       
       
                   </div>   
                </div>
          
           
        </form>
        
<?php } 
 else {
     header('Location:homepage.php'); 
}

?>
        
    </body>
</html>
