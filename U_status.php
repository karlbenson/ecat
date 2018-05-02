<!DOCTYPE html>

<html lang="en">

<?php
	$pagetitle = "Profile";
	include 'U_linkstable.php';
	
?>

<body>
<?php
	include 'U_navi.php';
	include 'U_database.php';

	$profile = $_GET['memberprofile'];
	$loan_type = $_GET['loan_type'];

	$membertable = "select * from loans_app where loan_type = '$loan_type' and member_id = $profile";
	$outputmembers = $U_database->query($membertable);
				
	if ($outputmembers->num_rows>0) {
		while($dataline = $outputmembers->fetch_assoc()) {
			$member_fname = $dataline['member_fname'];
			$member_lname = $dataline['member_lname'];
			$loan_type = $dataline['loan_type'];
			$loan_amount = $dataline['loan_amount'];
			$out_bal = $dataline['out_bal'];
			$app_date = $dataline['app_date'];
			$status = $dataline['status'];
		}
	}

	if(isset($_POST['newsavings'])){
		$nstatus = $_POST['status'];
		$namount_paid = $_POST['paidamount'];
		$nornum = $_POST['ornum'];
		$npaydate = $_POST['paiddate'];

		$out_bal = $out_bal - $namount_paid;

		mysqli_query($U_database, "INSERT INTO bal_hist (member_id, loan_type, loan_amount, status, out_bal, loan_orcdv, paydate, app_date) VALUES ($profile, '$loan_type', '$loan_amount', '$nstatus', $out_bal, '$nornum', '$npaydate', '$app_date');");	

		mysqli_query($U_database, "UPDATE loans_app SET out_bal = $out_bal, status = '$nstatus', loan_orcdv = '$nornum' WHERE loan_type = '$loan_type' AND member_id = $profile;");

		echo "<script>alert('Payment Successful!');
		location = 'U_profile_payment.php?memberprofile=$profile';</script>";

	}
	
?>
	
<div id="outerfilm">
	<div id="box" style="float:left; width:100%; padding:20px;">			
		<div id="standardbox" style="float:left; width:100%;">
	
				<div id="section" style="float:left; width:100%;">
					<h5 style="margin:0px;">Payment</h5>
				</div>
			
				<div style="float:left; width:100%; padding: 20px;">
							
					<div id="hide-ss" style="float:left; width: 100%; background-color:#ffffff; border-radius:5px; padding:20px 50px;">
					
					<?php
					
					if(isset($_GET["memberprofile"])){
						$profile = $_GET["memberprofile"];
					}
					
					//MYSQL SECTION
					$memberstable = "select * from members where member_id = $profile";
					$outputmembers = $U_database->query($memberstable);
					if ($outputmembers->num_rows>0) { 
							while ($myresults = $outputmembers -> fetch_assoc()){
								$member_fname = $myresults['member_fname'];
								$member_lname = $myresults['member_lname'];
								$member_minitial = $myresults['member_minitial'];
								$tin = $myresults['tax_id_num'];
							}
						}
						?>
				
				
	
				
						
						
					
					<div id="clearbox" style="width:100%; float:left; padding:0px 100px;">
						<div id="shadebox" style="width:100%; color:white; float:left; margin-bottom:20px;">
							<div id="line">
								<div style="font-weight:bold; width:220px; float:left;">Name:</div>
								<div style="float:left;"><?php echo $member_lname.', '.$member_fname.' '.$member_minitial ?></div>
							</div>
							<div id="line">
								<div style="font-weight:bold; width:220px; float:left;">TIN:</div>
								<div style="float:left;"><?php echo $tin ?></div>
							</div>
						</div>
					</div>
					<div id="clearbox" style="width:100%; float:left; padding: 10px 100px;">
						<div id="isolatebox" style="width:100%; float:left; padding:50px 0px;">
							<form method="POST">
								
								<div id="clearbox" style="width:100%; float:left; padding:5px; text-align:center; color:#7B1111;">
									<h4>Payment Details</h4></div>
								<div style="float:left; width:100%;"><hr id="mini"></div>
								<div class="form-group container-fluid">
									<label for="status" style="font-weight:bold; width: 275px; ">Status</label>
									<input  title="Check your input" maxlength="36" type="text"
									 class="form-control" id="" value="<?php echo $status?>" name="status"
										style="max-width: 250px;"  required>
								</div>

								<div class="form-group container-fluid">
									<label for="paidamount" style="font-weight:bold; width: 275px; ">Amount Paid</label>
									<input  title="Check your input" maxlength="36" type="text"
									 class="form-control" id="" placeholder="Enter amount paid..." name="paidamount"
										style="max-width: 250px;"  required>
								</div>
								<div class="form-group container-fluid">
									<label for="paiddate" style="font-weight:bold; width: 275px;">Date of Payment</label>
									<input type="date" class="form-control" id="paiddate" name="paiddate"
										style="max-width: 250px; color:#7B1111;" required>
								</div>
								<div class="form-group container-fluid" >
									<label for="ornum" style="font-weight:bold; width: 275px;">OR Number</label>
									<input title="Check your input" maxlength="36" type="text"
									class="form-control" id="ornum" placeholder="No. of official reciept..." name="ornum"
										style="max-width: 250px;" required>
								</div>
								<div id="blankbox">
									<button type="submit" id="negativebutton" class="btn" name="newsavings">Confirm Payment</button>					
								</div>
							</form>
						</div>
					</div>
						
					<div id="clearbox" style="text-align:center; width:100%; float:left;">
						<?php echo '<a href="U_profile_payment.php?memberprofile='.$profile.'">
						<i class="fa fa-angle-double-left" style="font-size:12pt;"></i> Return to previous page</a>'?>
					</div>
					</div>
			</div>
			<div id="section" style="float:left; width:100%;">
				<h5 style="margin:0px;">UP Baguio Multipurpose Cooperative</h5>
			</div>
</div>
	</div>
</div>
</body>

</html>
<?php	include 'U_footer.php'; ?>
<script type="text/javascript">


</script>
