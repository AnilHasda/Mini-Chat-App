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
background:#fff;
}
form{
position:fixed;
height:200px;
width:100%;
top:90%;
padding:0px 0px 20px 30px;
}
.message{
height:30px;
width:180px;
border:none;
outline:none;
background:#f1f1f1;
border-radius:1rem;
padding:5px 0px 0px 5px;
}
.submit{
height:30px;
width:100px;
background:#f1f1f1;
margin:0px 0px 0px 10px;
border:none;
position:absolute;
}
.heading{
background:#000;
color:#fff;
height:40px;
position:sticky;
top:0;
display:grid;
place-items:center;
}
#message,#otherMessage{
margin:5px 0px 10px 0px;
height:auto;
max-width:150px;
text-align:center;
border-radius:1rem;
z-index:-1;
}
#message{
position:relative;
background:#006AFF;
border:10px solid #006AFF;
color:#fff;
left:200px;
}
#otherMessage{
position:relative;
background:#f1f1f1;
border:10px solid #f1f1f1;
}
.reserve{
height:100px;
width:100%;
background:#fff;
position:ralative;
}
.image{
height:30px;
width:30px;
border-radius:50%;
position:relative;
margin:10px;
z-index:-1;
}
.container{
display:flex;
}
.heading a{
text-decoration:none;
position:absolute;
left:290px;
color:gold;
}
</style>
</head>
<body>
<div class="heading"><h4>Chat Application</h4><a href="logOut.php">log out</a></div>
<form method='post'>
  <textarea name='message'placeholder='Type a message...'class='message'required></textarea><input type='submit'name='submit'value='send'class='submit'>
  </form>
<?php
include"connection.php";
 $table=$_SESSION["code"];
 $user=$_SESSION["user"];
 $message=$_POST["message"];
 $display="select * from $table";
 $qr=mysqli_query($con,$display);
 while($data=mysqli_fetch_array($qr)){
 echo "<script>window.scrollTo(0,2000)</script>";
 if($data["username"]==$user && $data["message"]!=null){
 ?>
 <div id="message"><?php echo $data["message"]; ?></div>
 <?php
 }
 else{
 $img=$data["username"];
 $imgqry="select profile from createAccount where Username='$img'";
 $final=mysqli_query($con,$imgqry);
 if($final){
 $ftc=mysqli_fetch_array($final);
 $f=$ftc["profile"];
 }
 if($data["message"]!=null){
 ?>
 <div class="container"><div class="image"style="background:url('<?php echo $f; ?>');background-size:100%;background-repeat:no-repeat;"></div><div id="otherMessage"><?php echo $data["message"]; ?></div></div>
 <?php
 }
 }
 }
  echo "<div class='reserve'></div>";
 if(isset($_POST["submit"])){echo "<script>window.scrollTo(0,2000)</script>";
 $query="insert into $table (username,code,message) values('$user','$table','$message')";
 $result=mysqli_query($con,$query);
 if($result){
 echo "<script>window.location.href='messageBox.php';</script>";
 }
 else{
 "<script>alert('data is not inserted');</script>";
 }
 }
 echo "<script>window.scrollTo(0,2000)</script>";
 ?>

<script>
</script>
</body>
</html>