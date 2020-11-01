<?php include('classes/DB.php'); ?>
<?php include('includes/head.php'); ?>

    <div class="wrapper" id="training">
        <div class="main-body">
            <div id="customPopup" class="modal">
                <div class="modal-content custom-modal">

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
