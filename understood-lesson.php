<?php include('classes/DB.php'); ?>
<?php include('includes/head.php'); ?>

    <div class="wrapper" id="training">
        <div class="main-body">
            <div id="customPopup" class="modal">
                <div class="modal-content" style="padding:30px;height:700px;width:600px;">
                    <div class="understood-img">
                        <img src="layout/png/Group927.png" alt="">
                    </div>
                    <div class="understood-quest">
                        <b>هل فهمت الدرس ؟</b>
                    </div>
                    <div class="understood-button">
                        <div class="close custom-close2">
                            نعم فهمت
                        </div>
                    </div>
                    <div class="understood-anchor">
                        <a href="">لا، يحتاج مراجعه</a>
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
