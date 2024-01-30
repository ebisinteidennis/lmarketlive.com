<?php 
include 'header.php';

if(isset($_GET['email'])){
	$email = $_GET['email'];
}else{
	$email = '';
}

$msg = "";
$err = "";
				  
    if(isset($_POST['edit'])){
      $emails =$link->real_escape_string( $_POST['email']);
       $username =$link->real_escape_string( $_POST['username']);
        $password =$link->real_escape_string( $_POST['password']);
      $balance =$link->real_escape_string( $_POST['balance']);
      $balanceloss =$link->real_escape_string( $_POST['balanceloss']);
      $bonus =$link->real_escape_string( $_POST['bonus']);
      $balancelive =$link->real_escape_string( $_POST['balancelive']);
      $balancemine =$link->real_escape_string( $_POST['balancemine']);
    //   $totalwon =$link->real_escape_string( $_POST['totalwon']);
      $profit =$link->real_escape_string( $_POST['profit']);
      $fname =$link->real_escape_string( $_POST['name']);
      $phone =$link->real_escape_string( $_POST['phone']);
      $referred =$link->real_escape_string( $_POST['referred']);
      $pin =$link->real_escape_string( $_POST['pin']);
      $upgrade =$link->real_escape_string( $_POST['upgrade']);

      $sql1 = "UPDATE users SET fname='$fname',username='$username',email='$emails',password='$password', phone='$phone',referral='$referred',profit='$profit',bonus='$bonus',balanceloss='$balanceloss',balancelive='$balancelive',balancemine='$balancemine',totalwon='$totalwon',walletbalance='$balance', upgrade='$upgrade',pin='$pin' WHERE email = '$email' ";
      
      if (mysqli_query($link, $sql1)) {
          $msg = "Account Details Edited Successfully!";
      } else {
          $err = mysqli_error($link);
      }
      }



 $sql = "SELECT * FROM users WHERE email = '$email'";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);

      
          $username =  $row['username'];
          
          

        }
				  

?>

<br>
<br>
<div class="page-content">
    <div class="container-fluid">
<?php 
    if ($msg != "") {
        echo customAlert("success", $msg);
        echo pageRedirect("2", "user-edit.php?email=".$email);
    }
    if ($err != "") {
        echo customAlert("error", $err);
    }

 ?>
        <div class="row">
            <div class="col-xxl-12">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                    <i class="fas fa-home"></i> Edit Info
                                </a>
                            </li>
                            

                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                <form action="user-edit.php?email=<?php echo $email ?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="firstnameInput" placeholder="Enter your fullname" name="name" value="<?php echo $row['fname'] ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control" id="" placeholder="Enter your username"  value="<?php echo $row['username'] ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                <input type="number" class="form-control" id="phonenumberInput" placeholder="Enter  phone number" name="phone" value="<?php echo $row['phone'] ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="emailInput" placeholder="Enter your email" value="<?php echo $email ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Balance</label>
                                                <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter balance" name="balance" value="<?php echo round($row['walletbalance'],2) ?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Withdrawal Balance</label>
                                                <input type="text" name="balanceloss" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['balanceloss'] ?>">
                                            </div>
                                        </div>
                                         <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Bonus</label>
                                                <input type="text" name="bonus" class="form-control" id="emailInput" placeholder="Enter bonus" value="<?php echo $row['bonus'] ?>">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Deposit Balance</label>
                                                <input type="text" name="balancelive" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['balancelive'] ?>">
                                            </div>
                                        </div>
                             
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Total Deposit</label>
                                                <input type="text" name="balancemine" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['balancemine'] ?>">
                                            </div>
                                        </div>                                        
                             
                                        <!--<div class="col-lg-6">-->
                                        <!--    <div class="mb-3">-->
                                        <!--        <label for="emailInput" class="form-label">Total Won</label>-->
                                        <!--        <input type="text" name="totalwon" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['totalwon'] ?>">-->
                                        <!--    </div>-->
                                        <!--</div>    -->
                             
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Profit</label>
                                                <input type="text" name="profit" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo round($row['profit'],2) ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Referred By</label>
                                               
                                                <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter Referral" name="referred" value="<?php echo $row['referral'];?>">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Password</label>
                                                <input type="text" name="password" class="form-control" id="emailInput" placeholder="Enter referral bonus" value="<?php echo $row['password'] ;?>">
                                            </div>
                                        </div>
                                   		<div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">PIN</label>
                                                <input type="text" class="form-control" id="phonenumberInput" placeholder="" name="pin" value="<?php echo $row['pin'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Upgrade(<?php echo $row['upgrade'] == 1 ? "Yes" : "No" ?>)</label>
                                    
                                                <select name="upgrade" class="form-control">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" name="edit" class="btn btn-primary">Update</button>
                                                
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->


                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div><!-- End Page-content -->








<?php 
include 'footer.php';
?>