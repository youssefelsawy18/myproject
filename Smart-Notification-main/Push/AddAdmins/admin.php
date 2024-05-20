<?php

    $host='localhost';
    $user='root';
    $pass='';
    $db='push_notication';
    $conn=mysqli_connect($host,$user,$pass,$db);
    $r=mysqli_query($conn,"select * from notif_user ");
    #--------------
    if(isset($_POST['add'])){           
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $ins="insert into notif_user values('','$user','$pass')";
        $r1=mysqli_query($conn,$ins);
        header("location:admin.php");
    }
    if(isset($_POST['del'])){
        $del="delete from notif_user where id='".$_POST["id"]."' ";
        $r2=mysqli_query($conn,$del); 
        header("location:admin.php");
    }
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
    width: 890px;
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
aside{
    position: absolute;
    right: 17%;
    top: 49.5%;
}
.form {
    position: absolute;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 350px;
    height: 510px;
    border: 3px solid black;
    border-radius: 10px;
    transition: 0.5s ease;
    padding: 40px;
    background-color:snow;
}
.form:hover {
    box-shadow: 3px 3px 25px deepskyblue;
}
.logo1 {
    width: 220px;
    height: 220px;
    margin: 0;
    position: relative;
    top: -13%;
    left: -15%;
    bottom: 15%;
    padding: 0;
    transform:rotate(0deg);
    animation-name: logo1;
    animation-duration: 3s;
    animation-iteration-count:infinite;
    animation-direction:alternate;
}
@keyframes logo1 {
    0%{transform:rotate(0deg);}
    100%{transform:rotate(360deg);}
}
.logo1:hover {
    animation-duration: 0s;
}
h2 {
    width: 10%;
    font-size: 40px;
    font-weight: bold;
    letter-spacing: 2px;
    text-align:center;
    margin: 0;
    color: black;
    transition: 0.5s;
    position: relative;
    left: 6%;
    bottom: 21%;
}
h2:hover {
    color: deepskyblue;
}
.inputtext {
    position: relative;
    margin: 20px 0px;
    bottom: 25%;
}
.inputtext input {
    text-align: center;
    width: 100%;
    padding: 10px 0px;
    box-sizing: border-box;
    font-size: 16px;
    outline:none;
    border: none;
    padding-left: 30px;
    border-bottom: 5px solid silver;
    transition: 0.3s;
}
.inputtext input:focus {
    border: 3px solid deepskyblue;
    border-radius: 10px;
}
.btn {
    width: 90%;
    font-size: 16px;
    font-weight: bold;
    border-radius: 15px;
    padding: 5px;
    background: none;
    cursor: pointer;
    transition: 0.5s;
    position:absolute;
    bottom: 15%;
    right: 4%;
}
.btn:hover {
    background: deepskyblue;
    color: black;
}
.btn1 {
    width: 90%;
    font-size: 16px;
    font-weight: bold;
    border-radius: 15px;
    padding: 5px;
    background: none;
    cursor: pointer;
    transition: 0.5s;
    position:absolute;
    bottom: 37%;
    right: 4%;
}
.btn1:hover {
    background:deepskyblue;
    color: black;
}
.inputtext1 {
    position: relative;
    margin: 20px 0px;
    bottom: 15%;
}
.inputtext1 input {
    text-align: center;
    width: 100%;
    padding: 10px 0px;
    box-sizing: border-box;
    font-size: 16px;
    outline:none;
    border: none;
    padding-left: 30px;
    border-bottom: 2px solid silver;
    transition: 0.3s;
}
.inputtext1 input:focus {
    border: 3px solid deepskyblue;
    border-radius: 10px;
}
    </style>
    <title>Admins Edit Page</title>
</head>

<body dir="rtl">

<div id="mother">
    <form method="post">
    <aside>
        <div class="form">
            <img class="logo1" src="../logo.png">
            <h2>AdministrationPanel</h2>
            <div class="inputtext">
                <input type="text" name="user" id="name" placeholder="Username">
            </div>
            <div class="inputtext">
                <input type="text" name="pass" id="pass" placeholder="Password">
            </div>
            <input class="btn1" name="add" type="submit" value="Add">
            <div class="inputtext1">
                <input type="text" name="id" id="id" placeholder="ID">
            </div>
            <input class="btn" name="del" type="submit" value="Delete">
        </div>
    </aside>
<br>
        <main>
            <table id="table1">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    
                </tr>
                <?php
    
                while ($row = mysqli_fetch_array($r)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                 echo "<td>" . $row['username'] . "</td>";
                 echo "<td>" . " ****** " ;"</td>";
                echo "</tr>";
                }
                ?>
            </table>

        </main>
    </form>
</div>
    
</body>
</html>