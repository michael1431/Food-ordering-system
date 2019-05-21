<?php
session_start();
include './function.php';
if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 
          
	
        
?>

<!DOCTYPE html>


<html lang="en">
    
<head>
  <title>Team Wildcards Restaurant</title>
  <meta charset="utf-8">
  <style>
      input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    
    select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
}
      
  </style>
        
        <link rel="stylesheet" href="css/bootstrap.css"/> 
        <link rel="stylesheet" href="css/font-awesome.css"/> 
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


<script>
            function getDeptStdd(val){
                    $.ajax({
                    type: "POST",
                    url: "new_f.php",
                    data:'class_id='+val,
                    success: function(data){
                            $("#get_sub").html(data);
                    }
                    });
            }
        </script>

</head>
<body class="bg-success">
    <div class="container">
    
                <nav class="navbar navbar-inverse ">
         <ul class="nav navbar-nav navbar-left">
             <li class="active btn-primary"><a href="homepage.php" style="font-family:cursive"><span class=""></span><b style="padding: 5px;font-size: 30px;color: blue" class=""><i>Online Food Order <sub style="font-family: cursive;font-size: 10px">Team Wildcards</sub></i></b><span class="sr-only">(current)</span></a></li>
         </ul>
        
      <ul class="nav navbar-nav ">
          <li class="active btn-primary"><a href="#" style="font-family: monospace"><span class="fa fa-home"></span><b style="padding: 5px">Home </b><span class="sr-only">(current)</span></a></li>
          <li class=" "><a href="about_us" style="font-family: monospace"><span class="fa fa-book"></span><b  style="padding: 5px">About Us </b></a></li>
        
          <li class=" "><a href="#contact" style="font-family: monospace"><span class="fa fa-comment"></span><b style="padding:5px">Contact Us </b></a></li>
        <li><a href="review_order.php"><span class="label label-success" style="font-size: 15px"><i>Order History</i></span></a></li> 
       <li class=" "><a href="log_out.php"> <b>Log Out</b> </a></li>
       
      </ul>
</nav>
            
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="row">
            
            
                <div class=" col-md-12">
                <p class="text-danger text-center" style="font-family: initial;font-size: 25px">Actions</p>
               
                <select class="" style="color: #ff0033;font-family: cursive;font-size: 20px;width: 100%;padding: 16px 20px;border: none;border-radius: 4px;background-color: #f1f1f1;"   name="exam" required="" onChange="getDeptStdd(this.value);">
                                           <option value="">Select City</option>

                                     <?php
                             $all_exam = get_all_city();

                              foreach($all_exam as $exam){ ?>
                                <option value="<?php echo $exam['id']; ?>"><?php echo $exam['select_city']; ?></option>
                                                                                                    
                              <?php } ?>

                </select>
                    
        
            </div> 
            
              <div class="col-md-12">
                <div id="get_sub"></div>
        </div>
            
            
                
            </div>
            </div>
        </div>
        
        <hr class="btn-warning">
           
       
     <div class="panel panel-info">
                <div class="panel-heading"> <p class="text-center text-info " style="font-size: 25px; font-family:initial">Discount Rate Damn High</p></div>
                <div class="panel-body">
        <div class="row" style="margin-top: 15px">
            
           
                    <?php                
                $all_cat = get_all_cat();
                
         foreach ($all_cat as $category){   
             $res= get_res_by_id($category['restaurant_name'])
         ?> 
    
    
            <div class="col-md-3 center-block">
                 <div class="panel panel-info">
                     <div class="panel-heading text-center text-warning" style="">
                         <span class="text-warning" style="font-family: initial"><?php echo $res['r_name']." | Chittagong"; ?> </span>
                         
                     </div>
                        <div class="panel-body " style="margin-left: 15px " >
                            <?php   echo "<img src='images/".$category['image']."' style=' height:150px;' >"; ?>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="items.php?category_id=<?php echo $category['id']; ?>"><b style="">   <?php echo $category['cat_name']; ?> </b> </a>
                    
                        </div>                        
                    </div>          
                
                
            </div>
             <?php } ?>
                </div>
                <div class="panel-footer"></div>
               
       
            
            </div>
           
        </div>
        
        <hr class="btn-warning">
    <section id="contact">
        <div class="row">
        
        <div class="col-lg-12">
            <span  style="font-family: fantasy;font-size: 35px;border: 1px solid; padding: 3px;margin-left: " class="text-danger">  <b>Contact Us</b></span>
        </div>
        <div class="col-lg-3 " style="margin-top:15px;margin-left:px">
            <input type="text" name="name" placeholder="Name" class="form-control"> <br>
             <input type="text" name="name" placeholder="Email" class="form-control"> <br><br/>
             <button class="btn btn-default btn-lg btn-danger">Send Message</button>
        </div>
        
        <div class="col-lg-3"style="margin-top:15px;margin-left: 130px">
            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
            
            
        </div>
 
    </div>    
    </section>
  
    <hr class="btn-warning">
       
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