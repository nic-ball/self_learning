<!DOCTYPE html>
    <html>
<head>
    <title>PHP</title>
    <body>
<?php
$name = '';
$gender = '';
$color = '';


if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    }
    if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
    } else {
        $gender = $_POST['gender'];
    }
    if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
    } else {
        $color = $_POST['color'];
    }

$username = "root";
$password = "London2016";
$dbname = "plural";

try {
    $conn = new PDO("mysql:host=localhost;dbname=plural", 'root', 'London2016');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = sprintf("INSERT INTO users (name, gender, color)
    VALUES ('%s', '%s', '%s')");
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
}

?>

<form method="post" action="">
    User name: <input type="text" name="name" value="<?php
    echo htmlspecialchars($name);
    ?>"><br>
    Gender:
    <input type="radio" name="gender" value="f"<?php
    if ($gender === 'f') {
        echo ' checked';
    }
    ?>>female
    <input type="radio" name="gender" value="m"<?php
    if ($gender === 'm') {
        echo ' checked';
    }
    ?>>male<br>
    Favorite colour:
    <select name="color">
        <option value="">Please select</option>
        <option value="#f00"<?php
        if ($color === '#f00') {
            echo ' checked';
        }
        ?>>red</option>
        <option value="#0f0"<?php
        if ($color === '#0f0') {
            echo ' checked';
        }
        ?>>green</option>
        <option value="#00f"<?php
        if ($color === '#00f') {
            echo ' checked';
        }
        ?>>blue</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">

</body>
</head>
</html>