<?php
include 'header.php';
?>

<div id="main-content" style="display: none;">
    <?php
    include 'main.php';
    include 'footer.php';
    ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (localStorage.getItem('loggedIn') === 'true') {
        document.getElementById('main-content').style.display = 'block';
    } else {
        window.location.href = 'user.php';
    }
});
</script>