<!doctype html>
<html>

<head>
  <title>그림자-오늘의 사진</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php
  function writing(){
   ?> <a href="uploading.php">등록하기</a><?php
  }

  function updating(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){ ?>
  <a href="correctpicture.php">수정하기</a> <?php }
  }

  function deleting(){
  $oneline = scandir('./data');
  if (count($oneline)>=3){ ?>
  <a href="delete.php">삭제하기</a> <?php }
  }

  function record(){
  $oneline = scandir('./data');
  $i = 0;

  while ($i<count($oneline)){
    if($oneline[$i] != '.'){
      if($oneline[$i] != '..'){
  echo "<ul>";
  echo "<li><strong>";
  echo $oneline[$i];
  echo "&nbsp;&nbsp";
  echo file_get_contents("data/".$oneline[$i]);
  echo "</strong></li>";
  echo '<br>';
  echo "</ul>";

  }
  }
  $i=$i+1;
  }
  }

   ?>
</head>

<body>
  <h1><a href="index.php">Soo's Container</a></h1>
  <div class="grid">
    <a href="1.php" style="border-right:3px solid black">오늘의 시작</a>
     <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
     <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
     <div style="border-right:3px solid black" class="active">오늘의 사진</div>
     <a href="4.php">오늘의 끝</a>
 </div>


<h3>오늘의 사진</h3>
<img src="photo-camera.svg" >  <!--아침 그림 넣기-->
<br><br>
<h4>오늘의 사진은?</h4>

<hr class="uline">

<div class="smallmenu">
  <?php writing();?>
  <?php updating();?>
</div>

<hr class="uline">

<div class="picon">
<form action="correctpicture_process.php" method="post" enctype="multipart/form-data">

  <input type="date" name="date" value="<?php echo $_POST['date'];?>">
  <input type="file" name="fileToUpload" value="<?php echo file_get_contents("images/".$_POST['date']);?>">
  <input type="submit" value="사진 등록" >
</form>
</div>


<br>

<div class="picposition">
<?php

$onepicture = scandir('./images');
$i = 0;

while ($i<count($onepicture)){
  if($onepicture[$i] != '.'){
    if($onepicture[$i] != '..'){
echo "<ul>";
echo "<li><strong>".$onepicture[$i]."</strong></li>";
echo "<img src=images/".$onepicture[$i]." height=200 width=300/>";
echo "</ul>";


//이미지 주소로도 사진등록 하는 기능도 추가하면 좋을 듯
}
}
$i=$i+1;
}

?>
</div>


<!--<form action="correct_process.php" method="post">






  <div class="datainput">
  <input id="date" type="date" name="date"style="width:125px; margin-right:10px;" value="">
  <input id="realtext" type="text" name="description" placeholder="한 줄글 입력" >
  <input id="action" type="submit" value="저장" style="width:56px;" >
</div>

</form>-->





</body>
</html>
