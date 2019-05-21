<?php
include './function.php';

session_start();


if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 




if(isset($_GET['restu_id']))
{
    $cat_id= $_GET['restu_id'];
  
    $items= get_item_by_restaur_id($cat_id);
    
  
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

    <style>
* {
    box-sizing: border-box;
}

.zoom {
    transition: transform .2s;
}

.zoom:hover {
    transform: scale(2.0); 
    padding: 50px
}
</style>
    
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
            
            <div class="row"  style="margin-right: 20px">
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center" style="font-size: 20px">Special Items</div>
                          <?php                
                $all_cat = get_all_items();
         foreach ($all_cat as $category){       
         ?> 
                 
                        <div class="panel-body">
                              <a href="#"><b style="">   <?php echo $category['item_name']; ?> </b> </a>
                            
                        </div> 
                                               
                            
                
                
            
             <?php } ?>
                        
                    </div>
                  
                </div>
                
                <div class="col-md-8">
                                    
                      

                  
                   
                       
                 
                    <div class="panel panel-info">
                        <div class="panel-heading ">
                            <span class=" text-center" style="font-family: monospace;font-size: 20px;margin-left: 60px">Name</span>
                            <span class=" text-center" style="font-family: monospace;font-size: 20px;margin-left: 170px">Price</span>
                            <span class=" text-center" style="font-family: monospace;font-size: 20px;margin-left: 170px">Action</span>
                        </div>
                        
                        
                        <div class="panel-body">
                           <?php
             
         foreach ($items as $itms){
             
         ?>
                <div class="col-md-12 text-success"  >
                    
                    
                    <div class="panel " style="background-color: beige">
                        
                    <div class="panel-body " style="">
                        <div class="col-sm-4" >
                            
                            <span   style="font-family: monospace;color: #cd0a0a;font-size: 15px;" >
                                <div  class="zoom"> <?php   echo "<img src='images/".$itms['item_image']."' style=' height:50px;' >"; ?> </div>
                                <div class=""  style="margin-left:"><?php   echo $itms['item_name']; ?></div>
                            </span>
                            
                            </div>
                        
                        <div class="col-sm-4">
                            <span class="" style="font-family: monospace;color: #cd0a0a;font-size: 15px;margin-left: 9px" >
                                <?php   echo $itms['item_price'].' Tk'; ?>
                            </span>
                        </div>
                        
                        <div class="col-sm-4">
                            <span class="" style="font-family: monospace;color: #cd0a0a;font-size: 15px; margin-left: 25px" >
                            <form action="cart.php" method="post">
                     <input type="hidden" value="<?php echo $itms['id']; ?> " name="item_id"/>
                     <input type="submit" class="btn btn-md btn-primary " style="margin-left: 25px" value="Add To Cart"/>
                 </form>
                            </span>
                        </div>
                        
                        
                    </div>
                        
                        
                        </div>                 
                </div>
        
         <?php } ?>
                            
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