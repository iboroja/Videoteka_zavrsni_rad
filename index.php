<!DOCTYPE html>
<!--
/*****************************************************************/
        Igor Boroja
/*****************************************************************/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PROGRAMER INTERNET APLIKACIJA PHP I MYSQL
			SEMINARSKI RAD
	</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


  </head>
  <body>
  	<div class="container">
		<?php

		include("db_connection.php");
		error_reporting(E_ALL ^ E_NOTICE);
		

		$slova = "A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | R | S | T | U | V | Z";

		$slova_array = explode(" | ", $slova);

		foreach($slova_array as $key => $val)
		{
			echo '<a href="index.php?slovo='.$val.'">'.$val.'</a> | ';
		}

		if(isset($_GET["slovo"]))
		{
			$slovo = $_GET["slovo"];
			
			$query = "SELECT 
			 		  naslov, godina, trajanje, id ,
		              CONCAT(path, name_server) AS file_server
					  FROM filmovi
					  WHERE naslov LIKE '$slovo%'
					  ORDER BY naslov ASC";
					  
			$result = mysql_query($query);
			
			while($row = mysql_fetch_array($result))
			{
				$slika       = $row["file_server"];
				$naziv       = $row["naslov"];
				$trajanje    = $row["trajanje"];
				$godina      = $row["godina"];
				$id 		 = $row["id"];
				
				    if ($id !== 0) {

					    echo 	"<br><br><br><br><br>";
						echo	'<img src = '.$slika.' alt="" width="100">';
						echo    "<br><br>";
						echo    $naziv." (".$godina. ")";
						echo    "<br>";
						echo    'Trajanje: '.$trajanje.' min';
						echo    '<br>';
				
					}else{
						echo 	"<br>";	
						echo 	"<h4>Nema unešenog filma pod tim slovom</h4>";
					}	
		    }
		}	
			
		?>
		
		<br><br><br><br><br>
		<div class="unos">
		<a href="unos.php"><i class="fa fa-pencil-square-o fa-2x"></i> Unos novog filma</a>
		</div>
  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>