<?php
				require 'vendor/autoload.php';
				use Parse\ParseClient;
				ParseClient::initialize('p2j14hndp186bSPx3Wvab5qbIKypRrtshmXcqgnc', 'h7hGHUj1IulfKW55Dc7HFgtthblt4K5CvzkhIvxV', 's9Y1uBwoCM8UvRliOJbJks00qDoSGS1N6tPQI4TC');
				use Parse\ParseObject;
				use Parse\ParseUser;
				// use ParseUser;

			
				function register() {
					$name = $_POST["name"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					if(strlen($password)<6){
						echo '<br>Please make sure your password is at least 6 characters in length';
					}
					else if(strlen($name)<1){
						echo '<br>Please do not leave the name field empty';
					}
					else if(strlen($email)<1 || strpos($email,"@tjhsst.edu") == false){
						echo '<br>Please make sure you enter a valid TJ email address';
					}else {
						$user = new ParseUser();
						$user->set("username", $email);
						$user->set("password", $password);
						$user->set("email", $email);
						$user->set("name", $name);
						$user->set("hashed", sha1($email));

						try {
							  $user->signUp();
						} catch (ParseException $ex) {
							  echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
							}
						}
				}

				if(isset($_POST['submit']))
				{
					register();
				} 
				
			?>