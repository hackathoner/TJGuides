<?php 
	if($_COOKIE["user"] == null) {
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
		<script src="js/scripts.js"></script>
		<script>
			$(document).ready(function() {
			    $(".dropdown-menu li a").click(function(){
				  var selText = $(this).text();
				  console.log(selText);
				  document.getElementById("myb").innerHTML = selText;
				  
				});
			});
		</script>
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

		        <!-- <li class="dropdown">
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
					require 'vendor/autoload.php';
					use Parse\ParseClient;
					use Parse\ParseUser;
					use Parse\ParseQuery;
					ParseClient::initialize('p2j14hndp186bSPx3Wvab5qbIKypRrtshmXcqgnc', 'h7hGHUj1IulfKW55Dc7HFgtthblt4K5CvzkhIvxV', 's9Y1uBwoCM8UvRliOJbJks00qDoSGS1N6tPQI4TC');
					use Parse\ParseObject;
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
		<form class="form-horizontal" enctype="multipart/form-data" method="post" action="createGuide.php" >
		  <fieldset  class="col-md-6 col-md-offset-3">
		    <legend>Post a New Study Guide</legend>
		    <div class="form-group">
		        <input type="text" style="margin-top:0px"class="form-control"  name="Title" id="Title" placeholder="Title">
		        <textarea class="form-control" rows="3" name="Description" id="Description" placeholder="Description"></textarea>
		        

				<!-- <div class="dropdown">
				  <button style="margin-top:20px; margin-bottom:20px;"class="btn btn-default dropdown-toggle col-xs-12 swag3" id="myb" name="subject" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				    Choose Subject
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" id="subject" role="menu" name="subject" aria-labelledby="dropdownMenu2">
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Math</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Science</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Social Studies</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">English</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Other</a></li>
				  </ul>
				</div>
				<div>

				</div> -->

				<select name="subject" id="subject" class="col-xs-12">
					  <option value="math">Math</option>
					  <option value="science">Science</option>
					  <option value="socialstudies">Social Studies</option>
					  <option value="english">English</option>
					  <option value="foreign language">Foreign Language</option>
					  <option value="other">Other</option>
				</select>
				<input type="text" class="form-control" style="margin-top:10px;"name="class" id="class" placeholder="Enter name of class">
		        <input type="file" class="form-control" name="myfile" id="myfile">
		        <input type="submit" class="form-control btn btn-primary" name="submit" id="submit">
		        <!-- PUSH THE CREATED POST TO PARSE -->

		    </div>
		  </fieldset>
		</form>


		</div>

		<!-- <section id="footer">

		</section>
 -->
	</body>
</html>

			

