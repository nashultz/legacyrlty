<?php

  Class Breadcrumbs {

    protected $crumbs = array();

    public static function make() {
      $myBC = new Breadcrumbs();
      return $myBC->generate();
    }

    public function generate() {

      // Get Base URL
      $url = Request::root();

      // Dashboard
      $this->_addBreadcrumb('', $url);

      // Explode the URI
      $uri_segments = Request::segments();

      // Add Each Breadcrumb
      foreach($uri_segments as $index=>$uri) {
        if ($index == count($uri_segments) - 1) {
          $this->_addBreadcrumbNoLink(ucfirst($uri));
        }
        else {
	        $url = $url . '/' . $uri;
	        $this->_addBreadcrumb(ucfirst($uri), $url);
        }
      }

      // Show the Breadcrumbs
      return $this->_show();
    }

    private function _addBreadcrumb($text, $url) {
      $link = "<li><a href='{$url}'>{$text}</a></li>";
      $this->crumbs[] = $link;
    }

    private function _addBreadcrumbNoLink($text) {
      $this->crumbs[] = "<li>{$text}</li>";
    }

    private function _show() {
      $crumb_string = '';
      foreach($this->crumbs as $crumb) {
        $crumb_string .= $crumb;
      }
      return $crumb_string;
    }

  }
?>