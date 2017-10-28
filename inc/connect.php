<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
   
        
        if (strlen(getenv("sqluser")) == 0 || strlen(getenv("sqlpw")) == 0 || strlen(getenv("sqlhost")) == 0 || strlen(getenv("dbname")) == 0){
                
            $dbname = "KaydrianGames";
            $username = 'kaybaum';
            $password = '336';
            $host = 'localhost';
        }
        else{
            $dbname = getenv("dbname");
            $username = getenv("sqluser");
            $password = getenv("sqlpw");
            $host = getenv("sqlhost");
        }
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        ?>
</body>
    
</html>