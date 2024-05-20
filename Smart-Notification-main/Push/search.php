<?php include('inc/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
    background-color: whitesmoke;
    font-family: 'Tajawal', sans-serif;
    margin: 0;
    padding: 0;
    background-image: url(ss.gif);
    background-repeat: no-repeat;
    background-size: 100% 100vh;
}
#mother {
    width: 100%;
    font-size: 1px;
}
main {
    float: left;
    padding: 5px;
}
main img {
    position:fixed;
    z-index: -1;
    left: 10rem;
    top: 6rem;
    transform: scale(1.1);
    opacity: 0.0;
    animation-name: im;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-direction: alternate;
}
@keyframes im {
    0%{opacity: 0.0;}
    10%{opacity: 0.1;}
    20%{opacity: 0.2;}
    30%{opacity: 0.3;}
    40%{opacity: 0.4;}
    50%{opacity: 0.5;}
    60%{opacity: 0.6;}
    70%{opacity: 0.7;}
    80%{opacity: 0.8;}
    90%{opacity: 0.9;}
    100%{opacity: 1.0;}
}
#table1{
    border: 3px solid black;
    border-radius: 2%;
    width: 1500px;
    font-size: 22px ;
    padding-right: 5px;
    padding-left: 2px;
    padding-top: 2px;
    padding-bottom: 3px;
    text-align: center;
    text-shadow: 0.3px 0.3px 0.3px black;
}
#table1 th {
    background-color:deepskyblue;
    color: black;
    font-size: 22px;
    padding:10px;
    border: 2.5px solid black;
    box-shadow: 2px 2px 2px black;
}
.form-control{ 
    position: relative;
    display: inline-block;

    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;

}
    </style>
    <title>Admins Edit Page</title>
</head>

<body>
<form action="" method="GET">
				<label for="ser">Search for the user</label>
			<input style="width:500px; margin-left:70px;" type="search" class="form-control" name="ser" id="ser">
			<input style="width:120px; margin-left:70px; margin-top:10px;" type="submit" class="btn btn-info" name="sub" value="Submit">
			</form>



        <main>
            <table id="table1">
                <tr>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Date</th>
                    
                </tr>
                <?php
                if (isset($_GET['sub'])) {
                    $db = mysqli_connect('localhost', 'root', '', 'push_notication');
                    $query=$_GET['ser'];
                
                    $sql = "SELECT * FROM notif WHERE username LIKE '$query'";
                $result = mysqli_query($db, $sql);
                
                while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                 echo "<td>" . $row['notif_msg'] . "</td>";
                 echo "<td>" . $row['notif_time'] . "</td>";
                echo "</tr>";
                }
            }
                ?>
            </table>

        </main>
    </form>
</div>
    
</body>
</html>