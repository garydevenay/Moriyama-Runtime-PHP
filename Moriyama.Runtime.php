<?php
  namespace Moriyama {
    require_once('interfaces' . DIRECTORY_SEPARATOR . 'IRuntimeProvider.php');

    class Runtime implements Interfaces\IRuntimeProvider {

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
        $this->_path = str_replace('/', DIRECTORY_SEPARATOR, $this->_path);

        $this->_getNode();
        $this->content = $this->node->Content;
      }

      private function _getNode() {
        $file = fopen($this->_path, 'r') or http_response_code(404);

        $this->node = json_decode(fread($file, filesize($this->_path)));
        fclose($file);
      }

      public function GetTemplate() {
        return $this->_getTemplate($this->node->Template);
      }

      public function RenderTemplate($name) {
        return $this->_getTemplate($name);
      }

      private function _getTemplate($name) {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR . strtolower($name) . ".php";
      }
    }
  }

?>
