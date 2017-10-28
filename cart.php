

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
    <h1>Your cart</h1>
    <nav><a href='index.php'>Home</a></nav>
    <div>
        <?php
            $total = 0;
            foreach($_SESSION['cart'] as $key=>$value)
            {
                $total += $value[price]*$value[amount];
                echo "</br>Game: " . $value[name] . " Price: $" . $value[price] . " Amount: " . $value[amount];
            }
            echo "</br>Your total: $$total";
        ?>
    </div>
   
</body>
