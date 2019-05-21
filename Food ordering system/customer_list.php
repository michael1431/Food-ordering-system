<?php

include './function.php';
$m3="";

if(isset($_GET['customer_id'])){
    $cart_item_id = $_GET['customer_id'];
    $sql= mysqli_query($connecton, "DELETE FROM customer WHERE id='".$cart_item_id."'"); 

    if($sql){
        $m2="Successfully Deleted";
        
    }
    else {
        $m2=" demage";
    }
}

        ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Customer List</title>
        <link rel="icon" href="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/bootstrap.css" />
        
        
        <script src="js/jquery-2.1.1.min.js"></script>
        
    </head>
    
    
    <body style="background-color: #ececec">
        <div class="container">
         <a href="Admin_here.php">Go To Admin Pages</a>
            <div class="row" style="margin-top: 30px">
                <div class="col-md-12 text-center">
                    <h1 class="text-warning" style="font-family: initial">Total Customer List</h1>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        
                        <table class="table" style="text-align: center">
                            <tr>
                                 <td>Serial No</td>
                                <td>Customer Name</td>
                                <td>Customer Email</td>                                
                                <td>Created</td>
                                <td colspan="">Action</td>
                               
                            </tr>
                            <?php
                              if ($m3) {
                                  echo "<h1>".$m3."</h1>";
                                  
                              }
                            ?>
                            <?php 
                            
                            $i=1;
                       $all_user_exam= get_all_customer();
                            foreach ($all_user_exam as $user_exam){
                                 
                            ?>
                            <tr>
                                <input type="hidden" value="<?php echo $user_exam['id']; ?>" name="order_id" />
                                <td>Order: <?php echo $i; ?></td>
                                 <td><?php echo  $user_exam['name'] ?></td>
                                <td> <?php echo $user_exam['email']; ?></td>
                                <td><?php echo $user_exam['created']; ?></td>
                                <td><a href="customer_list.php?customer_id=<?php echo $user_exam['id']; ?>"> <input type="submit" value="Delete Account"></a></td>
                                
                               
                                
                                
                            </tr>
                            <?php   $i++;} ?>
                        </table>
                        
                        <h1>new Order </h1>
                    </div>
                    
                </div>
        
            </div>
                
 
        </div>
       
            
       
        
        
    </body>
</html>
