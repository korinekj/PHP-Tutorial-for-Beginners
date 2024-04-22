<?php

class MySqlDataProvider extends DataProvider {
  public function get_terms() {
    return $this->query('SELECT id, term, definition FROM terms');
  }

  public function get_term($term) {
    $db = $this->connect();

    if ($db === null) {
      return null;
    }

    try {
      // Příprava SQL dotazu pro výběr termínu podle jeho id
      $sql = "SELECT id, term, definition FROM terms WHERE id = :id LIMIT 1";
      $stmt = $db->prepare($sql);

      // Vyhledání termínu podle zadaného id
      $stmt->execute([':id' => $term]);

      // Získání výsledku dotazu jako objektu třídy stdClass
      $result = $stmt->fetchObject('GlosaryTerm');

      // Uzavření připojení
      $stmt = null;
      $db = null;

      // Vrácení výsledku
      return $result;
    } catch (PDOException $e) {
      // V případě chyby vrátíme null a zalogujeme chybu
      error_log("Chyba při čtení dat z databáze: " . $e->getMessage());
      return null;
    }
  }

  public function search_terms($search) {
    return $this->query('SELECT id, term, definition FROM terms WHERE term LIKE :search OR definition LIKE :search', [':search' => "%$search%"]);
  }

  public function add_term($term, $definition) {
    $this->execute('INSERT INTO terms (term, definition) VALUES (:term, :definition)', [
      ':term' => $term,
      ':definition' => $definition
    ]);
  }

  public function edit_term($id, $new_term, $definition) {
    $this->execute('UPDATE terms SET term = :term, definition = :definition WHERE id = :id', [
      ':term' => $new_term,
      ':definition' => $definition,
      ':id' => $id
    ]);
  }

  public function delete_term($id) {
    $this->execute('DELETE FROM terms WHERE id = :id', [
      ':id' => $id
    ]);
  }


  private function connect() {
    try {
      $conn = new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  private function query($sql, $sql_parms = []) {
    $db = $this->connect();

    if ($db === null) {
      return null;
    }

    if (empty($sql_parms)) {
      $stmt = $db->query($sql);
    } else {
      $stmt = $db->prepare($sql);
      $stmt->execute($sql_parms);
    }

    $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'GlosaryTerm');

    $stmt = null;
    $db = null;

    return $results;
  }

  private function execute($sql, $sql_parms) {
    $db = $this->connect();

    if ($db === null) {
      return;
    }

    $stmt = $db->prepare($sql);
    $stmt->execute($sql_parms);

    $stmt = null;
    $db = null;
  }
}
