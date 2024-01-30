<?php 
include 'header.php'; 
$msg = "";
$err = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['approve'])) {
		$with_id = $_POST['with_id'];
		$email = $_POST['email'];
		$fname = $_POST['fname'];
		$amount = $_POST['amount'];
		$status = $_POST['status'];
		$username = $_POST['username'];

		if (isset($status) && $status == "COMPLETED") {
			$msg = "This transaction has been Approved already";
		}else{
			$query = mysqli_query($link, "UPDATE withdrawals SET status = 'COMPLETED' WHERE id = '$with_id' ");

			if ($query) {

				$subject = "Withdrawal Approval!";
				$body = "<p>Dear ".$fname."</p> <p>Congratulation! Your withdrawal request of $".$amount."  has been approved successfully and you will be credited soon. </p> ";

				sendMail($email, $fname, $subject, $body);

				echo "<script>alert('Transaction has been approved');window.location.href = window.location.href </script>";
			}
			$msg = "Transaction has been Approved successfully";
		}
	}


	if(isset($_POST['delete'])){
		$with_id = $_POST['with_id'];
		mysqli_query($link, "DELETE FROM withdrawals WHERE id = '$with_id' ");
		$msg = "Withdrawal Transaction deleted successfully";
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
        echo customAlert("success", $msg);
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-header">
			                <h4 class="card-title mb-0">All Withdrawals</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr class="info">
												<th>Email</th>
												<th>Name</th>
												<th>Amount</th>
												<th>Method</th>
												<th>Wallet</th>
												<th>Bank Name</th>
												<th>Account Number</th>
												<th>Account Name</th>
												<th>Status</th>
												<th>Date</th>
												<th>Action</th>
												<th>Action</th>
											</tr>
			                            </thead>
								        <tbody>
		                                	<?php
		                                		$select = mysqli_query($link, "SELECT * FROM withdrawals ");
		                                		if (mysqli_num_rows($select)) {
		                                			while ($row = mysqli_fetch_assoc($select)) {
		                                				$email = isset($row['email']) ? $row['email'] : '';
														$user = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' ");
														$user_r = mysqli_fetch_assoc($user);
		                                	 ?>
		                                	 <tr>
		                                	 <form  method="post">
				                                
				                                	<input type="hidden" name="name" value="<?php echo $user_r['fname'] ?>">
													<input type="hidden" name="email" value="<?php echo $row['email'] ?>">
				                                	<input type="hidden" name="with_id" value="<?php echo $row['id'] ?>">
				                                	<input type="hidden" name="status" value="<?php echo $row['status'] ?>">
				                                	<input type="hidden" name="amount" value="<?php echo $row['amount'] ?>">
				                                	<input type="hidden" name="method" value="<?php echo $row['method'] ?>">
				                               		
				                                	<td><?php echo $row['email'] ?></td>
				                                   <td><?php echo isset($user_r['fname']) ? $user_r['fname'] : ''; ?></td>

				                                    <td>$<?php echo $row['amount'] ?></td>
				                                    <td><?php echo $row['method'] ?></td>
				                                    <td><?php echo $row['wallet'] ?></td>
				                                    <td><?php echo $row['bank_name'] ?></td>
				                                    <td><?php echo $row['acct_number'] ?></td>
				                                    <td><?php echo $row['acct_name'] ?></td>
				                                    
				                                    <td>
				                                    	<?php 
				                                    		if ($row['status'] == "PENDING") {
				                                    	 ?>
				                                    	 <button type="button" class="btn btn-warning"><?php echo $row['status'] ?></button>
				                                    	<?php }else{ ?>
				                                    	<button type="button" class="btn btn-success"><?php echo $row['status'] ?></button>
				                                    <?php } ?>
				                                    </td>
				                                    <td><?php echo $row['date'] ?></td>
				                                    <td>

														<button type="submit" onclick="return confirm('Carry out action')" name="approve" class="btn btn-success">Approved</button>
													</td>
													<td>
														<button type="submit" onclick="return confirm('Do you want to delete this transaction ?')" name="delete" class="btn btn-danger">Delete</button></td>
													</td>
				                                    
				                                </tr>
			                                </form>
			                                <?php }
		                                		} ?>
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