<?php
include('db_connect.php');

$story_id = $_GET['story_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $is_start = isset($_POST['is_start']) ? 1 : 0;
    $is_end = isset($_POST['is_end']) ? 1 : 0;

    $query = "INSERT INTO story_sections (story_id, content, is_start, is_end) VALUES ('$story_id', '$content', '$is_start', '$is_end')";
    if (mysqli_query($conn, $query)) {
        $section_id = mysqli_insert_id($conn);
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
    <title>Add Story Section</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('navbar.php'); ?>

<div class="container">
    <h1>Add a Section to Your Story</h1>

    <form action="" method="POST">
        <label for="content">Section Content:</label>
        <textarea name="content" required></textarea>

        <label for="is_start">Is this the starting section?</label>
        <input type="checkbox" name="is_start">

        <label for="is_end">Is this the ending section?</label>
        <input type="checkbox" name="is_end">

        <button type="submit" class="btn">Add Section</button>
    </form>
</div>

</body>
</html>
