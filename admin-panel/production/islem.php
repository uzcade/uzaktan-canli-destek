<?php
	require $config['init'];

	if (isset($_POST['send'])) {
		
		$request_title		=	trim($_POST['request_title']);
		$request_content 	=	trim($_POST['request_content']);
		$fullname			=	$_SESSION['customer_name'];
		$customer_id		= 	$_SESSION['customer_id'];

		$add_request_sql = "INSERT INTO requests
							(
								request_title,
								request_content, 
								customer_fullname,
								customer_id
							) 
								VALUES 
							(
								'$request_title',		
								'$request_content',	
								'$fullname',
								'$customer_id'
							)";

		$add_request	=	mysqli_query($connection, $add_request_sql);

		if ($add_request) {
			header("refresh:0.02; url=".base_url('panel/customer/requests?state=true'));
		}else {
			header("refresh:0.02; url=".base_url('panel/customer/requests?state=false'));
		}
	}


	if ($_POST['type'] == 'user-info-update-btn') {

		$name		=	$_POST['name'];
		$surname	=	$_POST['surname'];
		$email		=	$_POST['email'];
		$telephone	= 	$_POST['telephone'];
		$user_id    =   $_POST['user_id'];

		$update_user_info_sql = "UPDATE customers 
								SET 
								name = '$name',
								surname = '$surname', 
								email = '$email', 
								telephone='$telephone'
						  		WHERE id = '$user_id' ";
        	
        $update_user_info_request = mysqli_query($connection, $update_user_info_sql);

        if ($update_user_info_request) {
            die('true');	//Kayıt Güncellendi.
        } else {
            die('false');	//Kayıt Güncellenemedi.
		}
    }

    if ($_POST['type'] == 'removeCustomer') {

		$id = $_POST['user_id'];

		$delete_user_sql = "DELETE FROM customers
							WHERE id='$id'";

		$delete_user_request = mysqli_query($connection, $delete_user_sql);
		
		if ($delete_user_request) {
            die('true');	//Kullanıcı silindi.
        } else {
            die('false');	//Kullanıcı silinemedi.
		}
	}

	/*if ($_GET['type'] == 'completed_btn') {

		$request_id	= $_GET['compid'];
		
		$completed_control_sql = mysqli_query($connection, "SELECT state 
															FROM requests 
															WHERE id = '$request_id'");

		$completed_control_data = mysqli_fetch_array($completed_control_sql);
		
		if ($completed_control_data['state'] == "Tamamlandı") {

			die('already_completed');

		} else {

			$update_request_state_sql = "UPDATE requests
								SET
								state = 'Tamamlandı'
						  		WHERE id = '$request_id'";

	        $update_user_info_request = mysqli_query($connection, $update_request_state_sql);

	        if ($update_user_info_request) {
	            die('true');
	        } else {
	            die('false');
			}
		}
	}*/

	if (isset($_GET['supid'])) {

		$delete_user_sql = "DELETE FROM supporters
							WHERE id = '".$_GET['supid']."'";

		$delete_user_request = mysqli_query($connection, $delete_user_sql);
		
		header("Location:".base_url('panel/admin/support-team?state=true'));
	}

	if ($_POST['type'] == 'assign_supporter') {

		$customer_id	=	$_POST['customer_list'];
		$supporter_id	=	$_POST['supporter_id'];
		
		$assing_supporter_sql = "UPDATE customers 
								SET supporter_id = '$supporter_id' 
								WHERE id = '$customer_id'";
        	
        $assing_supporter_request = mysqli_query($connection, $assing_supporter_sql);

        if ($assing_supporter_request) {
        	die('true');
        } else {
        	die('false');
		}
    }

    if ($_POST['type'] == 'company_info_update_btn') {

		$company_name		=	$_POST['company_name'];
		$product_name		=	$_POST['product_name'];
		$company_address	=	$_POST['company_address'];
		$company_mail		= 	$_POST['company_mail'];
		$company_telephone	=   $_POST['company_telephone'];
		$company_fax    	=   $_POST['company_fax'];

		$update_company_info_sql = "UPDATE company
								SET
								company_name 		= 	'$company_name', 
								product_name 		= 	'$product_name',
								company_address 	= 	'$company_address',
								company_mail 		= 	'$company_mail', 
								company_telephone	= 	'$company_telephone', 
								company_fax			= 	'$company_fax'
							  	WHERE id = 1";
        	
        $update_company_info_request = mysqli_query($connection, $update_company_info_sql);

        if ($update_company_info_request) {
            die('true');		//Kayıt Güncellendi.
        } else {
            die('false');	//Kayıt Güncellenemedi.
		}
    }

    if ($_POST['type'] == 'add_supporter') {
		
		$name		=	trim($_POST['name']);
		$surname 	=	trim($_POST['surname']);
		$email		=	trim($_POST['email']);
		$temp_password  =   rand(100000, 999999);

		$add_supporter_control_sql = "SELECT email 
									FROM supporters 
									WHERE email = '$email'";

		$add_supporter_control	=	mysqli_query( $connection, $add_supporter_control_sql);
	
		if (mysqli_num_rows($add_supporter_control) > 0) {
			die('dupl');
		} else {

			$add_supporter_sql = "INSERT INTO supporters
							(
								name,
								surname,
								email,
								password
							)
								VALUES
							(
								'$name',		
								'$surname',	
								'$email',
								'".md5($temp_password)."'
							)";

			$add_member	=	mysqli_query($connection, $add_supporter_sql);
			
			if ($add_member) {
				include(dirname(dirname(dirname(__FILE__))) . "/mail_sender.php");
				die('true');	//Kayıt eklendi.
	        } else {
	            die('false');	//Kayıt eklenemedi.
			}
		}	
	}

	if ($_POST['type'] == 'save_licence_key') {
		
		$licence_key = $_POST['licence_key'];

		$create_licence_sql = "INSERT INTO licence_keys
							(
								licence_key
							) 
								VALUES
							(
								'$licence_key'
							)";

		$add_create_licence	=	mysqli_query( $connection, $create_licence_sql);
	
		if ($add_create_licence) {
			die('true');
		} else {
			die('false');	
		}	
	}
?>