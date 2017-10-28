

<head>
    <title> KayDrian Games </title>
    <?php
        include 'inc/connect.php';
        session_start();
    ?>
    <style>
        @import url("css/gameinfo.css");
    </style>
</head>
 
<body>
    <h1>Game info</h1>
     <nav><a href='index.php'>Home</a> <a href='cart.php'>View Cart</a></nav>
    <div>
        <?php
            $gameid = $_GET[gameid];
            $sql = "SELECT name, genre, rating, price, gameid FROM game WHERE gameid = $gameid";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            $price;
            $name;
            $stock = 0;
            echo "Game info: </br>";
            foreach($stmt as $row){
                $price = $row[price];
                $name = $row[name];
                echo  "Name: " . $row[name] . " </br> Genre: " . $row[genre] . " Rating: " . $row[rating] . " Price: $" . $row[price];
            }
            
            $sql = "SELECT inventory.stock, location.city, location.state FROM inventory LEFT JOIN location ON inventory.storeid = location.storeid WHERE gameid = $gameid";
            $stmt = $dbConn -> prepare ($sql);
            $stmt -> execute ();
            
            echo "</br>Available at the following locations: </br>";
            
            echo "<table>";
            echo "<tr><th>Stock</th><th>City</th><th>State</th>";
            foreach($stmt as $row){
                $stock += $row[stock];
                echo  "<tr><td>" . $row[stock] . "</td><td>" . $row[city] . "</td><td>" . $row[state] . "</td>";
            }
            echo "</table>";
            echo "Total Stock: $stock";
        ?>
        <form action='' method='post'>
            <input type="number" name="amount">
            <input type="submit" name="add" value="Add to Cart">
        </form>
        <?php
            if(isset($_POST[add])){
                if($_POST[amount] > $stock){
                    echo "There is not enough games in stock for the selected amount";
                }
                else{
                    $order = array("name" => $name, "price" => $price, "amount" => $_POST[amount]);
                    echo "Added " . $order[name] . " to cart " . $order[amount] . " times";
                    echo "</br>Total price $" . $order[price] * $order[amount];
                    array_push($_SESSION["cart"], $order);
                }
                
            }
        ?>
    </div>
   
</body>
