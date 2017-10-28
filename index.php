

<head>
    <title> Kaydrian Games </title>
    <?php
       $cart = array();
       $_SESSION["cart"] = $cart;
       include 'inc/connect.php';
       session_start();
    ?>
    <style>
        @import url("css/styles.css");
    </style>
</head>
 
<body>
    <h1>KayDrian Games</h1>
    <nav><a href='cart.php'>View Cart</a></nav>
    <div>

        <form action='' method='post'>
            Enter a price range
            <input type='number' name='min' placeholder='min'>
            <input type='number' name='max' placeholder='max'>
            </br>
            Select Genre: 
            <select name='genre'>
                <option value='none'>Select Genre</option>
                <option value='Rpg'>RPG</option>
                <option value='Open World'>Open World</option>
                <option value='simulation'>Simulation</option>
                <option value='adventure'>Adventure</option>
                <option value='sports'>Sports</option>
                <option value='horror'>Horror</option>
                <option value='fps'>FPS</option>
            </select>
            </br>
            Select Rating:
            <select name='rating'>
                <option value='none'>Select Rating</option>
                <option value='M'>M</option>
                <option value='T'>T</option>
                <option value='E'>E</option>
            </select>
            </br>
            Sort price by: 
            </br>
            <input type="radio" name="sort" value="asc"> Ascending price<br>
            <input type="radio" name="sort" value="desc"> Descending price<br>
            <input type='submit' name='buttonsubmit' value='Find games'/>
        </form>
  
    </div>
    <div>
        <?php
            if(isset($_POST[buttonsubmit])){ // When you click submit this is what will happen
            
                $sql = "SELECT name, genre, rating, price, gameid FROM game WHERE 1";
                //So if no filters are selected we do something like what's above these comments. This just gives us all the games.
                //So for any filter they do pick (the form field isn't empty) we just add AND (condition) to the string above
                //So if the min field isnt empty we just add AND price >= $_POST[min]

                
                if($_POST[min] != ""){ //Checking if a filter is not empty
                    echo "Min selected </br>";
                    $sql.=" AND price >= " . $_POST[min];
                }
                if($_POST[max] != ""){
                    echo "Max selected </br>";
                    $sql.=" AND price <= " . $_POST[max];
                }
                if($_POST[genre] != "none"){
                    echo "Genre selected </br>";
                    $sql.=" AND genre = '" . $_POST[genre] ."'";
                }
                if($_POST[rating] != "none"){
                    echo "Rating selected </br>";
                    $sql.=" AND rating = '" . $_POST[rating] ."'";
                }
                if($_POST[sort] == "asc"){
                    $sql.=" ORDER BY price ASC";
                }
                else{
                    $sql.=" ORDER BY price DESC";
                }
                
                //echo $sql;
                
                $game1=array("name"=>"Kayla's Excellent Adventure","genre"=>"FPS","rating"=>"T");
                $game2=array("name"=>"336 Class","genre"=>"Horror","rating"=>"M");
                
                $stmt = $dbConn -> prepare ($sql);
                $stmt -> execute ();
        
                echo "<table>";
                echo "<tr><th>Game name</th><th>Genre</th><th>Rating</th><th>Price</th><th>Info</th></tr>";
                foreach($stmt as $row){
                    $gameid = $row[gameid];
                    $link = "<a href='gamepage.php?gameid=$gameid'>Click for info</a>";
                    echo  "<tr><td>" . $row[name] . "</td><td>" . $row[genre] . "</td><td>" . $row[rating] . "</td><td>$" . $row[price] . "</td><td>$link</td></tr>";
                }
                echo "</table>";
            }
        ?>
    
    </div>
   
</body>
