<?php
$host = 'mysql';
$username = 'user';
$secret_path = '/run/secrets/mysql_user_password';
$password = file_get_contents($secret_path);
$dbname = 'test_db';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Podłączono do bazy danych, z uzyciem sekretu\n";
echo "<br>";

if (isset($_POST['button'])) {
    $query = "SELECT * FROM test";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Imie: " . $row['name'] . "<br>";
            echo "Nazwisko: " . $row['surname'] . "<br>";
            echo "Rok: " . $row['age'] . "<br>";
            echo "<br>";
        }
    } else {
        echo "niema danych";
    }
}

echo '<form method="POST">';
echo '<input type="submit" name="button" value="Zobacz dane z bazy!">';
echo '</form>';
