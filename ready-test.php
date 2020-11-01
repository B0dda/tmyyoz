<?php include('classes/DB.php'); ?>
<?php include('includes/head.php'); ?>

    <div class="wrapper" id="training">
        <div class="main-body">
            <div id="customPopup" class="modal">
                <div class="modal-content" style="height:550px">
                    <span class="close">رجوع</span>
                    <h1>الاستعداد للتدريب</h1>
                    <div class="ready-content">
                        <p>الوقت المطلوب للتدريب بالدقائق</p>
                        <div class="ready-minutes flex">
                            <div class="ready-minute fl-1">
                                <div class="ready-minute-body">
                                    <b>4</b>
                                </div>
                            </div>
                            <div class="ready-minute fl-1">
                                <div class="ready-minute-body">
                                    <b>1</b> 
                                </div>
                            </div>
                        </div>
                        <p class="ready-parag">موضوعات الاختبار</p>
                        <div class="ready-topics flex">
                            <div class="ready-topic fl-2">
                                <ul>
                                    <li>الارتباط والاختلاف</li>
                                    <li>اسم الموضوع الاخر</li>
                                </ul>
                            </div>
                            <div class="ready-topic fl-1">
                                <ul>
                                    <li>الارتباط والاختلاف</li>
                                    <li>اسم الموضوع الاخر</li>
                                </ul>
                            </div>
                        </div>
                        <div class="close custom-close3">
                        ابدأ الاختبار
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
