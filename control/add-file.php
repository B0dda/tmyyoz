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
    $category = $_POST["category"];
    if(!$id){
      DB::query('INSERT INTO files VALUES(\'\',:name,NULL,NULL,:category_id)'
      ,array(
        ':name'=>$name,
        ':category_id'=>$category
      ));
    }
    else
      DB::query('UPDATE files SET name=:name, category_id=:category_id WHERE id=:id',array(
        ':name'=>$name,
        ':category_id'=>$category,
         ':id'=>$id
       ));
     $data_id = DB::query('SELECT id FROM files WHERE name=:name AND category_id=:category_id',array(':name'=>$name,':category_id'=>$category))[0]['id'];
     if ( isset( $_FILES['document'] ) ) {
      if ($_FILES['document']['type'] == "application/pdf") {
        $source_file = $_FILES['document']['tmp_name'];
        $file_name = time()."-".$_FILES['document']['name'];
        $dest_file = "../uploads/".$file_name;

        move_uploaded_file( $source_file, $dest_file )
  			or die ("Error!!");
  			if($_FILES['document']['error'] != 0) {
          $msg .= "<div class='warn'>حدث حطأ أثناء رفع الملف, الرجاء المحاولة مرة أخرى</div>";
  			}else{
          DB::query('UPDATE files SET pdf=:document WHERE id=:id',array(':id'=>$data_id,':document'=>$file_name));
        }
      }
    }
    if ( isset( $_FILES['photo'] ) ) {
  $f_type = $_FILES['photo']['type'];
  if ($f_type== "image/gif" || $f_type== "image/png" || $f_type== "image/jpeg" || $f_type== "image/JPEG" || $f_type== "image/PNG" || $f_type== "image/GIF") {
    $source_file = $_FILES['photo']['tmp_name'];
    $file_name = time()."-".$_FILES['photo']['name'];
    $dest_file = "../uploads/".$file_name;

    move_uploaded_file( $source_file, $dest_file )
    or die ("Error!!");
    if($_FILES['photo']['error'] != 0) {
      $msg .= "<div class='warn'>حدث حطأ أثناء رفع الملف, الرجاء المحاولة مرة أخرى</div>";
    }else{
      DB::query('UPDATE files SET image=:photo WHERE id=:id',array(':id'=>$data_id,':photo'=>$file_name));
    }
  }
}
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
          <h1> <i class="fas fa-file"></i>اضافة ملف جديد</h1>
          <div class="new-sec"></div>
          <form class="main-form" method="post" enctype="multipart/form-data">
            <p>الأسم</p>
            <input required type="text" name="name" placeholder="الأسم" <?php echo ($id)?"value='{$item['name']}'":"" ?>>
            <p>الصورة</p>
            <input type="file" name="photo" accept="image/*">
            <br>
            <p>ملف PDF</p>
            <input type="file" name="document" accept="application/pdf">
            <br>
            <p>التصنيف</p>
        <select required name="category">
          <?php if($id){
            ?>
            <option value="<?php echo $item['category_id']; ?>"><?php echo DB::query('SELECT c.name FROM categories c, files f WHERE c.id=f.category_id AND f.id=:id',array(':id'=>$item['id']))[0]['name']; ?></option>
            <?php
          }else{
            ?>
            <option value="" disabled selected> ---- حدد الأختيار ----</option>
            <?php
          } ?>
          <?php
          $categories = DB::query('SELECT * FROM categories') ;
          foreach ($categories as $cat) {
            echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
          }
          ?>
        </select>
            <input type="submit" name="submit" value="إضافة">
          </form>
<?php include("./bottom.php"); ?>
