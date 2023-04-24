<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","silandak");


// fungsi registrasi
function registrasi($data){
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $level = "warga";

  // cek username sudah ada atau belum
  $cek = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");
  if(mysqli_fetch_assoc($cek)){
    echo "<script>alert('username sudah terdaftar!');</script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user ke database
  mysqli_query($conn, "INSERT INTO tb_user VALUES('','$username','$password','$level')");

  return mysqli_affected_rows($conn);
}

class CRUD {
  private $db;

  function __construct($db) {
    $this->db = $db;
  }

  function create($table, $data) {
    $fields = implode(',', array_keys($data));
    $values = implode(',', array_map(function ($value) {
        return "'" . $value . "'";
    }, array_values($data)));
    $query = "INSERT INTO $table ($fields) VALUES ($values)";
    $result = $this->db->query($query);
    return $result;
  }

  function read($table, $id = null) {
    $query = "SELECT * FROM $table";
    if ($id) {
        $query .= " WHERE id = $id";
    }
    $result = $this->db->query($query);
    return $result;
  }

  function update($table, $id, $data) {
    $set = implode(',', array_map(function ($key, $value) {
        return $key . "='" . $value . "'";
    }, array_keys($data), array_values($data)));
    $query = "UPDATE $table SET $set WHERE id = $id";
    $result = $this->db->query($query);
    return $result;
  }

  function delete($table, $id) {
    $query = "DELETE FROM $table WHERE id = $id";
    $result = $this->db->query($query);
    return $result;
  }
}
