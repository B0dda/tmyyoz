<?php include("./includes/head.php"); ?>
<?php
$msg = '';
$id = false;
$item;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
if(isset($_POST["submit"])){
  if(isset($_POST["question"])){
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    if(!$id){
      DB::query('INSERT INTO questions VALUES(\'\',:question,:answer)'
      ,array(
        ':question'=>$question,
        ':answer'=>$answer
      ));
    }
    else
      DB::query('UPDATE questions SET question=:question,answer=:answer WHERE id=:id',array(
        ':question'=>$question,
        ':answer'=>$answer,
         ':id'=>$id
       ));
    $msg .= "<div class='success'>تمت الإضافة بنجاح</div>";
  }else{
    $msg .= "<div class='warn'>حدث خطأ الرجاء المحاولة مرة أخرى</div>";
  }
}
if($id){
  $item = DB::query('SELECT * FROM questions WHERE id=:id',array(':id'=>$id));
  if($item)
    $item = $item[0];
  else
    header('Location: ./');
}
 ?>
 <?php include("./includes/sidebar.php"); ?>
    <?php echo $msg; ?>
          <h1> <i class="fas fa-question"></i>إضافة مشترك جديد</h1>
          <div class="new-sec"></div>
          <form class="main-form" method="post" enctype="multipart/form-data">
            <p>السؤال</p>
            <input required type="text" name="question" placeholder="السؤال" <?php echo ($id)?"value='{$item['question']}'":"" ?>>
            <br>
            <p>الأجابة</p>
            <textarea name="answer" placeholder="الأجابة"><?php echo ($id)?$item['answer']:""; ?></textarea>
            <br>
            <input type="submit" name="submit" value="إضافة">
          </form>
<?php include("./bottom.php"); ?>
