<?php
session_start();

$message="";
if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 

?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css"/>
    </head>
    
    <body>
        <div class="container">
               <div class="row" style="margin-top: 80px">
        
        <section id="story" class="description_content">
            <div class="text-content container">
                <div class="col-md-6">

                    <span  style="font-family: fantasy;font-size: 45px;border: 1px solid;padding: 3px;" class="text-danger">  <b>About Us</b></span> 
                    <p class="desc-text" style="font-family: cursive;font-size: 30px;color: #122b40">Good food, and good service. Simple is the name of the game, and we’re good at finding it in all the right places, even in your dining experience. We’re a small group from Chittagong. Come join us.</p>
                </div>
                <div class="col-md-6">
                    <div class="img-section" style="margin:5px;">
                       <img src="images/kabob.jpg" width="250" height="220">
                       <img src="images/limes.jpg" width="250" height="220">
                       
                       <img style="margin-top: 5px" src="images/radish.jpg"  width="250" height="220">
                       <img style="margin-top: 5px" src="images/corn.jpg"  width="250" height="220">
                   </div>
                </div>
            </div>
        </section>
        
    </div>
            
        </div>
        
    </body>
    
</html>

     <?php }
 else {
 header('Location:index.php');      
 }

?>