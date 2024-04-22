<?php

require("dataprovider.class.php");

class Data {
  static private $data_store;

  static public function initialize(DataProvider $data_provider) {
    return self::$data_store = $data_provider;
  }

  static public function get_terms() {
    return self::$data_store->get_terms();
  }

  static public function get_term($term) {
    return self::$data_store->get_term($term);
  }

  static public function search_terms($search) {
    return self::$data_store->search_terms($search);
  }

  static public function add_term($term, $definition) {
    return self::$data_store->add_term($term, $definition);
  }

  static public function edit_term($original_term, $new_term, $definition) {
    return self::$data_store->edit_term($original_term, $new_term, $definition);
  }

  static public function delete_term($term) {
    return self::$data_store->delete_term($term);
  }
}
