<?php include('classes/DB.php');
$id = false;
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="layout/css/variables.css">
    <link rel="stylesheet" href="layout/css/master.css?n=121">
    <title>تميز</title>
  </head>
  <body>
    <?php
    include('includes/header.html');
     ?>
    <div class="wrapper">
      <div class="top-banner" id="top-banner">
        <div class="text">
          <h1>عندك قدرات وتحصيلي! <br>وطموحك درجة فالـ ٩٠ <br> عشان تدخل <span id="typer">إدارة أعمال</span> </h1>
          <h2>حمل تطبيقنا وابدأ رحلة التميز</h2>
          <div class="flex w-40 download-buttons j-sb">
            <a href="https://itunes.apple.com/sa/app/%D9%85%D9%86%D8%B5%D8%A9-%D8%AA%D9%85%D9%8A%D8%B2/id1413718316?mt=8" target="_blank"><img src="layout/png/button-app.png"></a>
            <a href="https://play.google.com/store/apps/details?id=com.app.tamayyozz" target="_blank"><img src="layout/png/button-play.png"></a>
          </div>
        </div>
        <div class="phone">
          <div class="iphonex">
            <img src="layout/svg/iPhone X.svg">
            <div class="container-1">
              <img src="layout/jpg/Flora-Illustration-3D-Design-mindsparkle-mag-3.jpg">
              <h1>أساسيات الرياضيات للقدرات</h1>
            </div>
            <div class="container-2">
              <div>
                <h1>برنامج تميز قدرات</h1>
                <h2>التقدم العام للتأسيس</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main-body">
        <div id="section-files" class="section">

          <div class="heading ellipse1">مكتبة ملفات منصة تميز</div>
          <div class="categories flex">
            <?php

            $categories = DB::query('SELECT * FROM categories');
            foreach ($categories as $cat) {
              ?>
              <a href="?id=<?php echo $cat['id']; ?>" ><div class="item <?php if($id == $cat['id'])echo 'selected'; ?>"><?php echo $cat['name'] ?></div></a>
              <?php
            }
             ?>
          </div>
          <div class="files flex">
            <?php
            if($id){
            $files = DB::query('SELECT * FROM files WHERE category_id',array(':id'=>$id));
            foreach ($files as $file) {
              ?>
              <a href="<?php echo "./uploads/".$file['pdf']; ?>"><div class="item">
                <div class="image">
                  <img src="<?php echo "./uploads/".$file['image']; ?>" alt="">
                </div>
                <div class="text">
                <?php echo $file['name']; ?>
                </div>
              </div></a>
              <?php
            }
            }
             ?>


          </div>
        </div>

      </div>
    </div>
    <div id="footer">
      <a href="#top-banner"><div class="back-to-top"></div></a>

      <div class="flex first">
        <div class="flex links">
          <a href="/">الرئيسية</a>
          <a href="#">الشروط والاحكام</a>
          <a href="#">سياسية الخصوصية</a>
        </div>
        <div class="flex social-icons">
          <div class="item">
            <a href="https://api.whatsapp.com/send?phone=966561229596" target="_blank">
              <img src="layout/svg/whatsapp.svg">
            </a>
          </div>
          <div class="item">
            <a href="https://Instagram.com/tmyyoz" target="_blank">
              <img src="layout/svg/instagram.svg">
            </a>
          </div>
          <div class="item">
            <a href="https://Twitter.Com/tmyyoz" target="_blank">
              <img src="layout/svg/twitter.svg">
            </a>
          </div>
        </div>
      </div>
      <div class="flex second">
        <p>حمل تطبيق تميز الآن وشارك أكثر من 20,000 طالب في رسم أبعاد جديدة للنجاح والتميز</p>
        <div class="flex download-buttons">
          <a href="https://itunes.apple.com/sa/app/%D9%85%D9%86%D8%B5%D8%A9-%D8%AA%D9%85%D9%8A%D8%B2/id1413718316?mt=8" target="_blank"><img src="layout/png/button-app.png"></a>
          <a href="https://play.google.com/store/apps/details?id=com.app.tamayyozz" target="_blank"><img src="layout/png/button-play.png"></a>
        </div>
      </div>
      <div class="sep"></div>
      <p>جميع الحقوق محفوظة <?php echo date('Y'); ?> @ تميز</p>
    </div>
    <script type="text/javascript" src="layout/js/all.js?n=5"></script>
  </body>
</html>
