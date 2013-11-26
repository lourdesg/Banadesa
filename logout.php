<?php
/* 
 * Cierra la sesión como usuario validado
 */

 session_star();
 session_destroy();
  header('locaton: index.php')
?>
