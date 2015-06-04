<?php 
	require 'vendor/autoload.php';
	use Parse\ParseClient;
	use Parse\ParseUser;
	use Parse\ParseQuery;
	ParseClient::initialize('p2j14hndp186bSPx3Wvab5qbIKypRrtshmXcqgnc', 'h7hGHUj1IulfKW55Dc7HFgtthblt4K5CvzkhIvxV', 's9Y1uBwoCM8UvRliOJbJks00qDoSGS1N6tPQI4TC');
	use Parse\ParseObject;
	use Parse\ParseFile;

	// echo $_GET['subject'];

	$query = new ParseQuery("studyGuide");
	// $query->equalTo("playerName", "Dan Stemkoski");
	$query->equalTo("subject",strval($_GET['subject']));
	$results = $query->find();
	// echo "Successfully retrieved " . count($results) . " scores.";
	// Do something with the returned ParseObject values

	if(count($results) == 0){
			header("Location: index.php");
	}
?>

<html>
	<head>
		<title>TJ Guides</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale = 1.0,maximum-scale=2.0,user-scalable=no">
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="index.php">TJ Guides</a>
		    </div>

		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		      <ul class="nav navbar-nav">
		      	   <li><a href="guides.php?subject=math">Math</a></li>
		      	   <li><a href="guides.php?subject=science">Science</a></li>
		      	   <li><a href="guides.php?subject=socialstudies">Social Studies</a></li>
		      	   <li><a href="guides.php?subject=english">English</a></li>
		      	   <li><a href="guides.php?subject=foreignlanguage">Foreign Language</a></li>
		      	   <li><a href="guides.php?subject=other">Other</a></li>

<!-- 		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Math <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Geometry</a></li>
		            <li><a href="#">Algebra 2/Trig</a></li>
		            <li><a href="#">Precalculus</a></li>
		            <li><a href="#">Calculus AB</a></li>
		            <li><a href="#">Calculus BC</a></li>
		            <li><a href="#">Multivariable Calculus</a></li>
		            <li><a href="#">Linear Algebra</a></li>
		            <li><a href="#">AMT</a></li>
		            <li><a href="#">Differential Equations</a></li>
		          </ul>
        		</li>
        		<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Science<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Biology</a></li>
		            <li><a href="#">Chemistry</a></li>
		            <li><a href="#">Physics</a></li>
		            <li><a href="#">Geosystems</a></li>
		            <li><a href="#">AP Biology</a></li>
		            <li><a href="#">AP Chemistry</a></li>
		            <li><a href="#">AP Physics</a></li>
		            <li><a href="#">DNA Science</a></li>
		            <li><a href="#">Organic Chemistry</a></li>
		            <li><a href="#">Bio-Nanotechnology</a></li>
		          </ul>
        		</li>

        		<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">History<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">World History</a></li>
		            <li><a href="#">AP US History</a></li>
		            <li><a href="#">US/VA History</a></li>
		            <li><a href="#">AP Government</a></li>
		            <li><a href="#">AP European History</a></li>
		            <li><a href="#">Law and Society</a></li>
		            <li><a href="#">Religious Studies</a></li>
		            <li><a href="#">History of Science and Ideas</a></li>
		          </ul>
        		</li>
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">English<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">English 9</a></li>
		            <li><a href="#">English 10</a></li>
		            <li><a href="#">English 11</a></li>
		            <li><a href="#">AP Literature</a></li>
		            <li><a href="#">AP Language</a></li>
		          </ul>
        		</li>
		        <li class="dropdown"><a href="#">Other</a></li> -->

			 </ul>
		     <div class="divider"></div>
		      <ul class="nav navbar-nav navbar-right">
				<?php
					if($_COOKIE["user"] == null) {
	    				echo '<li><a href="login.html">Log in</a></li>';
					    echo '<li><a href="signup.html">Sign up</a></li>';
					} else {

						$query = ParseUser::query();
						$query->equalTo("hashed", strval($_COOKIE["user"])); 
						$results = $query->find();
						$currentUser = $results[0]->get("name");
						
						// $currentUser = ";";
						echo '<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $currentUser . '<span class="caret"></span></a>
		                 <ul class="dropdown-menu" role="menu">
		                 <li><a href="create.php">Post a Study Guide</a></li>
		                 <li><a href="manage.php">Manage Study Guides</a></li>
		                <li><a href="logout.php">Log out</a></li></ul></li>';
					}

					
				?>
		        
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container">
			<div class="page-header">
			<?php
				echo '<h1>' . ucfirst(strval($_GET['subject'])) . ' Study Guides</h1>';
			?>
<!-- 				<h1>Math Study Guides</h1>
 -->			</div>
			<div class="row">
			<?php
			//=====================================================
			//WHAT I NEED TO DO IS ORDER THE GUIDES BY CLASS
			//I ALSO MIGHT NEED TO HARDCODE CLASSES IN THE DROP DOWN
		    //=====================================================

				$query = new ParseQuery("studyGuide");
				// $query->equalTo("playerName", "Dan Stemkoski");
				$query->equalTo("subject",strval($_GET['subject']));
				$results = $query->find();
				// echo "Successfully retrieved " . count($results) . " scores.";
				// Do something with the returned ParseObject values

				if(count($results) > 0){
					for ($i = 0; $i < count($results); $i++) { 
					  $object = $results[$i];
					  echo '<div class="col-md-4">';
					  echo '<div class="panel panel-primary">';
					    echo '<div class="panel-heading">';
					     echo  '<h3 class="panel-title">'. $object->get('title') . '</h3>';
					    echo '</div>';
					   echo '<div class="panel-body">';
					      echo 'Description: ' . $object->get('description');
					      echo '<br><br>';
					      echo 'Class: ' . $object->get('class');
					      echo '<br><br>';
					      echo '<a href="' . $object->get('myfile') . '">Download</a> ';
					    echo '</div>';
					  echo '</div>';
					  echo '</div>';
					  // echo '' . $object->get('title');
					}
				}else{
					header("Location: index.php");
				}
			?>
			</div>
		</div>

		<!-- <section id="footer">

		</section>
 -->
	</body>
</html>


