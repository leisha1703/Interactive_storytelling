<?php
include('db_connect.php');

$story_id = $_GET['story_id'];

$query = "SELECT * FROM story_sections WHERE story_id = '$story_id' AND is_start = 1";
$result = mysqli_query($conn, $query);
$section = mysqli_fetch_assoc($result);

if ($section) {
    $section_id = $section['id'];
    header("Location: read_section.php?section_id=$section_id");
} else {
    echo "This story does not have a starting section.";
}
?>
