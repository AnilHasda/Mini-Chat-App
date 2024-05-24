<?php
session_start();
?>

<html>
<head>
<meta name="viewport"content="width=device-width,initial-scale=1">
<style type="text/css">
*{
margin:0;
padding:0;
box-sizing:border-box;
}
body{
background:#a0bacc;
display:grid;
place-items:center;
}
input[type="text"]{
margin:10px 0px 10px 0px;
height:30px;
}
input[type="password"]{
margin:10px 0px 10px 0px;
height:30px;
}
form{
color:#fff;
background:#08546c;
height:400px;
width:290px;
padding:80px 0px 0px 50px;
border-radius:1rem;
position:relative;
}
.submit{
height:30px;
width:100px;
border-radius:1rem;
border:none;
background:cyan;
margin:20px 0px 20px 30px;
}
h4{
position:absolute;
top:30;
left:80;
background:red;
height:30px;
width:100px;
text-align:center;
border-radius:10px;
padding-top:5px;
}
a{
color:#fff;
font-size:14px;
}
</style>
</head>
<body>
<form action=""method="post">
<h4>Login-Form</h4>
<label for="user">userName</label><br>
<input type="text"name="user"id="user"placeholder="enter user"required><br>
<label for="pass">password</label><br>
<input type="password"name="pass"id="pass"placeholder="enter password"required><br>
<input type="submit"name="submit"value="log in"class="submit"><br>
haven't account??<a href="createAccount.php">create account</a><br>
<?php
include"connection.php";
$user=$_POST["user"];
$pass=$_POST["pass"];
if(isset($_POST["submit"])){
$qry="select * from createAccount";
$result=mysqli_query($con,$qry);
while($data=mysqli_fetch_assoc($result)){
if($user==$data['Username'] && password_verify($pass,$data["Password"])){
$_SESSION["user"]=$data['Username'];
$_SESSION["pass"]=$pass;
}
}
if($_SESSION["user"]==$user){
echo "<script>window.location.href='createTable.php'</script>";
}
else{
echo "<script>alert('please enter valid username or password');</script>";
}
}
?>
</body>
</html>