<!doctype html>
<html>

<head>
  <title>그림자-오늘의 시작</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
require_once "config.php"; //hidden으로 오늘의 (시작,만남,코드,끝) 시리즈인 걸 post한 후 table에 따로 column(시작,만남,코드,끝)추가해서 reading할 때 column에 맞는
session_start();           // 것을 불러오기


function writing(){
 ?> <a href="writing.php">기록하기</a><?php
}


function updating(){
 global $link;
 $sql = "SELECT id FROM oneline_record WHERE author=?";
 if($stmt = mysqli_prepare($link,$sql)){
   mysqli_stmt_bind_param($stmt, "s", $param_author);
   $param_author = $_SESSION['username'];
   if(mysqli_stmt_execute($stmt)){
     mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt)>0){ ?>
       <a href="correct.php">수정하기</a> <?php
     }else{
       echo"";
     }
     }else{
       echo"execute오류";
     }

     }else{
       echo"prepare오류";
     }
}


function deleting(){
  global $link;
 $sql2 = "SELECT id FROM oneline_record WHERE author=?";
 if($stmt = mysqli_prepare($link,$sql2)){
   mysqli_stmt_bind_param($stmt, "s", $param_author);
   $param_author = $_SESSION['username'];
   if(mysqli_stmt_execute($stmt)){
     mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt)>0){ ?>
       <a href="delete.php">삭제하기</a> <?php
     }else{
       echo"";
     }
     }else{
       echo"execute오류";
     }

     }else{
       echo"prepare오류";
     }
     }


     function reading(){
       global $link;
       $sql= "SELECT date, description FROM oneline_record WHERE author =?";
        if($stmt=mysqli_prepare($link,$sql)){
         mysqli_stmt_bind_param($stmt,"s",$param_author);
        $param_author = $_SESSION['username'];
          if(mysqli_stmt_execute($stmt)){
             mysqli_stmt_store_result($stmt);

             if(mysqli_stmt_num_rows($stmt) > 0){
                mysqli_stmt_bind_result($stmt,$date,$description);

                while(mysqli_stmt_fetch($stmt)){
                  echo"<li><strong>";
                  printf ("[%s]&nbsp;&nbsp; %s \n", $date, $description);
                  echo"</strong></li>";
                }
       }else{

       echo"";
       }
     } else{
       echo"execute오류";
     }
     } else{
       echo"prepare오류";
     }
     }
?>











</head>

<body>
  <input class="logoutbut" type="button" onclick="location.href='logout.php';" value="Log Out">
  <h1><a href="index.php">Soo's Container</a></h1>
  <div class="grid">
   <div style="border-right:3px solid black" class="active">오늘의 시작</div>
   <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
   <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
   <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
   <a href="4.php">오늘의 끝</a>
  </div>

<h3>오늘의 시작</h3>
<img src="sunny.svg" >
<br><br>

<h4>오늘 아침을 한 줄로 표현한다면?</h4>


<hr class="uline">
<div class="smallmenu">

<?php writing();?>

<?php updating();?>

<?php deleting();?>


</div>
<hr class="uline">
<br>

<!-- READ기능 구현..함수화 예[][[]]-->
<div class="oneline">

  <?php reading();?>


</div>
</body>
</html>
