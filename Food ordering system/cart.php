<?php
session_start();
global $total;
if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 
$_SESSION['total']=$total;
include './config.php';
include './function.php';
//$customer_id='1';
//update_cart_info($customer_id,$item_id,$item_quantity);

if(isset($_POST['item_id'])){
    $item_id=$_POST['item_id'];
    $item_check = check_user_item($item_id,$customer_id);
    //echo $item_check;
    if($item_check){
        if(isset($_REQUEST['qty'])){
            $item_qty=$_REQUEST['qty'];
        
       //$item_qty=$item_check['quantity']+1;
        $sql= update_cart($item_qty, $item_check['id']);
       // $sql= mysqli_query($connecton, "UPDATE cart SET quantity='".$item_qty."' WHERE id='".$item_check['id']."'");   
    }}
    else{
        $quantity='1';
        $sql= mysqli_query($connecton, "INSERT INTO cart (item_id,customer_id,quantity) VALUES('".$item_id."','".$customer_id."','".$quantity."')");   
    }
    
    
}

if(isset($_GET['delete'])){
    $cart_item_id = $_GET['delete'];
    $sql= mysqli_query($connecton, "DELETE FROM cart WHERE id='".$cart_item_id."'"); 
}

$cart= get_all_cart_items($customer_id);
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
            <div class="row">
                
                <div class="col-lg-12" style="margin-top: 20px">
                    <div class="panel panel-info ">
                    <div class="panel-heading bg-success text-center ">Cart Checkout</div>
                        <div class="panel-body">
                            
                           
                    <table class="table text-center" border-collapse>
                        <tr>
                            <td class="text-danger"><b>SL</b></td>
                            <td class="text-danger"><b>Item Name</b></td>
                             <td class="text-danger"><b>Item Image</b></td>
                             <td class="text-danger"><b>Quantity's</b></td>
                              <td class="text-danger"><b>Item Price</b></td>
                              <td class="text-danger"><b>Total price</b></td>
                              <td colspan="2" class="text-danger"><b>ACTION</b></td>
                        </tr>
                        <?php
                        $i=1;
                        $total=0;
                        foreach ($cart as $cart_item) {
                            $item_info = get_item_info_by_id($cart_item['item_id']);
                        ?>
                        <form action="" method="post" >
                         <tr>
                         <input type="hidden" value="<?php echo $item_info['id']; ?>" name="item_id"/>
                             <td><?php echo $i;  ?></td>
                             <td class="text-primary" ><b><?php echo $item_info['item_name']; ?></b></td>
                             <td class= "img"><?php echo "<img src='images/".$item_info['item_image']."' height=100px>"; ?></td>
                             <td>
                                 <input class="form-control"  type="text" name="qty" value="<?php echo $cart_item['quantity']; ?>" />
                             </td>
                             <td class="text-primary"><b><?php echo $item_info['item_price']; ?></b></td>
                             <td class="text-primary"><b><?php echo $cart_item['quantity']*$item_info['item_price']; ?></b></td>
                               
                              <td colspan=""><button class="btn btn-md btn-success" style="font-family: cursive">Update</button></td>
                              
                              <td><a class="btn btn-md btn-success" style="font-family: cursive" href="cart.php?delete=<?php echo $cart_item['id']; ?>">Delete</a></td>
                        </tr>
                        </form>
                    
                                                 
                        
                        <?php $i++;
                        $t =$cart_item['quantity']*$item_info['item_price'];
                        $total=$total+$t;
                        
                        
                        } ?>
                        <tr>
                            <td colspan="8" class="text-right">Total Amount:<?php echo $total;?></td>
                            <?php echo $_SESSION['total']=$total;?>
                            
                        </tr>
                        
                    </table>
                            <?php $sql= mysqli_query($connecton, "INSERT INTO total_amount (total_amount) VALUES('".$total."')");?>
                            <a href="check_out.php"><h1 class="text-right text-danger" style="font-family: cursive">Check Out</h1></a>
                            
                        </div>
                    <div class="panel-footer">
                      <?php echo $customer_id; ?>
                    </div>
                    
                    </div>
                   
                </div>

            </div>
     
        </div>

    </body>
  
</html>

<?php }
 else {
 header('Location:index.php');      
 }
    



?>