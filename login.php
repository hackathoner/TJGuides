		<?php
			require 'vendor/autoload.php';
			use Parse\ParseClient;
			ParseClient::initialize('p2j14hndp186bSPx3Wvab5qbIKypRrtshmXcqgnc', 'h7hGHUj1IulfKW55Dc7HFgtthblt4K5CvzkhIvxV', 's9Y1uBwoCM8UvRliOJbJks00qDoSGS1N6tPQI4TC');
			use Parse\ParseObject;
			use Parse\ParseUser;
			use Parse\ParseException;
			// use ParseUser;



			$email = $_POST["email"];
			$password = $_POST["password"];
			function login() {
				$email = $_POST["email"];
				$password = $_POST["password"];
				try {
					  $user = ParseUser::logIn($email, $password);
					  if($user->get("emailVerified")) {
					  	setcookie("user", sha1($email), time() + (86400 * 30),'/');
					  	header( "Location: index.php" );
					  	echo 'ye';

					  }else {
					  	header( "Location: login.html" );
					  	echo "Please verify your email";
					  }
				} catch (ParseException $error) {
						$myerror = strval($error);
						$myerror = substr($myerror, strrpos($myerror, "message '") + 9, strrpos($myerror, " in") - strrpos($myerror, "message '") - 10 );
						echo "<br><br>" . $myerror;
				}
			}

			if(isset($_POST['submit']))
			{
				if(strlen($email) < 1 || strlen($password) < 1) {
					echo "Please properly fill out all fields";
				}else {
					login();
				}
			} 
			
		?>