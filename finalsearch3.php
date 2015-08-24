<!DOCTYPE html>
<html>
<head>
<title> Results </title>

<link href="column3.css" rel="stylesheet" type="text/css">
<style>
.btn {
	align:left;
  font-family: Helvetica;
  color: #ffffff;
  border-radius: 39px;
  font-size: 14px;
  background: #3498db;
  padding: 2px 2px 2px 2px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  text-decoration: none;
}

::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #DFFFFF;
}

	.head{background-color: white; color: blue;text-align: center; padding: 1px; border-style: solid;
  border-width: 4px;
  border-color:white;
  border-bottom-color: blue;

 } 
		h1{font-size: 70px;} 
		h3{color: blue; text-align: center;} 
		.main{background-color: white; width: 100%;}
	.middle{background-color: white; color: blue; text-align: left; width: 100%; margin-top: 3px;}
	.piece{border-radius: 2px;padding: 2% 0 0 0; font-size: 18px; float: left; width: 100%; font-family:Helvetica;}
	.table{border: none;}
	.sidebar1{padding: 5% 0 0 0;}
a:link {
    	color: #00CCFF;
	}

	/* visited link */
	a:visited {
   	color: #00CCFF;
	}

	/* mouse over link */
	a:hover {
    	color: blue;
}

#footer {background: white;clear: both;min-height: 40px;width: 100%;font-family:Helvetica, Arial, Sans-serif;color:#00CCFF ;text-align:center;
  	border-style: solid;border-width: 4px;border-color:white;border-top-color: blue;}
	</style>
</head>
<body class="main">
	<header class="head">
		<img src="Dom/twitterpeeklogo2.gif"alt="Tweet" align ="center"  style="width:578px;height:203px">
	</header>
	

<?php
//iframe {
// border-color: #eee #ddd #bbb;
//  border-radius: 5px;
//  border-style: solid;
//  border-width: 1px;
//  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
//  margin: 10px 5px;
//  max-width: 468px;
//}
	$servername = "danu6.it.nuigalway.ie";
	$username = "mydb1863u";
	$password = "mydb1863u";
	$dbname = "mydb1863";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$term = htmlspecialchars($_POST['idnumber3']);
		$sql="SELECT popularity2, id, raw_json FROM twitter_statuses WHERE raw_json LIKE '%" . $term . "%' ORDER BY popularity2 DESC LIMIT 5";
		$results = array();
		$pop = array();
		$result = $conn->query($sql);
		if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
	//	$id_tweet = ($row["id"]); //Creates id_num variable which contains id number of relevant tweet
		$file = $row["raw_json"];
		$obj = json_decode($file, true); //'$obj' is a variable which contains entire JSON data
		$return = $obj['user'];
	//	$value1 = $return['listed_count'];
	//	$value2 = $return['followers_count'];
	//	$value3 = $return['friends_count'];
	//	$value4 = $row['id'];
	//	$total = (($value1*(0.6) + $value2*(0.2) + $value3*(0.2)) * 10);
	//	$return2 = $obj['entities'];
	//	$print1 = ($obj['text']);
	//	$print2 = ($return['screen_name']);
	//	$print3 = ($row['id']);
		$print4 = ($row['popularity2']);
	//	echo '<br>';
	//	echo 'Results of Searched Term : ';
	//	echo '<br>';
	//	echo 'Tweet Text - ';
	//	print_r ($print1);
	//	echo '<br>';
	//	echo 'User Name - ';
	//	print_r ($print2);
	//	echo '<br>';
	//	echo 'ID ';
	//	print_r ($print3);
	//	echo '<br>';
	//	echo 'Popularity Score ';
	//	print_r ($print4);
	//	echo '<br>';
	
		//New Sample code for Iframe output - Niall
		$textObject = $obj['text']; //know correct
		$authNameObject = $return['name'];
		$authUsernameObject = $return['screen_name']; //know correct
		
		$idStrObject = $obj['id_str'];
	//	print_r ($idStrObject);
	//	echo '<br>';
	//	print_r ($authUsernameObject);
		echo '<br>';
		$urlObject = "http://twitframe.com/show?url=https://twitter.com/$authUsernameObject/status/$idStrObject";
		
		$results[] = $urlObject;
		$pop[] = $print4;
		// echo "<div class='pop'>";
		// echo "$print4";
		// echo "</div>";
		
	}
	}
else {
    header("Location: http://danu6.it.nuigalway.ie/twitterpeek/error.html");
}
		$conn->close();
?>

<div align="center"><br> 
<table style="width: 60%" "height:100%" cellspacing="0" cellpadding="0"><tr>
<button align="top" class="btn" onclick="history.go(-1);" style="position:absolute; left:20px; top:250px; padding:5px;">Return To Search</button></tr>
<?php foreach($results as $result=>$value): ?> <tr> <td>
<div id="out" align="top" style="position:relative; left:60px; top:-80px;">
<iframe id="tweet" border="0" frameborder="0" height="300px" width="550px" scrolling="yes"
 src="<?= $value ?>" onload="test();"></iframe>
 </div> 
 <?php endforeach; ?> </td> </tr> <td> <tr>
 <img src="Images/star1.PNG" height="150" width="150" align="right" style="position:absolute; top:280px; right:80px;"> </tr>
 <tr> <img src="Images/star2.PNG" height="150" width="150" align="right" style="position:absolute; top:600px; right:80px;">
 </tr> <tr> <img src="Images/star3.PNG" height="150" width="150" align="right" style="position:absolute; top:900px; right:80px;">
 </tr> <tr> <img src="Images/star4.PNG" height="150" width="150" align="right" style="position:absolute; top:1200px; right:80px;">
 </tr> <tr> <img src="Images/star5.PNG" height="150" width="150" align="right" style="position:absolute; top:1500px; right:80px;">
 </tr></td>
</table>
</div>
<div id="footer" align = "center">

	<a href="aboutTP.html"style="text-decoration: none">About Twitter Peek</a><br>
        <A href="references.html"style="text-decoration: none">References</A>
	
    

	<p> Copyright Twitter Peek © 2014</p>

</div><!--footer-->


</html>