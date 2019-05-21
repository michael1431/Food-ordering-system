<?php 
require_once ('config.php');

function check_customer($r,$h)
{
    global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `customer` WHERE email =  '".$r."' AND password =  '".$h."'");
    
    if($qu){
       $stu = mysqli_fetch_array($qu);
            
        
    }
    
    return $stu;
   
}

function get_all_cities()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `city`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}

function get_all_area()
{
      global $connecton;
    $area = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `area`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $area[] = $row;
        }
    }
    
    return $area;
}

function get_all_cat()
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  category");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $stu[] = $row;
        }
    }
    
    return $stu;
}

function get_all_items()
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  items");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $stu[] = $row;
        }
    }
    
    return $stu;
}


function get_item_by_id($items)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `items` WHERE cat_id='".$items."'  ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        while($row = mysqli_fetch_array($sql)){
            $stu[] = $row;
        }
    }
    
    return $stu;
   
}


function get_all_cart_items($c_id)
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `cart` WHERE  `customer_id` = '".$c_id."'");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $stu[] = $row;
        }
    }
    
    return $stu;
}


function get_item_info_by_id($item_id)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `items` WHERE id='".$item_id."' ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        $stu = mysqli_fetch_array($sql);
    }
    
    return $stu;
   
}
function check_user_item($item_id,$customer_id)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `cart` WHERE item_id='".$item_id."'  AND customer_id='".$customer_id."'");
    $sql= mysqli_query($connecton, $qu);
    if($sql){
        $stu = mysqli_fetch_array($sql);
    }
    
    return $stu;
   
}


function update_cart($qty,$id)
{
    global $connecton;
    $stu = array();
    $qu =(" UPDATE  `project`.`cart` SET  `quantity` =  '".$qty."' WHERE  `cart`.`id` ='".$id."'; ");
    $sql= mysqli_query($connecton, $qu);
    if($sql){
        return TRUE;
    }
 else {
        return FALSE;    
    }
  
   
}

function payment_check($customer_id, $merchant, $ref,$pin,$mob, $counter, $t_id, $amu,$add){
    global $connecton;


  $sql="INSERT INTO payments(c_id,m_m_no,ref,mobile_pin,customer_m_no,counter_no,trun_id,amount,address)"
          . "VALUES ('$customer_id','$merchant','$ref','$pin','$mob','$counter','$t_id','$amu','$add');";
  $query= mysqli_query($connecton, $sql);

 if($query){
       return true;
   }else{
       return false;
   }  
  
}


function get_all_sem()
{
      global $connecton;
    $sem = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `category`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
           $sem[] = $row;
        }
    }
    
    return $sem;
   
}

function insert_user_exam($customer_id,$payment,$key,$date,$action)
{
      global $connecton;
    $stu = array();
    
    $qu = mysqli_query($connecton, "INSERT INTO  `project`.`review` (

`customer_name` ,
`total_payment` ,

`tran_key` ,
`date` ,
`order_action`
)
VALUES (
  '$customer_id',  '$payment', '$key', '$date',  '$action'
);
" );
    
    if($qu){
        return TRUE;
       
    }
 else {
        return FALSE;
        
    }
}
function payment_id($pay_id)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `payments` WHERE id='".$pay_id."'   ");
    $sql= mysqli_query($connecton, $qu);
    if($sql){
        $stu = mysqli_fetch_array($sql);
    }
    
    return $stu;
   
}
function get_all_user_exam_by_user_sub_id($user_id){
    global $connecton;
    $sem = array();
    $qu = mysqli_query($connecton, "SELECT * FROM review WHERE customer_name= '".$user_id."'   ");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
           $sem[] = $row;
        }
    }
    
    return $sem;
   
}


function get_payment_info_by_id($pay_id)
{
      global $connecton;
    $dept = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  payments WHERE id = '".$pay_id." '   ");
    
    if($qu){
        $dept = mysqli_fetch_array($qu);
    }
    
    return $dept;
   
}

function get_all_payment()
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  payments ORDER BY id DESC LIMIT 1");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $stu[] = $row;
        }
    }
    
    return $stu;
}

function get_all_orders()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `review`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}

function get_customer_by_id($pay_id)
{
      global $connecton;
    $dept = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  customer WHERE id = '".$pay_id." '   ");
    
    if($qu){
        $dept = mysqli_fetch_array($qu);
    }
    
    return $dept;
   
}

function get_item_review_by_id($id){
    global $connecton;
    $sem = array();
    $qu = mysqli_query($connecton, "SELECT * FROM item_review WHERE item_id= '".$id."'   ");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
           $sem[] = $row;
        }
    }
    
    return $sem;
   
}

function insert_item_review($item_id,$review)
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "INSERT INTO  `project`.`item_review` (

`item_id` ,
`review`
)
VALUES (
 '$item_id',  '$review'
);
" );
    
    if($qu){
        return TRUE;
       
    }
 else {
        return FALSE;
        
    }
}

function get_all_city()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `city`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}


function get_area_by_id($items)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `area` WHERE city='".$items."'  ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        while($row = mysqli_fetch_array($sql)){
            $stu[] = $row;
        }
    }
    
    return $stu;
   
}



function get_item_by_sweet()
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `items` WHERE status=0  ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        while($row = mysqli_fetch_array($sql)){
            $stu[] = $row;
        }
    }
    
    return $stu;
   
}

function get_restaurant_by_id($items)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `restaurant` WHERE area='".$items."'  ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        while($row = mysqli_fetch_array($sql)){
            $stu[] = $row;
        }
    }
    
    return $stu;
   
}


function get_item_by_restaur_id($items)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `items` WHERE restaurant='".$items."'  ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        while($row = mysqli_fetch_array($sql)){
            $stu[] = $row;
        }
    }
    
    return $stu;
   
}

function get_res_by_id($id)
{
      global $connecton;
    $stu = array();
    $qu =("SELECT * FROM  `restaurant` WHERE id='".$id."' ");
    $sql= mysqli_query($connecton, $qu);
    
    if($sql){
        $stu = mysqli_fetch_array($sql);
    }
    
    return $stu;
   
}

function get_all_res()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `restaurant`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}

function check_admin($r,$h)
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `admin_login` WHERE a_id =  '".$r."' AND a_pss =  '".$h."'  ");
    
    if($qu){
       $stu = mysqli_fetch_array($qu);
            
        
    }
    
    return $stu;
   
}

function area()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `area`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}


function std_reg($std_name,$std_id,$std_email,$std_pass){
    global $connecton;


  $sql="INSERT INTO `project`.`restaurant` ( `r_name`, `delivery_time`, `delivery_fee`, `area`)". " VALUES ( '$std_name', '$std_id', '$std_email', '$std_pass');";
  $query= mysqli_query($connecton, $sql);

 if($query){
       return true;
   }else{
       return false;
   }  
  
}

function add_city($std_name){
    global $connecton;


  $sql="INSERT INTO `project`.`city` ( `select_city`)". " VALUES ( '$std_name');";
  $query= mysqli_query($connecton, $sql);

 if($query){
       return true;
   }else{
       return false;
   }  
  
}

function add_area($area_name,$city){
    global $connecton;


  $sql="INSERT INTO `project`.`area` (`area_name`,`city`)". " VALUES ( '$area_name','$city');";
  $query= mysqli_query($connecton, $sql);

 if($query){
       return true;
   }else{
       return false;
   }  
  
}

function add_customer($student_name,$student_email,$student_password,$date,$confirm_code,$action)
{
     //$reg_date=date('d/m/Y');
      global $connecton;
    $stu = array();
    //$action = "1";
    $qu = mysqli_query($connecton, "INSERT INTO  `project`.`customer` (

`name`,
`email`,
`password`,
`created`,
`confirm_code`,
`action`

)
VALUES (
  '$student_name',  '$student_email',  '$student_password','$date','$confirm_code','$action');" );
    
    if($qu){
        return TRUE;
       
    }
 else {
        return FALSE;
        
    }
}

function get_all_customer()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `customer`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}


function total_amount()
{
      global $connecton;
    $stu = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  total_amount ORDER BY id DESC LIMIT 1");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $stu[] = $row;
        }
    }
    
    return $stu;
}


function get_all_mobile_pin()
{
      global $connecton;
    $city = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  `mobile_pin`");
    
    if($qu){
        while($row = mysqli_fetch_array($qu)){
            $city[] = $row;
        }
    }
    
    return $city;
}

function get_trun_key($trun_id)
{
      global $connecton;
    $dept = array();
    $qu = mysqli_query($connecton, "SELECT * FROM  payments WHERE id = '".$trun_id." '   ");
    
    if($qu){
        $dept = mysqli_fetch_array($qu);
    }
    
    return $dept;
   
}


