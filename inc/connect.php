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
        $dbName = "KaydrianGames";
        $username = 'kaybaum';
        $password = '336';
        
        $dbConn = new PDO("mysql:host=localhost;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        //$sql = " SELECT * FROM table_name WHERE id = :id ";
        $sql = " SELECT * FROM game";
        $stmt = $dbConn -> prepare ($sql);
        //$stmt -> execute (  array ( ':id' => '1')  );
        $stmt -> execute ();
        




        ?>
</body>
    
</html>