<?php 
	if (isset($_POST['sub'])){
		require 'dbh.inc.php';

		$first = $_POST['first'];
		$last = $_POST['last'];
		$uid = $_POST['uid'];
		$mail = $_POST['mail'];
		$pwd = $_POST['pwd'];
		$pwdr = $_POST['pwdr'];

		if (empty($first) || empty($last) || empty($uid) || empty($mail) || empty($pwd) || empty($pwdr)){
			header("Location: ../index.php?error=emptyfields");
			exit();
		}
			else{
				if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../index.php?error=invalidemail");
				exit();
				}
				else{
					if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
						header("Location: ../index.php?error=name");
						exit();
					}
					else{
						if($pwd !== $pwdr){
						header("Location: ../index.php?error=pwdmatch");
						exit();
						}


					}
				
				}	
			}
			$sql = "INSERT INTO users (first_name, last_name, uidUsers, mailUsers, pwdUsers) VALUES (?,?,?,?,?)";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../index.php?error=mysqli");
			}else{
				mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $uid, $mail, $pwd);
				mysqli_stmt_execute($stmt);

				header("Location: ../index.php?signup=success");
				exit();
			}

			

	
	}
	else{
		header("Location: ../index.php?error=mysqlierror");
		exit();
	}
	