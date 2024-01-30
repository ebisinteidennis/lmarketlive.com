<?php 
include 'header.php'; 
$msg = $err = "";

if(isset($_POST['stop'])){
	
	
  $uemail = $_POST['email'];
  $uid = $_POST['uid'];
  $cdate = date('Y-m-d H:i:s');

    $sql1 = "UPDATE investment SET activate = '0' WHERE email='$uemail' AND id='$uid'";
    
 

  if(mysqli_query($link, $sql1)){
	
  $msg = "package is successfully stopped!";


}else{
		

    $err = "Package cannot be stopped ! ";
}
    }

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  

  <link rel="stylesheet" href=" https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.jqueryui.min.css">



  

  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="">
 
  

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
 

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.jqueryui.min.js"></script>
   
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<style>
.table-responsive {
overflow-x: hidden;
}
@media (max-width: 8000px) {
.table-responsive {
overflow-x: auto;
}
</style>

<?php 
    if ($msg != "") {
        echo customAlert("success", $msg);
        echo pageRedirect("2", "user-edit.php?email=".$email);
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
<div class="page-content">
    <div class="container-fluid">

			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-header">
			                <h4 class="card-title mb-0">All Investments</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr>
			                                    <th>Email</th>
												<th>Type</th>
												<th style="display:none;"></th>
												<th style="display:none;"></th>
												<th>Daily Profit</th>
						              			<th>Total Plan Profit</th>
						            			<th>Activation Date</th>
												<th> End Date</th>
												<th>Days to End</th>
						            			<th>Amount Invested</th>                           
						                        <th>Status</th>
						                        <th>Action</th>
			                                </tr>
			                            </thead>
								        <tbody>
					    <?php
$sql= "SELECT * FROM investment ORDER BY id DESC ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				  while($row = mysqli_fetch_assoc($result)){   
					  
					 $pdate = $row['pdate'];
					 $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];
  $uid = $row['id'];
  $email = $row['email'];
					 
$date = $row['pdate'];
$payday = $row['payday'];
$lprofit = $row['lprofit'];



// First instance
if (!is_null($payday)) {
    $paypackage = new DateTime($payday);
    $payday = $paypackage->format('Y/m/d');
}

// Second instance
if (!is_null($payday)) {
    $paypackage = new DateTime($payday);
    $payday = $paypackage->format('Y/m/d');
}


			
			if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){
			    
			    if($row['activate'] == 0){
			        $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y/m/d');
 $days=0;
			    }else{
			        
			    
         
          $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y/m/d');
 $current=date("Y/m/d");

 $diff = abs(strtotime($Date2) - strtotime($current));
 $one = 1;

          $date3 = new DateTime($Date2);
           $date3->modify( '+'. $one.'day');
           $date4 = $date3->format('Y/m/d');

  $days=floor($diff / (60*60*24));
 
 
$daily = $duration - $days;



 $one = 1;
$f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));




if(isset($days) && $days == 0 || $Date2 == (date("Y/m/d")) || (date("Y/m/d")) >= $Date2  ){
    
    
    $percentage = ($increase/100) * $usd;
    $allprofit = $percentage;
       $pp =   $allprofit;   
       $ppr = $pp + $usd;
    
	$_SESSION['pprofit'] = $percentage;
	 $sql = "UPDATE users SET walletbalance = walletbalance + $ppr, profit = profit + $pp  WHERE email='$email'";
	 
	  $sql13 = "UPDATE investment SET activate = '0', profit = '$percentage', payday = '$current'  WHERE email='$email' AND id = '$uid'";
	 
	 
  if(mysqli_query($link, $sql)){
	mysqli_query($link, $sql13);
	
	$percentage = $pp = 0;
	
		$Date2 = 0;
	$current = 0;
	$duration = 0;

	$days = 'package completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
	$days = 0;

	$current = 0;
	$duration = 0;

  }
}else{
    
    if($payday == $current){
        
    }else{
        
    // $percentage = ($increase/100) * $daily * $usd;
    
    // $allprofit = $percentage - $lprofit;
    
    //  $sql131 = "UPDATE investment SET profit = '$percentage', payday = '$current', lprofit = '$percentage' WHERE email='$email' AND id = '$uid'";
    //   $sql21 = "UPDATE users SET walletbalance = walletbalance + $allprofit, profit = profit + $allprofit  WHERE email='$email'";
     
    //  mysqli_query($link, $sql131);
    //  mysqli_query($link, $sql21);
    }
     

}





     
$add="days";
			}    
 }



if(isset($_SESSION['pprofit'])){

  $profit = $_SESSION['pprofit'];
}else{
  //session_destroy($_SESSION['pprofit']);
  $profit = "";
}
 



$sql40= "SELECT * FROM investment WHERE email='$email' AND id = '$uid'";
			  $result40 = mysqli_fetch_assoc(mysqli_query($link,$sql40));
			  $percentage = $result40['profit'];
   

if(isset($result40['activate']) &&  $result40['activate']== '1'){
	
	$sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';
}else{
$sec ='Completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
}
 	

				  ?>

						<tr class="primary">
						<form action="investments.php" method="post">
						
						<td><?php echo $row['email'];?></td>
                          <td><?php echo $row['pname'];?> </td>
						  
						  <td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
						  <td style="display:none;"><input type="hidden" name="uid" value="<?php echo $row['id'];?>"> </td>
						
						  
                <td>
                              <?php if($row['pname'] == "Free Cloudspeed"){
                              echo "$".$row['increase']." Daily";
                            }else{ echo $row['increase']."%"; }?></td>
                            <td>$<?php echo $percentage;?></td>
                            <td><?php echo $date;?></td>
                            <td><?php echo $Date2;?></td>
                            <td>
                              <?php if($row['pname'] == "Free Cloudspeed"){
                              echo $days." Days";
                            }else{ echo $days; }?></td>
                            <td><?php echo $ct ?><?php echo $usd;?></td>
                            <td>
                            <?php echo $sec ;?>
                            </td>
						
                             <td><button class="btn btn-danger" type="submit" name="stop" ><span class="fa fa-times"> Stop Package</span></button></td>
	
</form>


						</tr>
					  <?php
				  }
			  }
			  
			  
			  ?>
					</tbody>
								      </table>  

			                        
			                    </div>


			                </div>
			            </div><!-- end card -->
			        </div>
			        <!-- end col -->
			    </div>
			    <!-- end col -->
			</div>
			<!-- end row -->


	</div>
</div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>

<?php include 'footer.php'; ?>