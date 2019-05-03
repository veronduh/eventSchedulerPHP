<?php


$db = pg_connect('host=localhost dbname=Calendar user=postgres password=password');


    $eventQuery	= "SELECT name FROM event";
	echo "$eventQuery";
    $eventResult = pg_query($eventQuery);
    if (!$eventResult) {
        echo "Problem with query " . $eventQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($eventResult); 
    $eventValue = $myrow[name];

    //echo "$eventValue";
	
	$eventIDQuery	= "SELECT eventid FROM event";
	echo "$eventIDQuery";
    $eventIDResult = pg_query($eventIDQuery);
    if (!$eventIDResult) {
        echo "Problem with query " . $eventIDQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($eventIDResult); 
    $eventIDValue = $myrow[eventid];

    //echo "$eventIDValue";
	
	
	$userQuery = "SELECT userid FROM event";
	echo "$userQuery";
    $userResult = pg_query($userQuery);
    if (!$userResult) {
        echo "Problem with query " . $eventQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($userResult); 
    $userValue = $myrow[userid];

    //echo "$userValue";

	
	$whereQuery	= "SELECT location FROM event";
	echo "$whereQuery";
    $whereResult = pg_query($whereQuery);
    if (!$whereResult) {
        echo "Problem with query " . $whereQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($whereResult); 
    $whereValue = $myrow[location];

    //echo "$whereValue";
	
	
	$dateBeginQuery = "SELECT begins FROM event";
	echo "$dateBeginQuery";
    $dateBeginResult = pg_query($dateBeginQuery);
    if (!$dateBeginResult) {
        echo "Problem with query " . $dateBeginQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($dateBeginResult); 
    $beginValue = $myrow[begins];

    //echo "$beginValue";

	
	$dateEndQuery = "SELECT ends FROM event";
	echo "$dateEndQuery";
    $dateEndResult = pg_query($dateEndQuery);
    if (!$dateEndResult) {
        echo "Problem with query " . $dateEndQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($dateEndResult); 
    $dateEndValue = $myrow[ends];

    //echo "$dateEndValue";
	
	
    $beginTimeQuery = "SELECT starttime FROM event";
	echo "$beginTimeQuery";
    $beginTimeResult = pg_query($beginTimeQuery);
    if (!$beginTimeResult) {
        echo "Problem with query " . $beginTimeQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($beginTimeResult); 
    $beginTimeValue = $myrow[starttime];

    //echo "$beginTimeValue";
	
	
	$endTimeQuery = "SELECT endtime FROM event";
	echo "$endTimeQuery";
    $endTimeResult = pg_query($endTimeQuery);
    if (!$endTimeResult) {
        echo "Problem with query " . $endTimeQuery . "<br/>";
        echo pg_last_error();
        exit();
    }

	$myrow = pg_fetch_assoc($endTimeResult); 
    $endTimeValue = $myrow[endtime];

    //echo "$endTimeValue";
	
	

$to = "jveronda@wvstateu.edu";
$subject = "HTML email";

$message = "<html>
<head>

<title>RSVP to [USER]'s [EVENT_TITLE]?</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"view.css\" media=\"all\">

</head>
<body id=\"main_body\" >
	
	<img id=\"top\" src=\"top.png\" alt=\"\">
	<div id=\"form_container\">
	
		<h1><a>RSVP to [USER]'s [EVENT_TITLE]?</a></h1>
		<form id=\"rsvp_form\" class=\"form_header\"  method=\"post\" action=\"https://stinger.wvstateu.edu/mathProject/php/processRSVP.php\">
					<div class=\"form_description\">
			<h2>RSVP to <?= $userValue ?> 's [EVENT_TITLE]?</h2>
			<p>[USER] is inviting you to their event! Please review the event details below and submit this form, letting [USER] know if you are able to attend the event.</p>
		</div>						
			<ul >
			
					<li class=\"section_break\">
			<h3><img src=\"https://stinger.wvstateu.edu/mathProject/Images/eventbanner.jpg\" alt=\"Event Image Banner\"></h3>
			<p></p>
		</li>		<li class=\"section_break\">
			<h3>Where:
[STREET_ADDRESS]  [CITY] , [STATE] [ZIP]</h3>
			<p></p>
		</li>		<li class=\"section_break\">
			<h3>When:
[BEGIN_TIME] to [END_TIME] EST</h3>
			<p></p>
		</li>		<li id=\"li_special_request\" >
		<label class=\"description\" for=\"special_request\">Are you able to bring [REQUEST_ITEM]? </label>
		<div>
			<input id=\"special_request\" name=\"special_request\" class=\"special_request text medium\" type=\"text\" maxlength=\"255\" value=\"\"/> 
		</div> 
		</li>		<li class=\"section_break\">
			<h3>Attire:
[ATTIRE]</h3>
			<p></p>
		</li>		<li id=\"li_rsvp\" >
		<label class=\"description\" for=\"rsvp\">RSVP </label>
		<span>
			<input id=\"rsvp_yes\" name=\"rsvp_yes\" class=\"element checkbox\" type=\"checkbox\" value=\"1\" />
<label class=\"choice\" for=\"rsvp_yes\">Yes</label>
<input id=\"rsvp_no\" name=\"rsvp_no\" class=\"rsvp checkbox\" type=\"checkbox\" value=\"1\" />
<label class=\"choice\" for=\"rsvp_no\">No</label>

		</span> 
		</li>		<li id=\"li_questions\" >
		<label class=\"description\" for=\"questions\">Questions or Comments? </label>
		<div>
			<input id=\"questions\" name=\"questions\" class=\"questions text medium\" type=\"text\" maxlength=\"255\" value=\"\"/> 
		</div> 
		</li>
			
					<li class=\"buttons\">
			    <input type=\"hidden\" name=\"form_id\" value=\"rsvp_form\" />
			    
				<input id=\"saveForm\" class=\"button_text\" type=\"submit\" name=\"submit\" value=\"Submit\" />
		</li>
			</ul>
		</form>	
		<div id=\"footer\">
			Generated by WVSU CS309 Class
		</div>
	</div>
	</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <jveronda@wvstateu.edu>' . "\r\n";


mail($to,$subject,$message,$headers);
?> 