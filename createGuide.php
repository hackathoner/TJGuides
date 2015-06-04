<?php
	require 'vendor/autoload.php';
	use Parse\ParseClient;
	use Parse\ParseUser;
	use Parse\ParseQuery;
	ParseClient::initialize('p2j14hndp186bSPx3Wvab5qbIKypRrtshmXcqgnc', 'h7hGHUj1IulfKW55Dc7HFgtthblt4K5CvzkhIvxV', 's9Y1uBwoCM8UvRliOJbJks00qDoSGS1N6tPQI4TC');
	use Parse\ParseObject;
	use Parse\ParseFile;

	

				
			$uploaddir = 'files/';
			$uploadfile = $uploaddir . basename($_FILES['myfile']['name']);
			echo '<br><br>' . $uploadfile;
			echo '<pre>';
			$stringToCheck = strval(basename($_FILES['myfile']['name']));
			echo $_FILES['myfile']['name'];
			if(strpos($stringToCheck,'.docx') == false && strpos($stringToCheck,'.doc') == false && strpos($stringToCheck,'.pdf') == false){
				echo "Sorry, the file was not uploaded because it wasn't a doc/docx/pdf";

			}else{
				if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {
				    // echo "File is valid, and was successfully uploaded.\n";
				    
				    $query = ParseUser::query();
				    $query->equalTo("hashed", strval($_COOKIE["user"])); 
				    $results = $query->find();
				    $currentUser = $results[0]->get("email");

				    $subject = $_POST["subject"];
				    $class = $_POST["class"];
				    $file = $_POST["file"];
				    // echo $subject;
				    // echo $class;
				    // echo $chapter;
				    // echo $subject;
				    $file = preg_replace('/\s+/', '%20', $file);



				    // echo $subject;
				    // echo $class;
				    // echo $chapter;

				    $studyguide = new ParseObject("studyGuide");
				    $studyguide->set("subject", $subject);
				    $studyguide->set("class", $$class);
				    $studyguide->set("title", $_POST["Title"]);
				    $studyguide->set("description", $_POST["Description"]);
				    // $studyguide->set("chapter", $subject);
				    $studyguide->set("myfile", strval($uploadfile));
				    $studyguide->set("user", $currentUser);
				    $studyguide->set("userhash", sha1($currentUser));

				    $studyguide->save();
				} else {
				    echo "Possible file upload attack!\n";
				}

				echo 'Here is some more debugging info:';
				print_r($_FILES);

				print "</pre>";

				header("Location: index.php");
			}







	// header("Location: index.php");

?>