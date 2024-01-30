<?php 
  include 'header.php';
  $msg ="";
  $err = "";

  if (isset($_POST['save'])) {
      $sitename = text_input($_POST['sitename']);
      $rb = text_input($_POST['rb']);
      $sitemail = text_input($_POST['sitemail']);
      $siteurl = text_input($_POST['siteurl']);
      $btc = text_input($_POST['btc']);

      $save = mysqli_query($link, "UPDATE settings SET btc_wallet = '$btc', sitename = '$sitename', ref_bonus = '$rb', sitemail = '$sitemail', siteurl = '$siteurl' WHERE id = '1' ");
      if ($save) {
        $msg = "Settings Updated successfully";
      }else{
        $err = mysqli_error($link);
      }
      
  }

 ?>



<div class="page-content">
    <div class="container-fluid">
<?php 
  if ($msg != "") {
    echo customAlert("success", $msg);
    echo pageRedirect("2", "settings.php");
  }
  if ($err != "") {
    echo customAlert("error", $err);
  }

 ?>

      <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Settings</h4>
                  </div>
                  <form method="post" action="settings.php">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Domain</label>
                                        <input type="text" class="form-control" value="<?php echo $siteurl ?>" name="siteurl" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Site Name</label>
                                        <input type="text" class="form-control" value="<?php echo $sitename ?>" name="sitename" id="basiInput">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $sitemail ?>" name="sitemail" id="basiInput">
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Referral Bonus(By Percentage %)</label>
                                        <input type="text" class="form-control" value="<?php echo $ref_bonus ?>" name="rb" id="basiInput">
                                        <span>Make it Zero if you don't want any referral bonus</span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="basiInput" class="form-label">Bitcoin Wallet</label>
                                        <input type="text" class="form-control" value="<?php echo $btc_wallet ?>" name="btc" id="basiInput">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    
                                </div>
                                <div>
                                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


  </div>
</div>



 <?php 
  include 'footer.php';
 ?>