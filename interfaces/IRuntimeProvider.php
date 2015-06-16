<?php
  namespace Moriyama\Interfaces {

    interface IRuntimeProvider {

      public function GetTemplate();

      public function RenderTemplate($name);

    }

  }
?>
