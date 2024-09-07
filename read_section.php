<?php
include('db_connect.php');

$section_id = $_GET['section_id'];

$query = "SELECT * FROM story_sections WHERE id = '$section_id'";
$result = mysqli_query($conn, $query);
$section = mysqli_fetch_assoc($result);

$query = "SELECT * FROM choices WHERE section_id = '$section_id'";
$choices = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Story</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('navbar.php'); ?>

<div class="container">
    <h1>Story Section</h1>

    <p><?php echo $section['content']; ?></p>

    <div class="choices">
        <?php
        while ($choice = mysqli_fetch_assoc($choices)) {
            echo "<a href='read_section.php?section_id=" . $choice['next_section_id'] . "' class='btn'>" . $choice['choice_text'] . "</a>";
        }
        ?>
    </div>
</div>

</body>
</html>
