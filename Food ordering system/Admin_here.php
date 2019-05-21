<?php
session_start();
global $total;
if(isset($_SESSION['admin'])){
include './function.php';

    $m1="";
$m2="";
$m3="";
$m4="";
$m5="";
if(isset($_GET['cat_id'])){
    $cart_item_id = $_GET['cat_id'];
    $sql= mysqli_query($connecton, "DELETE FROM category WHERE id='".$cart_item_id."'"); 

    if($sql){
        $m1="Successfully Deleted";
        
    }
    else {
        $m1=" demage";
    }
    
}

if(isset($_GET['item_id'])){
    $cart_item_id = $_GET['item_id'];
    $sql= mysqli_query($connecton, "DELETE FROM items WHERE id='".$cart_item_id."'"); 

    if($sql){
        $m2="Successfully Deleted";
        
    }
    else {
        $m2=" demage";
    }
}


if(isset($_GET['res_id'])){
    $cart_item_id = $_GET['res_id'];
    $sql= mysqli_query($connecton, "DELETE FROM restaurant WHERE id='".$cart_item_id."'"); 

    if($sql){
        $m3="Successfully Deleted";
        
    }
    else {
        $m3=" demage";
    }
    
}

if(isset($_GET['city_id'])){
    $cart_item_id = $_GET['city_id'];
    $sql= mysqli_query($connecton, "DELETE FROM city WHERE id='".$cart_item_id."'"); 

    if($sql){
        $m4="Successfully Deleted";
        
    }
    else {
        $m4=" demage";
    }
    
}

if(isset($_GET['area_id'])){
    $cart_item_id = $_GET['area_id'];
    $sql= mysqli_query($connecton, "DELETE FROM area WHERE id='".$cart_item_id."'"); 

    if($sql){
        $m5="Successfully Deleted";
        
    }
    else {
        $m5=" demage";
    }
    
}

$db = mysqli_connect("localhost", "root", "", "project");
	$msg = "";
        $msg1 = "";
        $msg2 = "";
        $msg3="";
        $msg4="";

	if (isset($_POST['upload'])) {
		$target = "images/".basename($_FILES['image']['name']);


		$image = $_FILES['image']['name'];
		$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
                $image_text1 = mysqli_real_escape_string($db, $_POST['sess']);
               

		$sql = "INSERT INTO category (image,restaurant_name, cat_name) VALUES ('$image','$image_text1', '$image_text')";
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Category uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}
        
        if (isset($_POST['uploadd'])) {
		$target = "images/".basename($_FILES['image']['name']);


		$image = $_FILES['image']['name'];
		$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
                $image_text1 = mysqli_real_escape_string($db, $_POST['image_text1']);
                $image_text2 = mysqli_real_escape_string($db, $_POST['image_text2']);
                $image_text3 = mysqli_real_escape_string($db, $_POST['image_text3']);
                $image_text4 = mysqli_real_escape_string($db, $_POST['sess']);


		$sql = "INSERT INTO items (cat_id,item_name,item_image,item_price,item_description,restaurant) VALUES ('$image_text1','$image_text','$image','$image_text2','$image_text3','$image_text4')";
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg1 = "Item uploaded successfully";
		}else{
			$msg1 = "Failed to upload image";
		}
	}
        
        
        
        if(isset($_REQUEST['res_name']) ){
    $std_name=$_REQUEST['res_name'];
    $std_id=$_REQUEST['time'];
    $std_email=$_REQUEST['fee'];
    $std_pass=$_REQUEST['sess'];
    $student_password=$_REQUEST['sub'];
    
  
    
    $student_reg= std_reg($std_name, $std_id, $std_email, $std_pass);
    
    if($student_reg){
        $msg2="Insert Success";
        
    }
    else {
        $msg2=" demage";
    }
 
}


if(isset($_REQUEST['city_name']) ){
    $std_name=$_REQUEST['city_name'];
    $student_password=$_REQUEST['sub'];
    
  
    
    $add_city= add_city($std_name);
    
    if($add_city){
        $msg3="Insert Success";
        
    }
    else {
        $msg3=" demage";
    }
 
}


if(isset($_REQUEST['area_name']) ){
    $std_name=$_REQUEST['area_name'];
    $student_password=$_REQUEST['sub'];
    $std_pass=$_REQUEST['sess'];
  
    
    $add_area= add_area($std_name,$std_pass);
    
    if($add_area){
        $msg4="Insert Success";
        
    }
    else {
        $msg4=" demage";
    }
 
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
<style>
            th,td{
                padding: 10px;
            }
            
        </style>

    
    
    </head>
    
    
    <body style="background-color: #ececec">
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col-md-12 text-center">
                    <h1 class="text-warning" style="font-family: initial"> Admin Panel</h1>
                    
                    <a href="admin_logout.php">  <sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">Log OUT</sapn></a><br/><br/>
                    <a href="homepage.php">  <sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">Check Web Panel</sapn></a><br/><br/>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">Select Option</div>
                        <div class="panel-body text-center">
                            <a href="#city1">  <sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">Add City</sapn></a><br/><br/>
                            <a href="#area1"><sapn class="label label-success" style="font-family: initial;font-size: 20px;color: white">Add Area</span></a><br/><br/> 
                            <a href="#cat1"><sapn class="label label-warning" style="font-family: initial;font-size: 20px;color: white">Add Category</span></a><br/><br/> 
                            <a href="#item1"><sapn class="label label-primary" style="font-family: initial;font-size: 20px;color:white">Add Items</span></a><br/><br/>
                            <a href="#res1"><sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">Add Restaurant Name</span></a><br/> 
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">Select Option</div>
                        <div class="panel-body text-center">
                            <a href="#city">  <sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">City List</sapn></a><br/><br/>
                            <a href="#area"><sapn class="label label-success" style="font-family: initial;font-size: 20px;color: white">Area List</span></a><br/><br/> 
                            <a href="#cat"><sapn class="label label-warning" style="font-family: initial;font-size: 20px;color: white">Category List</span></a><br/><br/> 
                            <a href="#item"><sapn class="label label-primary" style="font-family: initial;font-size: 20px;color:white">Items List</span></a><br/><br/>
                            <a href="#res"><sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">Restaurant Name List</span></a><br/> 
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info" style="margin-right: 50px">
                        <div class="panel-heading text-center">Action</div>
                        <div class="panel-body text-center">
                    <a href="order_submit.php"><sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white"> Order List (For Confirm)</span></a><br/>  
                        </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info" style="margin-right: 50px">
                        <div class="panel-heading text-center">Action</div>
                        <div class="panel-body text-center">
                            <a href="customer_list.php"><sapn class="label label-primary" style="font-family: initial;font-size: 20px;color: white">Total Customer List</span></a><br/>  
                        </div>
                        </div>
                </div>
            </div>

            <div class="row" id="cat" style="margin-right: 50px">
                <div class="col-lg-12">
                        <div class="col-md-12 text-center">

                </div>

                    <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="text-warning text-center " style="font-family: initial">Category List</h3></div>
                        <table class="table" style="text-align: center">
                            <tr >
                                 <th class="text-center">Serial No</th>
                                 <th class="text-center">All Category </th>
                                 <th colspan="" class="text-center">Action </th>
                            </tr>
                            <?php
                              if ($m1) {
                                  echo "<h1>".$m1."</h1>";
                                  
                              }
                            ?> 
        <?php 
        
       
          $all_students = get_all_cat();
                         
          
   
     $i=1;  
    foreach ($all_students as $students){
       
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td><?php echo $students['cat_name']; ?> </td>
            <td><a href="Admin_here.php?cat_id=<?php echo $students['id']; ?>"> <input type="submit" value="Delete"></a></td>

        </tr>
    <?php 
    $i++;}
  
    
    ?>
                        </table>
                        
                       
                    </div>
                    
                </div>
                </div>
                </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                
                    <div class="row" style="margin-right: 50px">
                <div class="col-lg-12">
                        <div class="col-md-12 text-center">

                </div>

                    <div class="col-lg-12" id="item">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="text-warning text-center " style="font-family: initial">Total Item List</h3></div>
                        <table class="table" style="text-align: center">
                            <tr >
                                 <th class="text-center">Serial No</th>
                                 <th class="text-center">All Items </th>
                                 <th colspan="" class="text-center">Action </th>
                            </tr>
                            <?php
                              if ($m2) {
                                  echo "<h1>".$m2."</h1>";
                                  
                              }
                            ?>
                                <?php 
       
                                $all_students = get_all_items();
    
                                $i=1;  
                               foreach ($all_students as $students){

                                   ?>

                                   <tr>
                                       <td><?php echo $i;?>.</td>
                                       <td><?php echo $students['item_name']; ?> </td>
                                       <td><a href="Admin_here.php?item_id=<?php echo $students['id']; ?>"> <input type="submit" value="Delete"></a></td>

                                   </tr>
                               <?php 
                               $i++;}?>
                        </table>
                        
                       
                    </div>
                    
                </div>
                </div>
                </div>
            
           
                
                
                <div class="row" style="margin-right: 50px">
                <div class="col-lg-12">
                        <div class="col-md-12 text-center">

                </div>

                    <div class="col-lg-12" id="res">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="text-warning text-center " style="font-family: initial">Total Restaurant List</h3></div>
                        <table class="table" style="text-align: center">
                            <tr >
                                 <th class="text-center">Serial No</th>
                                 <th class="text-center">All Restaurant Name </th>
                                 <th colspan="" class="text-center">Action </th>
                                 
                            </tr>
                                  <?php
                              if ($m3) {
                                  echo "<h1>".$m3."</h1>";
                                  
                              }
                            ?>
        <?php 
       
          $all_students = get_all_res();
                         
          
   
     $i=1;  
    foreach ($all_students as $students){
       
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td><?php echo $students['r_name']; ?> </td>
            <td><a href="Admin_here.php?res_id=<?php echo $students['id']; ?>"> <input type="submit" value="Delete"></a></td>

        </tr>
    <?php 
    $i++;}
  
    
    ?>
                        </table>
                        
                       
                    </div>
                    
                </div>
                </div>
                </div>
                
                
                
                
            
            
            <div class="row" id="city" style="margin-right: 50px">
                <div class="col-lg-12">
                        <div class="col-md-12 text-center">

                </div>

                    <div  class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="text-warning text-center " style="font-family: initial">Total City (We Serve)</h3></div>
                        <table class="table" style="text-align: center">
                            <tr >
                                 <th class="text-center">Serial No</th>
                                 <th class="text-center">Cities </th>
                                 <th colspan="" class="text-center">Action </th>
                            </tr>
                            <?php
                              if ($m4) {
                                  echo "<h1>".$m4."</h1>";
                                  
                              }
                            ?>
        <?php 
       
          $all_students = get_all_city();
                         
          
   
     $i=1;  
    foreach ($all_students as $students){
       
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td><?php echo $students['select_city']; ?> </td>
            <td><a href="Admin_here.php?city_id=<?php echo $students['id']; ?>"> <input type="submit" value="Delete"></a></td>

        </tr>
    <?php 
    $i++;}
  
    
    ?>
                        </table>
                        
                       
                    </div>
                    
                </div>
                </div>
                </div>
            
            
            
            <div class="row" style="margin-right: 50px">
                <div class="col-lg-12">
                        <div class="col-md-12 text-center">

                </div>

                    <div class="col-lg-12" id="area">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="text-warning text-center " style="font-family: initial">Total Area (We Serve)</h3></div>
                        <table class="table" style="text-align: center">
                            <tr >
                                 <th class="text-center">Serial No</th>
                                 <th class="text-center">Area</th>
                                 <th colspan="" class="text-center">Action </th>
                            </tr>
                            <?php
                              if ($m5) {
                                  echo "<h1>".$m5."</h1>";
                                  
                              }
                            ?>
        <?php 
       
          $all_students = area();
                         
          
   
     $i=1;  
    foreach ($all_students as $students){
       
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td><?php echo $students['area_name']; ?> </td>
            <td><a href="Admin_here.php?area_id=<?php echo $students['id']; ?>"> <input type="submit" value="Delete"></a></td>

        </tr>
    <?php 
    $i++;}
  
    
    ?>
                        </table>
                        
                       
                    </div>
                    
                </div>
                </div>
                </div>
            
            
              
            <div class="row"style="margin-right: 50px">
                
                <div class="col-lg-12 " style="margin-top:10px " id="cat1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2><span style="font-family: initial"> <b class="text-success">Category Include</b></span></h2>                           
                        </div>
                        <div class="panel-body">
                            
                             <?php
                              if ($msg) {
                                  echo "<h1>".$msg."</h1>";
                                  
                              }
                            ?>
                            
                          <form method="POST" action="" enctype="multipart/form-data">
                                
                                        
                    <table>
                        <caption class="text-center btn-lg " style="font-size: 20px; color:red; font-family: cursive">
                            <i><b></b></i>
               
                        </caption>
                      
                        <thead>                          
                        </thead>
                         
                        <tbody>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Category Name:</b>
                                </td>
                                <td><input type="text" cols="20" rows="4" name="image_text" placeholder="" class="form-control"/></td>
                            </tr>
                            
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                               <b> Category Snap:</b>
                                </td>
                                <td><input type="file" name="image"></td>
                            </tr>
                            
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Restaurant Name:</b>
                                </td>
                                <td>
                                    <select class="form-control" name="sess" required=""> 
                                        <option value="">Put Restaurant Name</option>
                                             <?php
                            $all_sess = get_all_res();
                            foreach($all_sess as $sess){ ?>
                            <option value="<?php echo $sess['id']; ?>"><?php echo $sess['r_name']; ?></option>
                            <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            
                            
                     
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" name="upload">POST</button></td>
                                
                            </tr>
                        </tfoot>
                        
                        
                        
                    </table>
                                
                                
                            </form>
                            
                            
                            
                        </div>
  
            </div>
            
        </div>
                
                
            </div>
                    <div class="row" style="margin-right: 50px">
                        <div class="col-lg-12 " style="margin-top:15px " id="item1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2><span style="font-family: initial"> <b class="text-success">Item Include</b></span></h2>                           
                        </div>
                        <div class="panel-body">
                            
                             <?php
                              if ($msg1) {
                                  echo "<h1>".$msg1."</h1>";
                                  
                              }
                            ?>
                            
                          <form method="POST" action="" enctype="multipart/form-data">
                                
                                        
                    <table>
                        <caption class="text-center btn-lg " style="font-size: 20px; color:red; font-family: cursive">
                            <i><b></b></i>
               
                        </caption>
                      
                        <thead>                          
                        </thead>
                         
                        <tbody>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Item Name:</b>
                                </td>
                                <td><input type="text" cols="20" rows="4" name="image_text" placeholder="" class="form-control"/></td>
                            </tr>
                            
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Item Category:</b>
                                </td>
                                <td>
                                    <select class="form-control" name="image_text1" required=""> 
                                        <option class="text-primary" style="font-family:cursive;font-size: 15px" value="">Select Category</option>
                                              <?php
                            $all_sem = get_all_sem();
                            foreach($all_sem as $sem){ ?>
                            <option value="<?php echo $sem['id']; ?>"><?php echo $sem['cat_name']; ?></option>
                            <?php } ?>
                                    </select>
                                    
                                </td>
                            </tr>
                            
                             <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Item Price:</b>
                                </td>
                                <td><input type="text" cols="20" rows="4" name="image_text2" placeholder="" class="form-control"/></td>
                            </tr>
                            
                             <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Item Description:</b>
                                </td>
                                <td><textarea id="text" cols="20" rows="4" name="image_text3" placeholder="" class="form-control" ></textarea></td>
                            </tr>
                            
                            
                            
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                               <b> Item Snap:</b>
                                </td>
                                <td><input type="file" name="image"></td>
                            </tr>
                            
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Restaurant Name:</b>
                                </td>
                                <td>
                                    <select class="form-control" name="sess" required=""> 
                                        <option value="">Put Restaurant Name</option>
                                             <?php
                            $all_sess = get_all_res();
                            foreach($all_sess as $sess){ ?>
                            <option value="<?php echo $sess['id']; ?>"><?php echo $sess['r_name']; ?></option>
                            <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" name="uploadd">POST</button></td>
                                
                            </tr>
                        </tfoot>
                        
                        
                        
                    </table>
                                
                                
                            </form>
                            
                            
                            
                        </div>
                        <!--<div class="panel-footer"></div>-->
 
            </div>
            
        </div>
           </div>
            
            
            <div class="row" style="margin-right: 50px">
                <div class="col-lg-12 " style="margin-top:10px "id="res1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2><span style="font-family: initial"> <b class="text-success">Restaurant Include</b></span></h2>                           
                        </div>
                        <div class="panel-body">
                            
                             <?php
                              if ($msg2) {
                                  echo "<h1>".$msg2."</h1>";
                                  
                              }
                            ?>
                            
                          <form method="POST" action="" enctype="multipart/form-data">
                                
                                        
                    <table>
                        <caption class="text-center btn-lg " style="font-size: 20px; color:red; font-family: cursive">
                            <i><b></b></i>
               
                        </caption>
                      
                        <thead>                          
                        </thead>
                         
                        <tbody>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Restaurant Name:</b>
                                </td>
                                <td><input type="text" cols="20" rows="4" name="res_name" placeholder="" class="form-control"/></td>
                            </tr>
                            
                            
                            
                             <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Delivery Time:</b>
                                </td>
                                <td><input type="text" cols="20" rows="4" name="time" placeholder="" class="form-control"/></td>
                            </tr>
                            
                             <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Delivery Fee:</b>
                                </td>
                                <td><input type="text" name="fee" placeholder="" class="form-control" /></td>
                            </tr>
                           
                            
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Area Name:</b>
                                </td>
                                <td>
                                    <select class="form-control" name="sess" required=""> 
                                        <option value="">Select Area</option>
                                             <?php
                            $all_sess = area();
                            foreach($all_sess as $sess){ ?>
                            <option value="<?php echo $sess['id']; ?>"><?php echo $sess['area_name']; ?></option>
                            <?php } ?>
                                    </select>
                                </td>
                            </tr>
                     
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" name="sub">POST</button></td>
                                
                            </tr>
                        </tfoot>
                        
                        
                        
                    </table>
                                
                                
                            </form>
                            
                            
                            
                        </div>
            </div>
            
        </div>
            </div>
                   
                    
                    <div class="row" style="margin-right: 50px">
                        
                <div class="col-lg-12 " style="margin-top:10px "id="city1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2><span style="font-family: initial"> <b class="text-success">City Include</b></span></h2>                           
                        </div>
                        <div class="panel-body">
                            
                             <?php
                              if ($msg3) {
                                  echo "<h1>".$msg3."</h1>";
                                  
                              }
                            ?>
                            
                          <form method="POST" action="" enctype="multipart/form-data">
                                
                                        
                    <table>
                        <caption class="text-center btn-lg " style="font-size: 20px; color:red; font-family: cursive">
                            <i><b></b></i>
               
                        </caption>
                      
                        <thead>                          
                        </thead>
                         
                        <tbody>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>City Name:</b>
                                </td>
                                <td><input type="text"  name="city_name" placeholder="" class="form-control"/></td>
                            </tr>
                    
                     
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" name="sub">POST</button></td>   
                            </tr>
                        </tfoot>   
                    </table>             
                            </form> 
                        </div>
                        <!--<div class="panel-footer"></div>-->
                
            </div>
            
        </div>
            </div>
                        <div class="row" style="margin-right: 50px">
                            <div class="col-lg-12 " style="margin-top:10px "id="area1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2><span style="font-family: initial"> <b class="text-success">Area Include</b></span></h2>                           
                        </div>
                        <div class="panel-body">
                            
                             <?php
                              if ($msg4) {
                                  echo "<h1>".$msg4."</h1>";
                                  
                              }
                            ?>
                            
                          <form method="POST" action="" enctype="multipart/form-data">
                                
                                        
                    <table>
                        <caption class="text-center btn-lg " style="font-size: 20px; color:red; font-family: cursive">
                            <i><b></b></i>
               
                        </caption>
                      
                        <thead>                          
                        </thead>
                         
                        <tbody>
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>Area Name:</b>
                                </td>
                                <td><input type="text" name="area_name" placeholder="" class="form-control"/></td>
                            </tr>
   
                            <tr>
                                <td class="text-primary" style="font-family:cursive;font-size: 15px">
                                    <b>City Name:</b>
                                </td>
                                <td>
                                    <select class="form-control" name="sess" required=""> 
                                        <option value="">Select Area</option>
                                             <?php
                            $all_sess = get_all_city();
                            foreach($all_sess as $sess){ ?>
                            <option value="<?php echo $sess['id']; ?>"><?php echo $sess['select_city']; ?></option>
                            <?php } ?>
                                    </select>
                                </td>
                            </tr>
                     
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><button type="submit" name="sub">POST</button></td>
                                
                            </tr>
                        </tfoot>    
                    </table>                
                            </form>
           
                        </div>
                        <!--<div class="panel-footer"></div>-->
     
            </div>
            
        </div>                         
                        </div> 
        </div>
    </body>
    
</html>
<?php }
 else {
 header('Location:admin_login.php');      
 }
?>
