<?php

/*****************************************************************/
        //Igor Boroja
/*****************************************************************/

include ("db_connection.php");
define("PATH", "doc/");

error_reporting(E_ALL ^ E_NOTICE);

if(isset($_GET["brisi"]) && $_GET["brisi"] == 1)
{
        $naslov = $_GET["naslov"];
       
        $query = "DELETE FROM filmovi WHERE naslov='$naslov ' LIMIT 1";
        $result = mysql_query($query);
       
        if($result)
        {
                //echo '<p>Film je obrisan </p>';
        }
        else
        {
                echo '<p>Pogreška kod brisanja</p>';
        }
}

if(isset($_POST["btn_save"]))

{
    
    $naslov      = $_POST ["naslov"];
    $zanr        = $_POST ["naziv"];
    $godina      = $_POST ["godina"];
    $trajanje    = $_POST ["vrijeme_traj"];

    $name     = $_FILES["datoteka"]["name"];
    $tmp_name = $_FILES["datoteka"]["tmp_name"];
    $size     = $_FILES["datoteka"]["size"];
    $error    = $_FILES["datoteka"]["error"];
    $type     = $_FILES["datoteka"]["type"];
    
    if($error == 0)
    {
        $name_array = explode(".", $name);
        
        $ext = end($name_array);
        
        $new_name = "doc_".time().".".$ext."";
        
        if(move_uploaded_file($tmp_name, PATH.$new_name))
        {
            $query = "INSERT INTO filmovi
                      (path, name, name_server, naslov, id_zanr, godina, trajanje )
                      VALUES
                      ('".PATH."', '$name', '$new_name', '$naslov', '$zanr', '$godina', '$trajanje')";
            
            
            $result = mysql_query($query);
            
            if($result)
            {               
                #header("Location: index.php");
                echo 'Datoteka uspješno pohranjena';
            }
            else
            {
                unlink(PATH.$new_name); 
                echo 'Pogreska kod pohrane datoteke';
            }       
        }
        else
        {
            echo 'Problem u spremanju datoteke';
        }
    }
    else
    {
        echo 'Problem u uploadu datoteke';
    }
}    

echo '
    <!DOCTYPE html>
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
    <br><br>
    <a href="index.php"> <i class="fa fa-backward"></i> 
    Povratak na početnu stranicu</a><br><br><br>
    <form method="POST" action="" enctype="multipart/form-data">
    <table border="1" align="center">
    <thead>
        
        <tr>
            <th>Naslov:</th>
            <td><input type= "text", name="naslov" value=""/></td>
        </tr>
<tr>
            <th>Žanr:</th>
            <td><select name="naziv">
            <option value="">Odaberite žanr:</option>';
            
            $query  = "SELECT id, naziv
                       FROM zanr
                       ORDER BY naziv ASC";
                       
            $result = mysql_query($query) or die(mysql_error());
            while($row = mysql_fetch_array($result))
        {
            $id_zanra  = $row["id"];
            $naziv_zanra = $row ["naziv"];
            echo '<option value="'.$id_zanra.'">'.$naziv_zanra.'</option>';
        }           
        
    echo'   
        <tr>
            <th>Godina:</th>
            <td><select name="godina">
            <option value="">Odaberite godinu:</option>';
        
         for($i=1900; $i<=date("Y"); $i++) 
         {
            echo '<option value="'.$i.'">'.$i.'</option>';
         }

            
    echo'
        <tr>
            <th>Trajanje:</th>
            <td><input type= "text", name="vrijeme_traj" value=""/></td>
        </tr>';
    
    echo'
        <tr>
        <th>Slika:</th>
         <td>
        <input type="file" name="datoteka" value="" />
    </td>
    </tr>';
        
    echo'
        <tr>
            <th>Gumb:</th>
            <td><input type="submit" name="btn_save" value="Spremi" /></td>
        </tr>
    </thead>
</tbody>
</form>';

    echo'
<table border="1" align="center">
        <thead>
                <tr>
                        <th>Slika</th>
                        <th>Naslov filma</th>
                        <th>Godina</th>
                        <th>Trajanje</th>
                        <th>Akcija</th>
                </tr>
        </thead>
        <tbody>';
            

    $query = "SELECT
                        naslov, godina, trajanje, 
                        CONCAT(path, name_server) AS file_server
                        FROM filmovi
                        ORDER BY naslov ASC";
       
        $result = mysql_query($query);
       
        while($row = mysql_fetch_array($result))
        {
                $slika      = $row["file_server"];
                $naslov     = $row["naslov"];
                $godina     = $row["godina"];
                $trajanje   = $row["trajanje"];
               
               
        echo'
                <br>
                <tr>
                        <td><img src = '.$slika.' alt="" width="100"></td>
                        <td>'.$naslov.'</td>
                        <td>'.$godina.'</td>
                        <td>'.$trajanje.' min</td>
                        <td>
                        <a href="?naslov='.$naslov.'&brisi=1" onclick="return confirm(\'Da li ste sigurni?\')"><i class="fa fa-eraser"></i>
                         Obriši</a>
                        </td>
                </tr>';
               
                }
               
        echo'
        </tbody>       
</table>';          
?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>