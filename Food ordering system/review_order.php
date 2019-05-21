<?php
session_start();
include './function.php';
$customer_id = $_SESSION['customer']['id']; 
 echo $customer_id;

$r=0;

if(isset($_POST['Payment_id']))
{
    $payment_id= $_POST['Payment_id'];
    $date= date('d-m-y');
    $insert_user_review= insert_user_exam($customer_id, $payment_id,$payment_id, $date, $r);

}

 $all_user_exam = get_all_user_exam_by_user_sub_id($customer_id);

 ?>

<html>
    <head>
        
        <link rel="stylesheet" href="css/bootstrap.css"/>   
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
                
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
    </head>
    
    
    <body style="background-color: #ececec">
        <div class="container">
            <nav class="navbar navbar-inverse ">
         <ul class="nav navbar-nav navbar-left">
             <li class="active btn-primary"><a href="homepage.php" style="font-family:cursive"><span class=""></span><b style="padding: 5px;font-size: 30px;color: greenyellow" class=""><i>Online Food Order <sub style="font-family: cursive;font-size: 10px">Team Wildcards</sub></i></b><span class="sr-only">(current)</span></a></li>
         </ul>
        
      <ul class="nav navbar-nav ">
          <li class=""><a href="homepage.php" style="font-family: monospace"><span class="glyphicon glyphicon-home"></span><b style="padding: 5px">Home </b><span class="sr-only">(current)</span></a></li>
          <li class=" "><a href="about_us.php" style="font-family: monospace"><span class="glyphicon glyphicon-book"></span><b  style="padding: 5px">About Us </b></a></li>
        
        <!--<li class=" "><a href="#contact" style="font-family: monospace"><b>Contact Us </b></a></li>-->
        <li><a href="review_order.php"><span class="label label-success" style="font-size: 15px"><i>Order History</i></span></a></li> 
       <li class=" "><a href="log_out.php"> <b>Log Out</b> </a></li>
       
      </ul>
</nav>

            
            <div class="row" style="margin-top: 20px">
                
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
                       
                            foreach ($all_user_exam as $user_exam){
                                 $pay_info= get_payment_info_by_id($user_exam['total_payment']) ;
                                 $t_info= get_payment_info_by_id($user_exam['tran_key']) ;
                                 
                            ?>
                            <tr>
                                <input type="hidden" value="<?php echo $user_exam['id']; ?>" name="Payment_id" />
                                <td>Order: <?php echo $i; ?></td>
                                 <td><?php echo  $_SESSION['customer']['name']; ?></td>
                                <td> <?php echo $pay_info['amount']; ?></td>
                                <td> <?php echo $t_info['trun_id']; ?></td>
                                <td><?php echo $user_exam['date']; ?></td>
                                <td><?php if($user_exam['order_action']==0){ echo 'Pending';}else{echo 'Order Complete';} ?></td>
                                
                            </tr>
                            <?php $i++;} ?>
                        </table>
                        
                        <h1>new Order </h1>
                    </div>
                    
                </div>
        
            </div>
                
 
        </div>
       
            
       
        
        
    </body>
</html>
