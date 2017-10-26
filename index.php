

<head>
    <title> KayDrian Games </title>
    <?php
        //include 'inc/functions.php';
    ?>
    <style>
        @import url("css/styles.css");
    </style>
</head>
 
<body>
    <h1>Game store thing</h1>
    <div>
        <form action='' method='post'>
            Enter a price range
            <input type='number' name='min' placeholder='min'>
            <input type='number' name='max' placeholder='max'>
            </br>
            Select Genre: 
            <select name='genre'>
                <option value='none'>Select Genre</option>
                <option value='rpg'>RPG</option>
                <option value='openworld'>Open World</option>
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
            <input type='submit' name='buttonsubmit' value='Find games'/>
        </form>
  
    </div>
    <div>
        
        <?php
        
            if(isset($_POST[buttonsubmit])){ // When you click submit this is what will happen
            
                $sql = "SELECT name, genre, rating, price FROM game WHERE 1";
                //So if no filters are selected we do something like what's above these comments. This just gives us all the games.
                //So for any filter they do pick (the form field isn't empty) we just add AND (condition) to the string above
                //So if the min field isnt empty we just add AND price >= $_POST[min]

                
                if($_POST[min] != ''){ //Checking if a filter is not empty
                    echo "Min selected </br>";
                }
                if($_POST[max] != ''){
                    echo "Max selected </br>";
                }
                if($_POST[genre] != "none"){
                    echo "Genre selected </br>";
                }
                if($_POST[rating] != "none"){
                    echo "Rating selected </br>";
                }
                //Place holder stuffs.. stmt will equal some SQL crap later
                
                $game1=array("name"=>"Kayla's Excellent Adventure","genre"=>"FPS","rating"=>"T");
                $game2=array("name"=>"336 Class","genre"=>"Horror","rating"=>"M");
                $stmt = array($game1, $game2);
                echo "<table>";
                echo "<tr><th>Game name</th><th>Genre</th><th>Rating</th></tr>";
                foreach($stmt as $row){
                    echo  "<tr><td>" . $row[name] . "</td><td>" . $row[genre] . "</td><td>" . $row[rating] . "</td></tr>";
                }
                echo "</table>";
            }
        ?>
    
    </div>
   
</body>
