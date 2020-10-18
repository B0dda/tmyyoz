<?php
include("./includes/head.php");
$maxPerPage = 15;
$page = 1;
if(isset($_GET["p"])){
  $page = $_GET["p"];
}
$page--;
$items = DB::query('SELECT * FROM slides ORDER BY id DESC LIMIT '.$page*$maxPerPage.','.$maxPerPage);
$itemsCount = DB::query('SELECT COUNT(id) as cnt FROM slides')[0]["cnt"];
$cnt = ceil($itemsCount / ($maxPerPage))-1;
$start = 0;
$end = $cnt;
if($page>2){
  $start = $page-2;
}
if($cnt-$start > 5){
  $end = $start+4;
}
include("./includes/sidebar.php");
 ?>
      <h1> <i class="fas fa-tachometer-alt"></i>المشتركين</h1>
      <div class="new-sec"></div>
      <?php $ii=0; ?>
      <div style="overflow-x:auto;">
      <table>
        <tr>
          <th>#</th>
          <th>الرسالة</th>
          <th>الأسم</th>
          <th>من</th>
          <th>الى</th>
          <th>رابط الشهادة</th>
          <th>تعديل</th>
          <th>حذف</th>
        </tr>
          <?php $i = 1;
          foreach ($items as $item){
            echo
            '<tr><td>'.$i.'</td>
            <td>'.mb_substr($item["message"],0,50).(((mb_strlen($item["message"])) > 50)?"...":"").'</td>'.
            '<td>'.$item['name'].'</td>'.
            '<td>'.$item['_from'].'</td>'.
            '<td>'.$item['_to'].'</td>'.
            '<td>'.'<a href="'.$item['link'].'" target="_blank"><div class="xbutton"><i class="fas fa-eye"></i></div></a>'.'</td>'.
            '<td><a href="./add-slide.php?id='.$item["id"].'"><div class="xbutton edit"><i class="fas fa-pen"></i></div></a></td>'.
            '<td><a href="./delete.php?id='.$item["id"].'&type=slides"><div class="xbutton delete"><i class="fas fa-trash-alt"></i></div></a></td>';
            $i++;
          }
 ?>
      </table>
      <center>
        <?php
          if($start > 0){
            echo '<a href="?p=1"><div class="xbutton">1</div></a>';
          }
          for($i = $start; $i<=$end;$i++){
            if($i == $page){
              echo '<div class="xbutton" style="opacity:0.7">'. ($i+1) .'</div>';
            }else{
              echo '<a href="?p='. ($i+1) .'"><div class="xbutton">'. ($i+1) .'</div></a>';
            }
          }
          if($end < $cnt){
            echo '<a href="?p='. ($cnt+1) .'"><div class="xbutton">'. ($cnt+1) .'</div></a>';
          }
        ?>

      </center>
    </div>

<?php include("./bottom.php"); ?>
