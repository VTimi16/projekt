<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "felhasznalokbazis";

// 1. Kapcsolódás adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// 2. Form adatok beolvasása
$felhasznalonev = $_POST['username'];
$jelszo = $_POST['password'];
$profilkep_nev = $_POST['profile_picture_choice'];

// 3. Jelszó hashelése
$hashed_password = password_hash($jelszo, PASSWORD_DEFAULT);

// 4. Profilkép beolvasása binárisan
$kep_utvonal = "TimiDeboProjektWeb/" . $profilkep_nev;
$profilkep_adat = file_get_contents($kep_utvonal);

// 5. Adatbázisba mentés
$stmt = $conn->prepare("INSERT INTO felhasznalok (felhasznalonev, email, jelszo, profilkep) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $felhasznalonev, $email, $hashed_password, $null); // trükk: utóbb átállítjuk BLOB-ra
$stmt->send_long_data(3, $profilkep_adat); // 4. paraméter indexe: 0-alapú (felhasznalonev: 0, email: 1, jelszo: 2, profilkep: 3)

if ($stmt->execute()) {
    echo "Sikeres regisztráció!";
} else {
    echo "Hiba történt: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
</body>
</html>