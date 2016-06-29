<?php
  session_start();

  if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
   echo "<script>
alert('Please login to access!');
window.location.href='Members_Area.php';
</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Food Finder: Home</title>

<!-- Google fonts -->

<link rel="stylesheet" href="main_css.css"/>

<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="assets/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
  </script>

  <script type='text/javascript' src="thebootstrapthemes-restaurant/assets/hotelJS.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?callback=main"
        async defer></script>
</head>

<body>
    <div class="navbar-wrapper" style="padding-bottom:100px">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand">Food Finder</a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                <li><a href="Home.html" >Home</a></li>
                <li><a href="Members_Area.php">Members Area</a></li>
                <li><a href="Finder.html">Finder</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Contact.html">Contact</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<article id="Registration">


<div class="container">

<div class="page-header">
  <h2>Find by Hotel Name</h2>
  <h2>Enter your the name and start searching for the restaurants.</h2>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <script src="validation.js"></script>
        <form id="form1" name="search" action="finder_name.php" method="get" target="_self">
          <div class="col-lg-12">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Hotel Name</label>
                    <div class="input-group">
                        <input class="form-control" name="name" type="name" class="text-field" placeholder="Hotel Name" autofocus required/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <input type="Submit" name="search" value="Search" class="btn btn-info pull-right">
          </div>
        </form>
        <div class="col-lg-12"> 
          <form id="form1" name="logout" action="logout.php" method="post">
              <input type="submit" name="logout" value="Logout" class="btn btn-danger pull-right"> 
          </form>
        </div>
    </div>
</div>
<!-- Registration form - END -->

</div>


</body>
</html>

<?php
define('CSSPATH', 'template/css/'); //define css path

    $cssItem = 'main_css.css'; //css item to display


include('connect_database.php');

$tbl_name="hotels";  
//$item=$_POST['item']; 

	/*if($_REQUEST['item']=='')
	{
		echo "please fill the empty field.";
	}*/

$query="SELECT * FROM $tbl_name WHERE name='".$_GET['name']."'";
$result=mysql_query($query);
$num=mysql_numrows($result);mysql_close();

$i=0;
while ($i < $num) 
{
	$field1=mysql_result($result,$i,"name");
	$field2=mysql_result($result,$i,"item");
	$field3=mysql_result($result,$i,"page_name");
	echo "<center> 
			<b>Hotel:  </b><u>$field1</u><br> 
			<b>Item:  </b><u>$field2</u><br> 
			<b>Visit:  </b><a href=".$field3."><u>$field3</u></a> <br>
			</center>";
	echo "<br>";
	$i++;
}
?>
        