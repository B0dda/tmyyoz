<?php include("./includes/head.php"); ?>
<?php
$msg = '';
$id = false;
$item;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
if(isset($_POST["submit"])){
  if(isset($_POST["message"])){
    $message = $_POST["message"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $name = $_POST["name"];
    $link = $_POST["link"];
    if(!$id){
      DB::query('INSERT INTO slides VALUES(\'\',:_from,:to,:name,:message,:link)'
      ,array(
        ':message'=>$message,
        ':_from'=>$from,
        ':to'=>$to,
        ':name'=>$name,
        ':link'=>$link
      ));
    }
    else
      DB::query('UPDATE slides SET message=:message, _from=:_from, _to=:to, name=:name, link=:link WHERE id=:id',
      array(
        ':message'=>$message,
        ':_from'=>$from,
        ':to'=>$to,
        ':name'=>$name,
        ':link'=>$link,
         ':id'=>$id
       ));
    $msg .= "<div class='success'>تمت الإضافة بنجاح</div>";
  }else{
    $msg .= "<div class='warn'>حدث خطأ الرجاء المحاولة مرة أخرى</div>";
  }
}
if($id){
  $item = DB::query('SELECT * FROM slides WHERE id=:id',array(':id'=>$id));
  if($item)
    $item = $item[0];
  else
    header('Location: ./');
}
 ?>
 <?php include("./includes/sidebar.php"); ?>
    <?php echo $msg; ?>
          <h1> <i class="fas fa-tachometer-alt"></i>إضافة مشترك جديد</h1>
          <div class="new-sec"></div>
          <form class="main-form" method="post" enctype="multipart/form-data">
            <p>الأسم</p>
            <input required type="text" name="name" placeholder="الأسم" <?php echo ($id)?"value='{$item['name']}'":"" ?>>
            <p>الرسالة</p>
            <input required type="text" name="message" placeholder="الكلمة" <?php echo ($id)?"value='{$item['message']}'":"" ?>>
            <p>المستوى قبل التحسن</p>
            <input required type="number" name="from" <?php echo ($id)?"value='{$item['_from']}'":"" ?>>
            <p>المستوى بعد التحسن</p>
            <input required type="number" name="to" <?php echo ($id)?"value='{$item['_to']}'":"" ?>>
            <p>رابط الشهادة</p>
            <input required type="text" name="link" <?php echo ($id)?"value='{$item['link']}'":"" ?>>
            <br>
            <input type="submit" name="submit" value="إضافة">
          </form>
<?php include("./bottom.php"); ?>
