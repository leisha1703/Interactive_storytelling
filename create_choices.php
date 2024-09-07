<?php
include('db_connect.php');

$section_id = $_GET['section_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $choice_text = $_POST['choice_text'];
    $next_section_id = $_POST['next_section_id'];

    $query = "INSERT INTO choices (section_id, next_section_id, choice_text) VALUES ('$section_id', '$next_section_id', '$choice_text')";
    if (mysqli_query($conn, $query)) {
        header("Location: create_choices.php?section_id=" . $section_id);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Choices</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('navbar.php'); ?>

<div class="container">
    <h1>Add Choices for this Section</h1>

    <form action="" method="POST">
        <label for="choice_text">Choice Text:</label>
        <input type="text" name="choice_text" required>

        <label for="next_section_id">Next Section ID:</label>
        <input type="number" name="next_section_id" required>

        <button type="submit" class="btn">Add Choice</button>
    </form>
</div>

</body>
</html>
