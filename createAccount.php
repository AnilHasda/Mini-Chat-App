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
display:grid;
place-items:center;
background:#a0bacc;
}
form{
color:#fff;
background:#08546c;
height:550px;
width:300px;
border-radius:1rem;
padding:50px 0px 0px 60px;
position:relative;
}
input[type="file"],input[type="text"],input[type="password"],input[type="email"]{
margin:10px 0px 10px 0px;
outline:none;
}
h4{
position:absolute;
top:15;
left:70;
background:red;
height:30px;
width:150px;
text-align:center;
border-radius:10px;
padding-top:5px;
}
.submit{
height:30px;
width:100px;
border-radius:.5rem;
border:none;
background:;
margin:10px 0px 20px 30px;
}
</style>
</head>
<body>
<form action=""method="post"enctype="multipart/form-data">
<h4>create an account</h4>
<label for="fname">First Name</label><br>
<input type="text"id="fname"name="fname"placeholder="enter first name"required><br>

<label for="lname">Last Name</label><br>
<input type="text"id="lname"name="lname"placeholder="eneter last name"required><br>

<label for="user">User Name</label><br>
<input type="text"id="user"name="user"placeholder="enter user name"required><br>

<label for="email">Email</label><br>
<input type="email"id="email"name="email"placeholder="enter email"required><br>

<label for="password">Password</label><br>
<input type="password"id="password"name="password"placeholder="enter password"required><br>

<label for="cpassword">confirm-Password</label><br>
<input type="password"id="cpassword"name="cpassword"placeholder="retype password"required><br>

<label for="file">select profile</label><br>
<input type="file"name="img"id="file"required><br>
<input type="submit"name="submit"value="create account"class="submit">
</form>
<?php
include"connection.php";
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$user=$_POST["user"];
$email=$_POST["email"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$fil=$_FILES["img"];
$fileName=$fil['name'];
$filePath=$fil['tmp_name'];
$err=$fil['error'];
if($err==0){
$destfile='upload/'.$fileName;
move_uploaded_file($filePath,$destfile);
}
else{
echo "<script>alert('sorry');</script>";
}
if(isset($_POST["submit"])){

$userChk;
$emailChk;
if($password==$cpassword){
$pass=password_hash($password,PASSWORD_DEFAULT);
$chkquery="select * from createAccount";
$chkresult=mysqli_query($con,$chkquery);
$d=mysqli_num_rows($chkresult);

if($d==0){
$qry="insert into createAccount (Fname,Lname,Username,Email,Password,profile) values('$fname','$lname','$user','$email','$pass','$destfile')";
$result=mysqli_query($con,$qry);
if($result){
echo"<script>alert('Your account has been created');window.location.href='loginPage.php';</script>";
}
else{
echo"<script>alert('account creation failed')</script>";
}
}

if($d>0){

while($data=mysqli_fetch_array($chkresult)){
if($user==$data["Username"] || $email==$data["Email"]){
global $userChk;
global $emailChk;

$userChk=$data["Username"];
$emailChk=$data["Email"];
}
}

if($userChk==$user || $emailChk==$email){
if($userChk==$user){echo "<script>alert('Username already exist,please try another');</script>";}
if($emailChk==$email){echo "<script>alert('email already exist,please enter valid email');</script>";}
}

else{
$qry="insert into createAccount (Fname,Lname,Username,Email,Password,profile) values('$fname','$lname','$user','$email','$pass','$destfile')";
$result=mysqli_query($con,$qry);
if($result){
echo"<script>alert('Your account has been created');window.location.href='loginPage.php';</script>";
}
else{
echo"<script>alert('account creation failed')</script>";
}
}
}

}
else{
echo "<script>alert('password does not match')</script>";
}
}
?>
</body>
</html>