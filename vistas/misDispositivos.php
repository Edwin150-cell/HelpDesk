<?php 
    include "header.php"; 
    if (isset($_SESSION['usuario']) && 
        $_SESSION['usuario']['id'] == 1) {
?>

<!-- Page Content -->
<section class="py-5">
<div class="container">
    <h1 class="fw-light">Mis dispositivos</h1>
    <p class="lead">The background images for the slider <a href="https://unsplash.com">Unsplash</a>!</p>
</div>
</section>

<?php 
    include "footer.php"; 
    } else {
        header("location:../index.html");
        exit();
    }
?>