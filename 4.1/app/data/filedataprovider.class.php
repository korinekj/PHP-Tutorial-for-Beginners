<?php

class FileDataProvider extends DataProvider {
  public function get_terms() {
    $json = $this->get_data();

    return json_decode($json);
  }

  public function get_term($term) {
    $terms = $this->get_terms();

    foreach ($terms as $item) {
      if ($item->term == $term) {
        return $item;
      }
    }
    return false;
  }

  public function search_terms($search) {
    $items = $this->get_terms();

    $search = strtolower($search);

    $results = array_filter($items, function ($item) use ($search) {
      if (strpos(strtolower($item->term), $search) !== false || strpos(strtolower($item->definition), $search) !== false) {
        return $item;
      }
    });

    return $results;
  }

  public function add_term($term, $definition) {
    $data = $this->load_data_from_file();

    $data[] = new GlosaryTerm($term, $definition);

    $this->save_data_to_file($data);
  }

  public function edit_term($original_term, $new_term, $definition) {
    $termsArr = $this->get_terms();

    foreach ($termsArr as $termObj) {
      if ($original_term === $termObj->term) {
        $termObj->term = $new_term;
        $termObj->definition = $definition;
        break;
      }
    }

    $this->set_data($termsArr);
  }

  public function delete_term($term) {
    $termsArr = $this->get_terms();

    $term_to_remove = $term;

    $index_to_remove = null;
    foreach ($termsArr as $key => $termObj) {
      if ($term_to_remove === $termObj->term) {
        $index_to_remove = $key;
        break;
      }
    }

    if ($index_to_remove !== null) {
      array_splice($termsArr, $index_to_remove, 1);
    }

    $this->save_data_to_file($termsArr);
  }

  private function get_data() {
    $fname = CONFIG['data_file'];

    $json = '';

    if (!file_exists($fname)) {
      file_put_contents($fname, '');
    } else {
      $json = file_get_contents($fname);
    };

    return $json;
  }

  private function set_data($edited) {
    $data = $this->load_data_from_file();

    $data = $edited;

    $this->save_data_to_file($data);
  }

  // FUNKCE NAČÍTÁNÍ A UKLÁDÁNÍ DAT DO DATA.JSON

  private function load_data_from_file() {
    $file_path = $this->source;
    $existingData = file_get_contents($file_path);

    return $existingData ? json_decode($existingData, true) : [];
  }

  private function save_data_to_file($data) {
    $file_path = $this->source;

    file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT));
  }
}
