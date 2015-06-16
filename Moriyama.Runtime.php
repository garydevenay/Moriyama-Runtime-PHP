<?php

  namespace Moriyama {

    class Runtime {

      private $_url;
      private $_path;
      public $node;
      public $content;

      function __construct() {
        $this->_url = $_REQUEST['url'];

        if (substr($this->_url, -1) !== '/') {
          $this->_url = $this->_url . '/';
        }

        $this->_path = $this->_url . 'content.json';

        $this->_getNode();
        $this->content = $this->node->Content;
      }

      private function _getNode() {
        $file = fopen($this->_path, 'r') or http_response_code(404);

        $this->node = json_decode(fread($file, filesize($this->_path)));
        fclose($file);
      }
    }
  }

?>
