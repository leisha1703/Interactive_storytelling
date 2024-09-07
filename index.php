<?php
include('db_connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storytelling Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('navbar.php'); ?>

<div class="container">
    <h1>Welcome to the Interactive Storytelling Platform</h1>
    <p>Choose a story to begin your adventure.</p>

    <div class="stories-list">
        <?php
        $query = "SELECT * FROM stories";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($story = mysqli_fetch_assoc($result)) {
                echo "<div class='story-item'>";
                echo "<h2>" . $story['title'] . "</h2>";
                echo "<p>" . $story['description'] . "</p>";
                echo "<a href='read_story.php?story_id=" . $story['id'] . "' class='btn'>Start Reading</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No stories available yet. <a href='create_story.php'>Create one!</a></p>";
        }
        ?>
    </div>
</div>

</body>
</html>
