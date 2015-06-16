<?php
  require_once('Moriyama.Runtime.php');

  $runtime = new Moriyama\Runtime();
  include $runtime->RenderTemplate('master');
?>
