<?php include('classes/DB.php'); ?>
<?php include('includes/head.php'); ?>

    <div class="wrapper" id="training">
        <div class="main-body">
            <div id="customPopup" class="modal">
                <div class="modal-content" style="padding:0;height:700px;width:600px;">
                    <div class="modal-background"></div>
                    <div class="page-modal-content">
                        <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم</p>
                        <div class="choice flex selected-whole-choice" style="margin:0 auto;margin-top:30px;width:100%;margin-bottom:30px;">
                            <div class="fl-1">
                                <div class="choice-img selected-choice">
                                    <img src="layout/png/ث.png" alt="">
                                </div>
                            </div>
                            <div class="choice-body fl-4">
                                <p>أوراق البردى</p>
                            </div>
                        </div>
                        <div class="close custom-close">
                            رجوع
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var modal = document.getElementById("customPopup");
        var span = document.getElementsByClassName("close")[0];
        modal.style.display = "block";
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>
<?php include('includes/footer.php'); ?>
