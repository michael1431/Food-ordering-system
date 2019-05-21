<?php 
session_start();
include './function.php';

if (!isset($_SESSION['admin'])){
if (isset($_POST['email'])){
    
    $email= $_POST['email'];
    $c_pass= $_POST['password'];
    
    $customer_info= check_admin($email, $c_pass) ;
    
    
    if($customer_info){
       
        
        $_SESSION['admin']=$customer_info;
         header('Location:Admin_here.php'); 
       //echo $_SESSION['student'] ['s_name'];
       
        
        //echo 'Login Success';
    }
 else {
        echo 'Login Failed';    
    }
    
   
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.css" />
    </head>
    <body  style="background-color: #ececec">
           <div class="container">
            <div class="row">
                <div class="col-md-3 col-md-offset-4" style="margin-top: 150px">
                    <div class="panel panel-default">
                        <div class="panel-header btn-primary btn-lg text-center btn-block">
                           Admin Login
                            
                        </div>
                        
                        <div class="panel-body">
                             
                            <form action="" method="POST">
                    <input type="text" class="form-control" name="email" placeholder="Admin ID"> <br/>
                    <input type="password" class="form-control" name="password" placeholder="Password" 
                           <br/><br/>
                    <button class="btn btn-info">Login </button>
                    
                    </form>

                        </div>

                    </div>
                    
                    
                    
                    
                </div>
                
                
                
                
                
            </div>
            
            
            
        </div>
        
<?php } 
 else {
     header('Location:Admin_here.php'); 
}

?>
        
    </body>
</html>
