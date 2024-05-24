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
background:#000;
}
.form1,.form2{
height:250px;
width:250px;
background:#f1f1f1;
position:absolute;
padding:80px 0px 0px 30px;
margin:20px 0px 0px 60px;
}
#user,#table{
margin:10px 0px 10px 0px;
}
.submit{
}
.main1{
position:absolute;
top:30;
font-size:14px;
}
.form2{
top:300px;
}
.main2{
position:absolute;
top:30;
font-size:14px;
}
</style>
</head>
<body>
<form action=""method="post"class="form1">
<div class="main1"><h4>create chat code<br>note:here new code will be cretated</h4></div>
<input type="hidden"name="user1"id="user1"value="<?php echo $_SESSION["user"]; ?>"required><br>
<label for="table">chat-code</label><br>
<input type="text"name="table"id="table"placeholder="create chat-code"><br><br>
<input type="submit"name="submit"value="start chat"class="submit">
</form>
<?php
include"connection.php";
//for form1
$store1=$_POST["user1"];
$table=$_POST["table"];
if(isset($_POST["submit"])){
$_SESSION["code"]=$table;
$qry="create table $table(
id int not null auto_increment,
username varchar(30),
code varchar(20),
message varchar(200) default null,
date date default current_timestamp,
primary key(id)
)";
$result=mysqli_query($con,$qry);
if($result){
$qr="insert into $table (username,code) values ('$store1','$table')";
$re=mysqli_query($con,$qr);
if($re){
echo "<script>window.location.href='messageBox.php'</script>";
//echo "<script>alert('welcome to dark world')</script>";
}
else{
echo "<script>alert('failed to enter chat')</script>";
}
}
else{
echo "<script>alert('failed to create table')</script>";
}
}

//form1 closed
?>




<form action=""method="post"class="form2">
<div class="main2"><h4> start chat from here<br>note:just enter existing code to start the chat</h4></div>
<input type="hidden"name="user2"id="user2"value="<?php echo $_SESSION["user"]; ?>"required><br>
<label for="table2">chat-code</label><br>
<input type="text"name="table2"id="table2"placeholder="enter existing chat-code"><br><br>
<input type="submit"name="submit2"value="start chat"class="submit2">
</form>
<?php
//form2 start
include "connection.php";
$table2=$_POST["table2"];
if(isset($_POST["submit2"])){
$chkcode="select distinct code from $table2 where code='$table2'";
$rescode=mysqli_query($con,$chkcode);
$count=mysqli_num_rows($rescode);
echo $count;
if($count>0){
$_SESSION["code"]=$table2;
echo "<script>window.location.href='continuePage.php';</script>";
}
else{
echo "<script>alert('please enter the valid code');</script>";
}
}

?>
</body>
</html>