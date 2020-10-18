<?php include("./includes/head.php"); ?>
<?php
$msg = '';
$id = false;
$item;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
if(isset($_POST["submit"])){
  if(isset($_POST["name"])){
    $name = $_POST["name"];
    if(!$id){
      DB::query('INSERT INTO categories VALUES(\'\',:name)'
      ,array(
        ':name'=>$name
      ));
    }
    else
      DB::query('UPDATE categories SET name=:name WHERE id=:id',array(
        ':name'=>$name,
         ':id'=>$id
       ));
    $msg .= "<div class='success'>تمت الإضافة بنجاح</div>";
  }else{
    $msg .= "<div class='warn'>حدث خطأ الرجاء المحاولة مرة أخرى</div>";
  }
}
if($id){
  $item = DB::query('SELECT * FROM categories WHERE id=:id',array(':id'=>$id));
  if($item)
    $item = $item[0];
  else
    header('Location: ./');
}
 ?>
 <?php include("./includes/sidebar.php"); ?>
    <?php echo $msg; ?>
          <h1> <i class="fas fa-tags"></i>اضافة تصنيف ملفات جديد</h1>
          <div class="new-sec"></div>
          <form class="main-form" method="post" enctype="multipart/form-data">
            <p>الأسم</p>
            <input required type="text" name="name" placeholder="الأسم" <?php echo ($id)?"value='{$item['name']}'":"" ?>>
            <br>
            <input type="submit" name="submit" value="إضافة">
          </form>
<?php include("./bottom.php"); ?>
