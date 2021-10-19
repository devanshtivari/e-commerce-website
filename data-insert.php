<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "products");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $price = $_REQUEST['Price'];
        $desc =  $_REQUEST['Description'];
        $date = $_REQUEST['date'];
        $stars = $_REQUEST['stars'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO items  VALUES ('$name', 
            '$price','$desc','$date','$stars')";
          
        if(mysqli_query($conn, $sql)){
            ?>
            <script type="text/javascript">
            window.location.replace("index.html");
            </script>
            <?php

        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
        </center>
</body>
  
</html>