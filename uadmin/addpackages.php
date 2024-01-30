<?php 
include 'header.php';

$msg = "";
$err = "";
    $pdname = "";
   $pdincrease = "";
   $pdbonus = "";
   $pdduration ="";
   $pdfroms = "";
   $pdtos = "";
   $vid = "";

   

if(isset($_POST['package11'])){

$pname =$link->real_escape_string( $_POST['pname']);
$increase =$link->real_escape_string( $_POST['increase']);
$duration =$link->real_escape_string($_POST['duration']);
$froms =$link->real_escape_string($_POST['froms']);
$tos =$link->real_escape_string($_POST['tos']);


if(isset($_POST['mid']) && $_POST['mid'] !=''){
  $mid = $link->real_escape_string( $_POST['mid']);
  
  $sql1 = "UPDATE package1 SET pname='$pname',increase='$increase', duration='$duration', amt='$froms'  WHERE id='$mid'";






  if (mysqli_query($link, $sql1)) {

$msg= " Package updated successfully!";

           } else {
        $msg= mysqli_error($link);
         }
}else{


    $sql = "INSERT INTO package1 (pname,increase,duration,amt) VALUES ('$pname','$increase','$duration','$froms')";






                  if (mysqli_query($link, $sql)) {

  
               $msg= " Package has been successfully added";

                           } else {
                        $msg= " Package was not added ";
                         }
                        }
                          
}
?>

<div class="page-content">
    <div class="container-fluid">
    	<?php 
    if ($msg != "") {
        echo customAlert("success", $msg);
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
    	<h4 align="center"><i class="fa fa-gears"></i> PLANS MANAGEMENT</h4>
				</br>

	<?php
	  
	  if(isset($_GET['id']) && $_GET['id'] !=''){
	    $vid= "yes";
	    $id = $link->real_escape_string( $_GET['id']);
	$sql1= "SELECT * FROM package1 WHERE id = '$id'";
	  $result1 = mysqli_query($link,$sql1);
	  if(mysqli_num_rows($result1) > 0){
	   $row = mysqli_fetch_assoc($result1);
	   $pdname = $row['pname'];
	   $pdincrease = $row['increase'];
	   $pdduration = $row['duration'];
	   $pdfroms = $row['min_amt'];
     $pdtos = $row['max_amt'];
	 
	  }
	  }

	?>

	<form class="form-horizontal" action="addpackages.php" method="POST" >

           <legend>Package</legend>
      
     <div class="form-group">
       <label> Plan Name </label>
        <input type="text" name="pname" placeholder="Package Name" value="<?php echo $pdname;?>" class="form-control">
        </div>

       <div class="form-group">
       <label> Percentage Increase </label>
        <input type="text"  name="increase" placeholder="Percentage Increase" value="<?php echo $pdincrease;?>"  class="form-control">
      </div>


      <div class="form-group">
      <label> Package Duration (Days) </label>
        <input type="text"  name="duration" placeholder="Package Duration" value="<?php echo $pdduration;?>"  class="form-control">
      </div>
        
       
        <div class="form-group">
        <label> Package Minimum Amount </label>
        <input type="text"  name="froms" placeholder="Package Amount"  value="<?php echo $pdfroms;?>"  class="form-control">
        </div>

        <div class="form-group">
        <label> Package Maximum Amount </label>
        <input type="text"  name="tos" placeholder="Package Amount"  value="<?php echo $pdtos;?>"  class="form-control">
        </div>
        
        <br>
        <?php if($vid == ""){
          ?>
      <button style="" type="submit" class="btn btn-info" name="package11" >Add Package</button>
    <?php }else{?>
    <input type="hidden" name="mid"  value="<?php echo $id;?>" class="form-control">
    <button style="" type="submit" class="btn btn-info" name="package11" >Update Package </button>
    <?php }?>


    </form>
    </div>
</div>

<?php 
include 'footer.php';
?>