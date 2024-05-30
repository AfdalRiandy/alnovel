<?php


session_start();
require('connect.php');

function dd($value) {
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuery($sql, $data) {
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat ('s', count($values));
    $stmt->bind_param($types, ...$values);       
    $stmt->execute();
    return $stmt;

}

function SelectAll($table, $conditions = []) {
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
     $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i == 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        // $sql = "SELECT * FROM user WHERE admin=0 AND username='afdal' LIMIT1"     
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function SelectOne ($table, $conditions) {
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i == 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }

        $sql = $sql . " LIMIT 1";    
        $stmt = executeQuery($sql, $conditions); 
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }

    function create($table, $data) {
        global $conn;
        $sql = "INSERT INTO $table SET";
    
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }
    
        $stmt = executeQuery($sql, $data);
        $id = $stmt->insert_id;
        return $id;

    }
    
    

    function update($table, $id, $data) {
        // $sql = "UPDATE user SET username=?, and admin=?, email=?, password=? WHERE id=?
        global $conn;
        $sql = "UPDATE $table SET";

        $i = 0;
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql . " WHERE id=?";
        $data['id'] = $id;
        $stmt = executeQuery($sql, $data);
        return $stmt->affected_rows;
    }

    function delete($table, $id) 
    {
        global $conn;
        $sql = "DELETE FROM $table WHERE id=?";
        $stmt = executeQuery($sql, ['id' => $id]);
        return $stmt->affected_rows;
    }

    function getPublishedNovel() {
        global $conn;
        $sql = "SELECT p.*, u.Username From informasi_novel AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=?";

        $stmt = executeQuery($sql, ['published'=> 1]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    function getNovelByPublisherId($publisher_id) {
        global $conn;
        $sql = "SELECT p.*, u.Username From informasi_novel AS p JOIN user AS u ON p.user_id=u.id WHERE p.published=? AND publisher_id=?";

        $stmt = executeQuery($sql, ['published'=> 1, 'publisher_id' => $publisher_id]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }

    function getInformasiPembuatanByJudulNovelId($judulnovel_id) {
        global $conn;
        $sql = "SELECT * FROM informasi_pembuatan WHERE judulnovel_id=?";
        
        $stmt = executeQuery($sql, ['judulnovel_id' => $judulnovel_id]);
        $record = $stmt->get_result()->fetch_assoc();
        return $record;
    }
    
    

    function searchNovel($term) {
        $match = '%' . $term .'%';
        global $conn;
        $sql = "SELECT 
            p.*, u.Username 
            From informasi_novel AS p 
            JOIN user AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.Judul_Novel Like ? OR p.Sinopsis LIKE ?";

        $stmt = executeQuery($sql, ['published'=> 1, 'Judul_Novel' => $term, 'Sinopsis'=> $match]);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
?>