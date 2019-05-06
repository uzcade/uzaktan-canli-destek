<?php 
	require $config['init'];
	
	if ($_POST["type"] == "register") {

		$name			=	trim($_POST['name']);
		$surname		=	trim($_POST['surname']);
		$email			=	trim($_POST['email']);
		$telephone		=	trim($_POST['telephone']);
		$licence_key	=	trim($_POST['licence_key']);

		$temp_password  =   rand(100000, 999999);

		$licence_key_control_sql = mysqli_query( $connection, "SELECT * FROM licence_keys WHERE licence_key = '$licence_key' AND state = 0");
		
		if (mysqli_num_rows($licence_key_control_sql) > 0) {

			$licence_key_control_data = mysqli_fetch_array($licence_key_control_sql);
			$licence_id = $licence_key_control_data['id'];

			$register_sql	=	mysqli_query( $connection, "SELECT email FROM customers WHERE email = '$email'");
			$register_data  = mysqli_fetch_array($register_sql);

			if (mysqli_num_rows($register_sql) > 0) {
				
				die('duplicate');
			} else {

				$add_customer_sql	=	mysqli_query($connection, "INSERT INTO customers
					(
						name,
						surname,
						password,
						email, 
						telephone,
						licence_id
					) 
						VALUES
					(
						'$name',		
						'$surname',
						'".md5($temp_password)."',
						'$email',
						'$telephone',
						'$licence_id'
					)");

				if ($add_customer_sql) {

					$licence_update = mysqli_query($connection,"UPDATE licence_keys SET state = 1 WHERE id = '$licence_id'");
					
					//die(base_url('send/mail?name='.$name.'&surname='.$surname.'&password='.$temp_password.'&email='.$email));
					include(dirname(dirname(__FILE__)) . "/mail_sender.php");
					die("ok");
				}
			}

		} else {
			die('error');
		}
	}

	if ($_POST["type"] == "login") {

		$email		=	trim($_POST['email']);
		$password	=	md5(trim($_POST['password']));
		
		$customer_sql	=	mysqli_query( $connection, "SELECT * FROM customers 
			WHERE 
			email = '$email'
			AND
			password = '$password' "
		);

		$support_sql	=	mysqli_query( $connection, "SELECT * FROM supporters 
				WHERE 
				email = '$email'
				AND
				password = '".md5(trim($_POST['password']))."'"
			);

		$admin_sql	=	mysqli_query( $connection, "SELECT * FROM admin 
				WHERE 
				email = '$email'
				AND
				password = '".md5(trim($_POST['password']))."'"
			);

		if (mysqli_num_rows($customer_sql) > 0){

			$data = mysqli_fetch_array($customer_sql);

			$_SESSION['customer_session_control'] = true;
			$_SESSION['customer_id'] = $data['id'];
			$_SESSION['customer_name'] = $data['name']." ".$data['surname'];

			//header("Location:".base_url('panel/customer'));
			die(base_url('panel/customer'));
	    } else {
	    	
			if (mysqli_num_rows($support_sql) > 0){
				$data = mysqli_fetch_array($support_sql);
				
				$_SESSION['supporter_session_control'] = true;
				$_SESSION['supporter_id'] = $data['id'];
				$_SESSION['supporter_name'] = $data['name']." ".$data['surname'];	
				
				//header("Location:".base_url('panel/supporter'));
				die(base_url('panel/supporter'));
		    } else {
		    	if (mysqli_num_rows($admin_sql) > 0){
					
					$data = mysqli_fetch_array($admin_sql);
					
					$_SESSION['admin_session_control'] = true;
					$_SESSION['admin_id'] = $data['id'];
					$_SESSION['admin_name'] = $data['name']." ".$data['surname'];	
					
					//header("Location:".base_url('panel/admin'));
					die(base_url('panel/admin'));
			    }else {		
			    	//header("Location:".base_url('login?state=false'));
			    	die("error");
			    }
		    }
		}
	}

?>