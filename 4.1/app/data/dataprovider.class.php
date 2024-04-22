<?php

require("glosaryterm.class.php");

class DataProvider {
  public $source;

  function __construct($source) {
    $this->source = $source;
  }

  public function get_terms() {
  }

  public function get_term($term) {
  }

  public function search_terms($search) {
  }

  public function add_term($term, $definition) {
  }

  public function edit_term($original_term, $new_term, $definition) {
  }

  public function delete_term($term) {
  }
}
