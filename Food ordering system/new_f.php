<?php  
include './function.php';
    if(isset($_POST["class_id"])){
    $dept_id =$_POST["class_id"];
    $det_std_list= get_area_by_id($dept_id);
    ?>    
   <div class="panel panel-body" style=" margin-top: 5px;color:#204d74 ">
       <div class="panel-heading"> <p class="text-center btn-md " style="font-size: 25px; color:#3071a9 ; font-family: monospace">Select Area</p></div>
       <?php
    foreach ($det_std_list as $det_stdd)
    {
    ?>
       <div class="col-md-3 text-center " style="margin-top:15px;font-size: 20px;font-family: monospace ;">
       
           <a href="restaurant_list.php?area_id=<?php echo $det_stdd['id']; ?>"><b style="">   <?php echo $det_stdd['area_name']; ?> </b> </a>
                
                        </div>
       

        <?php } } 
      

?>