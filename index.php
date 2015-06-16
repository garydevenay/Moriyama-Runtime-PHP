<?php
  require_once('Moriyama.Runtime.php');

  $runtime = new Moriyama\Runtime();

  switch($runtime->node->Template) {
    case 'Home' :
      include('templates/home.php');
      break;
    case 'Post' :
      include('templates/post.php');
      break;
    default :
      http_response_code(404); //You can also insert a default template here
  }
?>
