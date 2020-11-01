<?php include('classes/DB.php'); ?>
<?php include('includes/head.php'); ?>

    <div class="wrapper" id="training">
        <div class="main-body">
            <div id="customPopup" class="modal">

                <div class="modal-content">
                    <span class="close">خروج</span>
                    <h1>نتيجه الاختبار</h1>
                    <div class="main-modal flex">
                        <div class="modal-percentage fl-1">
                            <div class="circle-border">
                                <div class="circle">
                                    %75
                                </div>
                            </div>
                        </div>
                        <div class="modal-stat fl-2">
                            <p>وقت الاختبار <b>19:11</b> دقيقه</p>
                            <div class="answers-stat flex">
                                <div class="right-answers fl-1">
                                    <p><b>21</b><br>اجابات صحيحه</p>
                                </div>
                                <div class="wrong-right fl-1">
                                    <p><b>7</b><br>إجابات خاطئه</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-buttons flex">
                        <div class="left-button" style="width: 100%;">
                            <div class="xbutton fl-1 accent-bg" style="box-shadow: none; color:white">
                            مراجعه الاختبار
                            </div>
                        </div>
                        <div class="right-button" style="width: 100%;margin-right: 10%;">
                            <div class="xbutton fl-1 primary-bg" style="box-shadow: none;text-align: center;">
                            <p><img src="layout/svg/share.svg" width="20px" height="20px" alt="">  شارك النتيجة</p>
                            </div>
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
