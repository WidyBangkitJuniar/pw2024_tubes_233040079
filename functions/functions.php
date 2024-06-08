<?php

function query($query)
{

    // Koneksi ke database
    global $con;

    // Query ke tabel mahasiswa
    $result = mysqli_query($con, $query);

    // Menyiapkan data mahasiswa
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data)
{
    global $con;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
  
    $query = "INSERT INTO mahasiswa VALUES (null, '$nama', '$nim', '$email', '$jurusan')";
  
              mysqli_query($con, $query) or die(mysqli_error($con));

              return mysqli_affected_rows($con);
}

function hapus($id)
{
    global $con;
    mysqli_query($con, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($con);
}

function ubah($data)
{
    global $con;

    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']); 
  
    $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', email = '$email', jurusan = '$jurusan' WHERE id = $id";
  
              mysqli_query($con, $query) or die(mysqli_error($con));

              return mysqli_affected_rows($con);
}

function registrasi($data) {
    global $con;

    $username = htmlspecialchars(ucwords(stripslashes($data["username"])));
    $password1 = htmlspecialchars(mysqli_real_escape_string($con, $data["password1"]));

    $password1 = password_hash($password1, PASSWORD_DEFAULT);

    mysqli_query($con, "INSERT INTO user(username, password) VALUES ('$username', '$password1')");

    return mysqli_affected_rows($con);
}
?>