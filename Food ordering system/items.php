<?php

session_start();
if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 
include './function.php';

$message="";
if(isset($_GET['category_id']))
{
    $cat_id= $_GET['category_id'];
  
    $items= get_item_by_id($cat_id);
    $tk="Tk";
  
    //echo $cat_id;
    
   // $sql = "SELECT * FROM items WHERE cat_id =   '".$cat_id."'   ";
}


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
                
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        
                         <div class="panel panel-info">
                <div class="panel-heading"> <p class="text-center btn-md " style="font-size: 20px; color:red; font-family: cursive">Items</p></div>
                <div class="panel-body">
                <?php
             
         foreach ($items as $itms){
             $x=$itms['id'];
         ?>
                <div class="col-md-12 text-success" style="margin-top:15px; ">
                    
                    
                    <div class="panel panel-info">
                        <div class=" panel-heading ">  <b><i><?php echo $itms['item_name']; ?></i></b></div>
                    <div class="panel-body  img-" style="margin-left: 25px">
                        <div class="col-sm-6 img-responsive">
                         <?php   echo "<img src='images/".$itms['item_image']."' style=' height:120px;'>"; ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" style="margin-left: 10px">
                                
                                            <form class="">
                                                <textarea name="" class="text-warning " style="color: " rows="3" cols="60" readonly="" >
                                           <?php 
                                           $i=1;
                                            $show_review= get_item_review_by_id($itms['id']);
                                            foreach ($show_review as $itms_rev) {?>

                                                <?php echo 'Review '.$i.' :'.$itms_rev['review'];?>

                                                 <?php
                                                 $i++;}?>
                                            </textarea>  
        
                                            </form>
                            </div>
                            <div class="col-sm-4" style="margin-top:20px ">
                            
                             <form action="" method="post">
                                <div class="col-sm-10">                                   
                                <textarea class="form-control" rows="2" cols="5" name="message" placeholder="ITEM REVIEW . . ." ></textarea><br/>
                                </div>
                                <div class="col-sm-2">  
                                    <input type="hidden" value="<?php echo $itms['id']; ?> " name="item_id"/>
                                    <input type="submit" value="Send" name="submit" class="btn btn-sm btn-success" style="font-family: cursive;margin-left: -15px" />                  
                                </div>
                             </form> 
                            </div>
                        </div>
                        
                    </div>
                        <div class="panel-footer"> 
                           
                            <div class="row">
                                <div class="col-sm-2">
                                    <span style="margin-left:"><b><i><?php echo $tk.":". $itms['item_price'] ; ?></i></b></span>   
                                </div>
                                <div class="col-sm-2">
                                    <form action="cart.php" method="post">
                     <input type="hidden" value="<?php echo $itms['id']; ?> " name="item_id"/>
                     <input type="submit" class="btn btn-sm btn-primary " style="margin-left: -80px;font-family: initial" value="Add To Cart"/>
                                   </form>
                                    
                                </div>
                            </div>          
                    <b class="btn-danger"> <?php echo $customer_id; ?>= Description:</b>   <i><span class="text-justify" style="font-family:monospace;color: black"><?php echo $itms['item_description']; ?></span></i>
                        </div>
                        
                        </div>                 
                </div>
        
         <?php } 
         
         
     if(isset($_POST['submit'])){
         $itm_id=$_POST['item_id'];
         $submit=$_POST['submit'];
          $message=$_POST['message'];
        $review= insert_item_review($itm_id,$message);}
         
         ?>
                    
                    
                    </div>
                <div class="panel-footer"></div>
               
       
            
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





