<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <span class="navbar-text">
        <strong>Gestor de facturas by Joaquin Labrador</strong>
    </span>
</nav>
<?php
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger' role='alert'>
        <strong> ERROR: $_SESSION[error] </strong>
    </div>";

    unset($_SESSION["error"]);
}
?>