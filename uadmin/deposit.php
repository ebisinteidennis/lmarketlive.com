<?php 
include 'header.php'; 
error_reporting(E_ALL);
ini_set('display_errors', '1');


$msg = "";
$err = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	if (isset($_POST['approve'])) {
		$depost_id = $_POST['deposit_id'];
		$email = $_POST['email'];
		$name = $_POST['name'];
		$amount = $_POST['amount'];
		$method = $_POST['method'];
		$status = $_POST['status'];
		if (isset($status) && $status == "COMPLETED") {
			$msg = "This transaction has been Approved already";
		}else{
			$query = mysqli_query($link, "UPDATE btc SET status = 'COMPLETED' WHERE id = '$depost_id' ");

			if ($query) {
				mysqli_query($link, "UPDATE users SET walletbalance = walletbalance + $amount  WHERE email = '$email' ");

				$subject = "Deposit Approval!";
				$body = "<p>Dear ".$name."</p> <p>Congratulation! Your deposit of $".$amount."  worth of ".$method." has been approved successfully and your account balance has been updated.  </p> ";

				sendMail($email, $name, $subject, $body);
				echo "<script>alert('Transaction has been approved');window.location.href = window.location.href </script>";

			
			}
			$msg = "Transaction has been Approved successfully";
		}
	}

	if(isset($_POST['delete'])){
		$depost_id = $_POST['deposit_id'];
		mysqli_query($link, "DELETE FROM btc WHERE id = '$depost_id' ");
		$msg = "Deposit Transaction deleted successfully";
	}

$user_data = check_login($link);

if ($user_data) {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize variables with default values
        $username = $fname = $email = $currency = $gender = $plan = $phone = $country = $walletbalance = $btc_wallet = $eth_wallet = $ltc_wallet = '';

        // Check and set values if they exist in $_POST
        if (isset($_POST['username'])) $username = mysqli_real_escape_string($link, $_POST['username']);
        if (isset($_POST['fname'])) $fname = mysqli_real_escape_string($link, $_POST['fname']);
        if (isset($_POST['email'])) $email = mysqli_real_escape_string($link, $_POST['email']);
        if (isset($_POST['currency'])) $currency = mysqli_real_escape_string($link, $_POST['currency']);
        if (isset($_POST['gender'])) $gender = mysqli_real_escape_string($link, $_POST['gender']);
        if (isset($_POST['plan'])) $plan = mysqli_real_escape_string($link, $_POST['plan']);
        if (isset($_POST['phone'])) $phone = mysqli_real_escape_string($link, $_POST['phone']);
        if (isset($_POST['country'])) $country = mysqli_real_escape_string($link, $_POST['country']);
        if (isset($_POST['walletbalance'])) $walletbalance = mysqli_real_escape_string($link, $_POST['walletbalance']);
        if (isset($_POST['btc_wallet'])) $btc_wallet = mysqli_real_escape_string($link, $_POST['btc_wallet']);
        if (isset($_POST['eth_wallet'])) $eth_wallet = mysqli_real_escape_string($link, $_POST['eth_wallet']);
        if (isset($_POST['ltc_wallet'])) $ltc_wallet = mysqli_real_escape_string($link, $_POST['ltc_wallet']);

        // Update the user information in the database
        $update_query = "UPDATE users SET
            username = '$username',
            fname = '$fname',
            email = '$email',
            currency = '$currency',
            gender = '$gender',
            plan = '$plan',
            phone = '$phone',
            country = '$country',
            walletbalance = '$walletbalance',
            btc_wallet = '$btc_wallet',
            eth_wallet = '$eth_wallet',
            ltc_wallet = '$ltc_wallet'
            /* Add more fields here with their respective variables */
            WHERE id = " . $user_data['id'];

        $update_result = mysqli_query($link, $update_query);

        if ($update_result) {
            // Update successful
            echo "Profile updated successfully!";
            
            // Update the $user_data array with the new values
            $user_data['username'] = $username;
            $user_data['fname'] = $fname;
            $user_data['email'] = $email;
            $user_data['currency'] = $currency;
            $user_data['gender'] = $gender;
            $user_data['plan'] = $plan;
            $user_data['phone'] = $phone;
            $user_data['country'] = $country;
            $user_data['walletbalance'] = $walletbalance;
            $user_data['btc_wallet'] = $btc_wallet;
            $user_data['eth_wallet'] = $eth_wallet;
            $user_data['ltc_wallet'] = $ltc_wallet;
            /* Update other fields in $user_data as needed */
        } else {
            // Update failed
            echo "Error updating profile. Please try again.";
        }
    }
} else {
    echo "<h1>Please log in.</h1>";
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
<div class="page-content">
    <div class="container-fluid">
<?php 
    if ($msg != "") {
        echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>"; 
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-header">
			                <h4 class="card-title mb-0">All Deposits</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr class="info">
												<th>Name</th>
												<th>Email</th>
												<th>Plan</th>
												<th>Amount(USD)</th>
												<th>Method</th>
												<th>Status</th>
												<th>Date</th>
						                        <th>Action</th>						                        
						                        <th>Action</th>
								
											</tr>
			                            </thead>
								        <tbody>
									<?php 
									$sql= "SELECT * FROM btc";
									  $result = mysqli_query($link,$sql);
									  if(mysqli_num_rows($result) > 0){
										  while($row = mysqli_fetch_assoc($result)){   
										  	$email = $row['email'];
										  	$user = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' ");
											$user_r = mysqli_fetch_assoc($user);
				  						?>
				  		
						<tr class="primary">
						<form method="post">
                            <input type="hidden" name="name" value="<?php echo $user_r['fname'] ?>">
							<input type="hidden" name="email" value="<?php echo $user_r['email'] ?>">
                        	<input type="hidden" name="deposit_id" value="<?php echo $row['id'] ?>">
                        	<input type="hidden" name="status" value="<?php echo $row['status'] ?>">
                        	<input type="hidden" name="amount" value="<?php echo $row['usd'] ?>">
                        	<input type="hidden" name="method" value="<?php echo $row['method'] ?>">
							<td><?php echo isset($user_r['fname']) ? $user_r['fname'] : ''; ?></td>
                            <td><?php echo isset($row['email']) ? $row['email'] : ''; ?></td>
                            <td><?php echo isset($row['plan']) ? $row['plan'] : ''; ?></td>
                            <td>$<?php echo isset($row['usd']) ? $row['usd'] : ''; ?></td>
                            <td><?php echo isset($row['method']) ? $row['method'] : ''; ?></td>
                            <td><?php echo isset($row['status']) ? $row['status'] : ''; ?></td>
                            <td><?php echo isset($row['date']) ? $row['date'] : ''; ?></td>

                            <td><button onclick="return confirm('Carry out action')" type="submit" name="approve" class="btn btn-success">Approved</button></td>
                            
							
							<td><button type="submit" onclick="return confirm('Do you want to delete this transaction ?')" name="delete" class="btn btn-danger">Delete</button></td></td>
							
   
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