<?php 
    if (isset($_SESSION['errorMensaje'])) {
        $errorMensaje = $_SESSION['errorMensaje'];
        //echo "<script>alert('$errorMensaje');</script>";
        echo " <script>  window.onload = function() {   alert('$errorMensaje'); };</script>";
        unset($_SESSION['errorMensaje']);
    }
    
?>