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
color:red;
}
.main{
height:200px;
width:200px;
background:#o22534;
color:gray;
text-align:center;
border:2px solid #fff;
box-shadow:2px 2px 2px #f1f1f1,
           -2px -2px 2px #f1f1f1;
margin:20px 0px 0px 80px;
}
h4{
padding-top:20px;
}
.submit{
margin-top:10px;
}
</style>
</head>
<body>
<div class="main">Messages are end to end encrypted.No one outside of the chat can read to them.<h4>click here to continue</h4>
<form action="messageBox.php"method="post">
<input type="hidden"name="user2"id="user2"value="<?php echo $user2; ?>"placeholder="enter user-name"required>
<input type="submit"value="continue"class="submit">
</form>
</div>
<?php
/*include"connection.php";
$user2=$_POST["user2"];
$table2=$_POST["table2"];
$qry="select distinct Username from createAccount where Username='$user2'";
$result=mysqli_query($con,$qry);
$row=mysqli_num_rows($result);
if($row>0){
$qrycode="select distinct code from $table2 where code='$table2'";
$resultcode=mysqli_query($con,$qrycode);
$rowcode=mysqli_num_rows($resultcode);
if($rowcode>0){
?>
/*<?php
}
else{
echo "<script>alert('please enter valid code');window.location.href='createTable.php';</script>";
}

}
else{
echo "<script>alert('please enter the valid username');</script>";
echo "<script>window.location.href='createTable.php';</script>";
}*/
?>

</body>
</html>