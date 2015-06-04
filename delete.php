<?php
	require 'vendor/autoload.php';
	use Parse\ParseClient;
	use Parse\ParseUser;
	use Parse\ParseQuery;
	ParseClient::initialize('p2j14hndp186bSPx3Wvab5qbIKypRrtshmXcqgnc', 'h7hGHUj1IulfKW55Dc7HFgtthblt4K5CvzkhIvxV', 's9Y1uBwoCM8UvRliOJbJks00qDoSGS1N6tPQI4TC');
	use Parse\ParseObject;

	$theid = $_GET['id'];
	$mquery = new ParseQuery("studyGuide");
	$mquery->equalTo("objectId", strval($theid));
	$mresults = $mquery->find();
	$mresults[0]->destroy();
	header("Location: manage.php");
	// echo $theid;
?>