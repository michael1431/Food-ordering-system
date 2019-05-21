<?php
session_start();
include './function.php';
if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 
if(isset($_GET['area_id']))
{
    $cat_id= $_GET['area_id'];
  
    $items= get_restaurant_by_id($cat_id);
    
  
    //echo $cat_id;
    
   // $sql = "SELECT * FROM items WHERE cat_id =   '".$cat_id."'   ";
}

?>


<html>
    <head>
        <title>Team Wildcard Home</title>
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
        
        <li class=" "><a href="#contact" style="font-family: monospace"><b>Contact Us </b></a></li>
        <li><a href="review_order.php"><span class="label label-success" style="font-size: 15px"><i>Order History</i></span></a></li> 
       <li class=" "><a href="log_out.php"> <b>Log Out</b> </a></li>
       
      </ul>
</nav>
            <div class="row">
                <div class="col-md-8">
                    <img src="images/PVC-main-banner.png">
                </div>
            </div>
            
            <div class="row" style="margin-right: 30px">
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center" style="font-size: 20px">Category</div>
                          <?php                
                $all_cat = get_all_cat();
         foreach ($all_cat as $category){       
         ?> 
                 
                        <div class="panel-body">
                              <a href="items.php?category_id=<?php echo $category['id']; ?>"><b style="">   <?php echo $category['cat_name']; ?> </b> </a>
                            
                        </div> 
                                               
                            
                
                
            
             <?php } ?>
                        
                    </div>
                  
                </div>
                
                <div class="col-md-8">
                     <?php                
                      

                   //echo time();
                    $my_time=15191571600000000;
                       if($my_time> time()){
                        ?> 
                 
                    <div class="panel panel-info">
                        <div class="panel-heading text-center" style="font-family: monospace;font-size: 20px">Open</div>
                        <div class="panel-body">
                           <?php
             
         foreach ($items as $itms){
             
         ?>
                <div class="col-md-12 text-success"  >
                    
                    
                    <div class="panel " style="background-color: beige">
                        
                    <div class="panel-body " style="">
                        <div class="col-sm-8" >
                            <span class="" style="font-family: monospace;color: black;font-size: 20px;" >
                                <img src="images/Capture.PNG" height="20px">
                            </span>
                            <span class="" style="font-family: monospace;color: #cd0a0a;font-size: 20px;margin-left: 10px" >
                                <?php   echo $itms['r_name']; ?>
                                <div class="">
                                    <span class="" style="font-family: monospace;color: #101010;font-size: 15px;margin-left: 147px" >
                                        Delivery Time : <span style="color: #0033ff;font-style: italic"><?php   echo $itms['delivery_time']; ?></span>
                            </span>
                                    
                                </div>
                                <div class="">
                                    <span class="" style="font-family: monospace;color: #101010;font-size: 15px;margin-left: 147px" >
                                        Delivery Fee : <span style="color: #cc0066;font-style: italic"><?php   echo $itms['delivery_fee']; ?></span>
                            </span>
                                    
                                </div>
                            </span>
                            
                        </div>
                        
                        
                        <div class="col-md-2" style="margin-left:70px">
                            <span class="" style="font-family: inherit;color: #cd0a0a;font-size: 15px;" >
                                <a href="manu_card.php?restu_id=<?php echo $itms['id'] ?>" class="btn btn-md btn-primary btn-right">See Menu Card</a>
                            </span>
                        </div>
                        
                        
                    </div>
                        
                        
                        </div>                 
                </div>
        
         <?php } ?>
                            
                        </div>
                    
                    
                    </div>
                                               
                            
                
                
            
             <?php }
 else {
     echo' <div class="panel-heading"> <p class="text-center btn-md " style="font-size: 20px; color:red; font-family: cursive">All Restaurant Closed</p></div>';
 }
             ?>
                    
                </div>
                
              </div>    
              <footer>    
    <div class="row">
        <div class="col-lg-12">
            <p><span class="text-left text-primary " style="font-family: cursive"> &copy All Right Reserve 2018, Team Wildcards</span></p>           
        </div>
    </div>
    </footer>  
       </div>
    </body>
    
    
</html>
     <?php }
 else {
 header('Location:index.php');      
 }

?>