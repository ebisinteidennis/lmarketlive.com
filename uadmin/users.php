<?php 
include 'header.php'; 
$msg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        $emailToDelete = $_POST['emailToDelete'];

        // Use prepared statements to prevent SQL injection
        $stmt = $link->prepare("DELETE FROM users WHERE email = ?");
        $stmt->bind_param("s", $emailToDelete);

        if ($stmt->execute()) {
            echo "User deleted successfully.";
            // Optionally, you can redirect or perform additional actions after successful deletion.
        } else {
            echo "Error deleting user: " . $stmt->error;
        }

        $stmt->close();
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
<div class="page-content">
    <div class="container-fluid">

			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-header">
			                <h4 class="card-title mb-0">All Users</h4>
			            </div><!-- end card header -->

			            <div class="card-body">
			                <div id="customerList">
			                    

			                    <div class="table-responsive table-card mt-3 mb-1">
			                    	<table id="myTable" class="table-responsive" >  
								        <thead class="table-light">
			                                <tr>
			                                    <th>Username</th>
			                                    <th>Full Name</th>
												<th>Email</th>
					              				<th>Total Profit</th>
												<th>Account Balance</th>
												<th>Date</th>
												<th>ACTION</th>
                                             	<th>ACTION</th>
                                                <!-- <th>ACTION</th> -->
			                                </tr>
			                            </thead>
					                    
					                    
					                 <tbody>
                                    <?php
                                    $sql = "SELECT * FROM users ORDER BY id DESC";
                                    $result = mysqli_query($link, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td id="email"><?php echo $row['email']; ?></td>
                                                <td>$<?php echo $row['profit']; ?></td>
                                                <td>$<?php echo $row['walletbalance']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td>
                                                    <a href="user-edit.php?email=<?php echo $row['email'] ?>">
                                                        <button type="button" name="edit" style="width:100%" class="btn btn-primary">
                                                            <span class="fa fa-check">-Edit</span>
                                                        </button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="users.php" method="post">
                                                        <input type="hidden" name="emailToDelete" value="<?php echo $row['email']; ?>">
                                                        <button type="submit" onclick="return confirm('Do you want to delete this account')" name="delete" style="width:100%" class="btn btn-danger">
                                                            <span class="fas fa-trash">-Delete</span>
                                                        </button>
                                                    </form>
                                                </td>
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