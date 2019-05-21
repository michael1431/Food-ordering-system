<?php

include './function.php';
$message="";

if(isset($_GET['order_id'])){
     global $connecton;
    $order_id=$_GET['order_id'];
    $sql="UPDATE  `project`.`review` SET  `order_action` =  '1' WHERE  `review`.`id` = '".$order_id."'  ;";
            $qu = mysqli_query($connecton, $sql); 
 }


if(isset($_REQUEST['search']) ){
    $name=$_REQUEST['search'];
    $sub=$_REQUEST['submit'];
   
    $result = mysqli_query($connecton, "SELECT * FROM payments
     WHERE trun_id LIKE '%{$name}%' ");
    
     while($row= mysqli_fetch_array($result)){
            $message= 'Key Found:  '.$row["trun_id"];


            }       
        
    
    


}

        ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Complete</title>
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
                    <h1 class="text-warning" style="font-family: initial">Total Order List</h1>
                 <?php
                              if ($message) {
                                  echo "<h1>".$message."</h1>";
                                  
                              }
                            ?>
                </div>
                <div class="col-md-12 text-right">
                    <form action="" method="post">
                        <input type="text" name="search" class="">
                    <input type="submit" name="submit" value="Search" class="btn btn-md btn-success" style="font-family: cursive">
                    </form>
                    
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        
                        <table class="table" style="text-align: center">
                            <tr>
                                 <td>List</td>
                                <td>Customer Name</td>
                                <td>Total Payment</td>
                                <td>Transaction Key</td>
                                                     
                                <td>Date</td>
                                <td>Action</td>
                            </tr>
                            <?php 
                            $i=1;
                       $all_user_exam= get_all_orders();
                            foreach ($all_user_exam as $user_exam){
                                 $cus_info= get_customer_by_id($user_exam['customer_name']) ;
                                 $pay_info= get_payment_info_by_id($user_exam['total_payment']) ;
                                  $t_info= get_payment_info_by_id($user_exam['tran_key']) ;
                            ?>
                            <tr>
                                <input type="hidden" value="<?php echo $user_exam['id']; ?>" name="order_id" />
                                <td>Order: <?php echo $i; ?></td>
                                <td><?php echo  $cus_info['name'] ?></td>
                                <td><?php echo $pay_info['amount']; ?></td>
                                <td><?php echo $t_info['trun_id']; ?></td>
                                <td><?php echo $user_exam['date']; ?></td>
                                <?php if($user_exam['order_action']==0){ ?>
                                <td><a href="order_submit.php?order_id=<?php echo $user_exam['id'] ; ?>">New Order ?</a></td>
                             <?php }else{ ?>
                                
                                <td>Order Successfully Done</td>
                            <?php } ?>
                                
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
