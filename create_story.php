<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO stories (title, description) VALUES ('$title', '$description')";
    if (mysqli_query($conn, $query)) {
        $story_id = mysqli_insert_id($conn);
        header("Location: create_section.php?story_id=" . $story_id);
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
    <title>Create a New Story</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('navbar.php'); ?>

<div class="container">
    <h1>Create a New Story</h1>

    <form action="" method="POST">
        <label for="title">Story Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <button type="submit" class="btn">Create Story</button>
    </form>
</div>

</body>
</html>
