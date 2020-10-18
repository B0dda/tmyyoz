<?php include('classes/DB.php'); ?>
<?php include('includes/head.php'); ?>

<div id="course" class="wrapper">
  <div class="main-body">
    <div class="course-details">
      <div class="info">
        <h1>برنامج تميز قدرات</h1>
        <div class="details">
          <div class="item">
            <div class="icon">
              <img src="layout/svg/audio-book.svg" >
            </div>
            <div class="text">
              <div class="count">55</div>
              <p>درس تفاعلي</p>
            </div>
          </div>
          <div class="item">
            <div class="icon">
              <img src="layout/svg/male-professor.svg" >
            </div>
            <div class="text">
              <div class="count">1200</div>
              <p>تدريب مجاني</p>
            </div>
          </div>
          <div class="item">
            <div class="icon">
              <img src="layout/svg/webinar.svg" >
            </div>
            <div class="text">
              <div class="count">2200</div>
              <p>المشتركين</p>
            </div>
          </div>
        </div>
        <div class="description">
          <h2>الوصف</h2>
          <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات</p>
        </div>
      </div>
      <div class="side-box">
        <div class="content">
          <h1 class="price">99</h1>
          <h2>عرض باقات الأشتراك</h2>
          <div class="xbutton">
            الدخول للبرنامج
          </div>
        </div>
      </div>
    </div>
    <style media="screen">
      .page-tabs{
        flex:1;
        flex-basis:400px;
      }
      .page-tabs .container{
        width:400px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 10px 30px 0px rgba(100,100,100,0.2);
      }

      .page-tabs .container .head{
        display: flex;
        align-items: center;
        justify-content: center;
        height:130px;
        width:100%;
      }
      .page-tabs .container .tab{
        height:80px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        font-size:18px;
      }
      .page-tabs .container .tab:last-of-type{
        border-radius: 0 0 10px 10px;
      }

      .page-tabs .container .tab.selected{
        background: var(--accent);
        color:white;
        position: relative;
      }
      .page-tabs .container .tab.selected::after{
        content:"";
        position: absolute;
        top:50%;
        right:100%;
        width:0;
        height:0;
        border-top:10px solid transparent;
        border-left:15px solid transparent;
        border-bottom:10px solid transparent;
        border-right:15px solid var(--accent);
        transform:translateY(-50%);
      }

      .page-tabs .container .head h1{
        font-size: 20px;
      }

      .page-content{
        flex:1;
        padding-right:15%;
        flex-basis: 900px;
      }
      .page-content .heading{
        font-size:32px;
      }
      .page-content .item .title{
        color:var(--accent);
        font-size: 25px;
        font-weight: bold;
        padding-right:80px;
        position: relative;
        cursor: pointer;
      }
      .page-content .item .title::before{
        content:"";
        height:50px;
        width:50px;
        position: absolute;
        top:50%;
        transform:translateY(-50%);
        right:2px;
        z-index: 99;
        border-radius: 50%;
        background: linear-gradient(var(--primary), var(--accent));
      }
      .page-content .item .title::after{
        content: "";
        width:150px;
        height:0px;
        border-top:1px solid var(--accent);
        position: absolute;
        bottom:-5px;
        right:65px;
        opacity: 0.8;
      }

      .page-content .item ol {
        display: none;
        list-style: none;
        counter-reset: my-awesome-counter;
        position: relative;
      }
      .page-content .item.open ol{
        display: block;
      }
      .page-content .item ol::before {
        content:"";
        position: absolute;
        top:-5%;
        width:1px;
        height:95%;
        background: #999;
        right:28px;
        z-index: 1;
      }
      .page-content .item ol li {
        counter-increment: my-awesome-counter;
        padding: 20px 0;
        padding-right:70px;
        position: relative;
        font-size: 20px;
        font-weight: 500;

      }
      .page-content .item ol li:first-of-type {
        margin-top:20px;
      }

      .page-content .item ol li::before {
        content: "0" counter(my-awesome-counter);
        width:35px;
        height:35px;
        position: absolute;
        background: var(--primary);
        color:white;
        font-size:23px;
        border-radius: 50%;
        right:10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 400;
        z-index: 99;
      }

      .page-content .item ul {
        list-style: none;
        margin-right:-70px;
        position: relative;
      }


      .page-content .item ul li {
        counter-increment: none;
        position: relative;
        font-size: 20px;
        font-weight: 500;
        padding:15px 0;
        padding-right:100px;
      }

      .page-content .item ul li::before {
        content:"";
        width:25px;
        height:25px;
        background: var(--accent);
        z-index: 99;
        right:16px;
      }
      .page-content .item{
        position: relative;
      }
      .page-content .item .action-button{
        width:20px;
        height:20px;
        position: absolute;
        left:0;
        top:0;
        transition:transform .4s;
        transform:rotate(0deg);
        cursor: pointer;
        z-index: 100;
        background-image:url('layout/svg/arrow.svg');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
      }
      .page-content .item.open .action-button{
        transform:rotate(180deg);
      }
    </style>
    <div class="flex">
      <div class="page-tabs">
        <div class="container">
          <div class="head"> <h1>اقسام الصفحة</h1> </div>
          <div class="tab selected"> محتوى البرنامج </div>
          <div class="tab"> آراء المشتركين </div>
        </div>
      </div>
      <div class="page-content">
        <div class="heading right">
          محتوى البرنامج
        </div>
        <div class="program-list">
          <div class="item">
            <div class="action-button"></div>
            <div class="title">القسم اللفظي</div>
            <ol>
              <li>الارتباط و الاختلاف
                <ul>
                  <li>شرح فكرة الارتباط والاختلاف</li>
                  <li>طريقة حل أسئلة الارتباط والاختلاف</li>
                </ul>
              </li>
              <li>الخطأ السياقي
                <ul>
                  <li>شرح فكرة الخطأ السياقي</li>
                  <li>طريقة حل أسئلة الخطأ السياقي</li>
                </ul>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var actionButton = document.getElementsByClassName('action-button');
  var titleButton = document.querySelectorAll('.program-list .item .title');
  for(let i =0; i<actionButton.length; i++){
    actionButton[i].addEventListener('click',function(){
      if(this.parentElement.classList.contains('open')){
        this.parentElement.classList.remove('open');
      }else{
        this.parentElement.classList.add('open');
      }
    });
  }
  for(let i =0; i<titleButton.length; i++){
    titleButton[i].addEventListener('click',function(){
      if(this.parentElement.classList.contains('open')){
        this.parentElement.classList.remove('open');
      }else{
        this.parentElement.classList.add('open');
      }
    });
  }
</script>
<?php include('includes/footer.php'); ?>
