<?php
if(!empty($_POST["register-user"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	/* Email Validation */
	if(!isset($error_message)) {
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$error_message = "Invalid Email Address";
		}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($error_message)) {
		if(!isset($_POST["terms"])) {
		$error_message = "Accept Terms and Conditions to Register";
		}
	}

	if(!isset($error_message)) {
		require_once("../connection/koneksi.php");
		$db_handle = new koneksi();
		$query = "INSERT INTO tbl_claim 
		(user_telegram, ethereum_address
		, email_address
		, email_Frend1
		, email_Frend2
		, email_Frend3
		, email_Frend4
		, email_Frend5
		, email_Frend6
		, email_Frend7
		, email_Frend8
		, email_Frend9
		, email_Frend10) 
		VALUES
		('" . $_POST["userTelegram"] 
		. "', '" 
		. $_POST["ethereumAddres"] 
		. "', '" . $_POST["email"]
		 . "', '" . $_POST["email1"] 
		 . "', '" . $_POST["email2"] 
		 . "', '" . $_POST["email3"] 
		 . "', '" . $_POST["email4"] 
		 . "', '" . $_POST["email5"] 
		 . "', '" . $_POST["email6"] 
		 . "', '" . $_POST["email7"] 
		 . "', '" . $_POST["email8"] 
		 . "', '" . $_POST["email9"] 
		 . "', '" . $_POST["email10"]. "')";

		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$error_message = "";
			print "<script function myFunction()alert('You have claim successfully!');window.history.back();</script>";	
			unset($_POST);
		} else {
			print "<script function myFunction()alert('Problem in claim. Try Again!');</script>";
		}
	}
}
?>
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
