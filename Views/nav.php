<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>LabIV - Parcial <?php echo APELLIDO ?></strong>
     </span>
     <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="nav-link" href="">Listar Facturas</a>
          </li>   
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/Logout">Cerrar Sesión</a>
          </li>        
     </ul>
</nav>

<?php 
     if(isset($_SESSION["error"])) {
          echo "<div class='alert alert-danger' role='alert'>
               <strong> ERROR: $_SESSION[error] </strong>
           </div>";
           
           unset($_SESSION["error"]);    
     }else if(isset($_SESSION["success"])) {
          echo "<div class='alert alert-success' role='alert'>
               <strong> $_SESSION[success] </strong>
           </div>";
           
           unset($_SESSION["success"]);    
     }
?>