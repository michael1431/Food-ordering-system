<?php
session_start();

$message="";
if(isset($_SESSION['customer'])){
           $customer_id = $_SESSION['customer']['id']; 
           
            
include './function.php';

if(isset($_POST['p_ref'])){
    $ref=$_POST['p_ref'];
    $merchant=$_POST['p_ma'];
    $counter=$_POST['p_count'];
    $t_id=$_POST['p_tid'];
    $amu=$_POST['p_amu'];
    $mob=$_POST['m_no'];
    $pin=$_POST['pin'];
    $add=$_POST['add'];
    $payment_insert= payment_check($customer_id, $merchant, $ref,$pin,$mob, $counter, $t_id, $amu,$add);
    if($payment_insert){
        
        $all_pay = get_all_payment();
     foreach ($all_pay as $pay){?>
     

         <form action="review_order.php" method="post">
             <input type="hidden" value="<?php echo $pay['id']; ?> " name="Payment_id"/>
                     <input type="submit" class="btn btn-md btn-primary " style="margin-left: 470px;font-family: cursive" value="Forward For Confirmation"/>
          </form>

    
    <?php }
    $sql= mysqli_query($connecton, "DELETE FROM cart WHERE customer_id='".$customer_id."'");
    
    }
    else {
        $message="demage";
    }
    
}
 

?>


<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css" />
    </head>
    
    
    <body style="background-color: #ececec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-3">
                    <div class="panel panel-default">
                <div class="col-md-8 text-success" style="margin-top:15px; ">
                    
                    <form action="" method="POST">
                        
                        <div class="panel panel-info">
                        <div class=" panel-heading "><b><i>Payments With <span style="color: hotpink">biKash</span></i></b>
                        <?php
                              if ($message) {
                                  echo "<h1>".$message."</h1>";
                                  
                              }
                              
                            ?>

                        </div>
                    
                        <div class="panel-body" style="margin-left:">
                        <table class="table-condensed">
                            <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Merchant Account No:</b></td>
                                <td><input type="text" value="01923144496" name="p_ma" class="form-control" readonly=""></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Reference:</b></td>
                                <td><input type="text" value="M001" name="p_ref" class="form-control" readonly=""></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Counter No:</b></td>
                                <td><input type="text" value="1" name="p_count" class="form-control" readonly=""></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Customer Mobile No:</b></td>
                                <td>
                                    <select class="" name="pin" required="" style="padding: 10px 10px;border: none;border-radius: 4px;background-color: #f1f1f1;"> 
                                        <option value="">Select Code</option>
                                             <?php
                            $all_sess = get_all_mobile_pin();
                            foreach($all_sess as $sess){ ?>
                            <option value="<?php echo $sess['id']; ?>"><?php echo $sess['pin']; ?></option>
                            <?php } ?>
                                    </select>
                                </td>
                                <td><input type="text" maxlength="8" minlength="8" name="m_no" class="calculator-input form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
                            </tr>
                            <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Transaction ID(TxnID):</b></td>
                                <td><input type="text" value="" name="p_tid" required="" class="form-control"></td>
                            </tr>
                             <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Amount:</b></td>
                               <?php $total_amount= total_amount();
                             foreach ($total_amount as $t_amount) {?>
    
                                <td><input type="text" value="<?php echo $t_amount['total_amount'];?>" readonly="" name="p_amu" required="" class="form-control"></td>
                                       
                             <?php } ?>
                                
                            </tr>
                            
                            <tr>
                                <td class="text-danger" style="font-family: cursive"><b>Address:</b></td>
                                <td><textarea class="form-control" rows="3" cols="5" name="add"></textarea><br/></td>
                            </tr>
                        </table>
                        
                   
                    </div>
                        <div class="panel-footer"> 
                            
<button class="btn btn-md btn-success" style="font-family: cursive">Payment</button>
                        </div>
                        
                        </div> 
                        
                        
                        
                    </form>
                    
                    
                    
                                    
                </div>
        
        
                        
                        
                    </div>
                        
                        
                        
                    </table>
                
                </div>
      <?php          
               // $all_pay = get_all_payment();
                  //foreach ($all_pay as $pay)?>
              <!--<a href="review_order.php.php?Payment_id=<?php echo $pay['id']; ?>">check </a>-->
         
     
            </div>
        </div>
        
        
        
    </body>
 
</html>
     <?php }
 else {
 header('Location:index.php');      
 }

?>