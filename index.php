<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    // Validate the form data (you can add more validation if needed)
    if (empty($name) || empty($message)) {
        echo 'Please fill in all fields.';
    } else {
        // Save the guestbook entry to a file or database
        // For simplicity, we'll just append it to a text file
        $entry = "$name\n$website\n$message\n\n";
        file_put_contents('guestbook.txt', $entry, FILE_APPEND);

        echo 'Thank you for signing the guestbook!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>

    <form method="POST" action="">
        <label for="name">What's your name?</label>
        <input type="text" name="name" id="name" required><br>
        <label for="website">What's your website's URL?</label>
        <input type="url" name="website" id="website"><br>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea><br>

        <input type="submit" value="Sign Guestbook" title="Submit form">
    </form>
    <?php
    // Display the guestbook entries
    $entries = file_get_contents('guestbook.txt');
    echo "<h2>Guestbook Entries:</h2>";
    $entriesArray = explode("\n\n", $entries);
    foreach ($entriesArray as $entry) {
        echo "<div class='card'>";
        echo "<pre>$entry</pre>";
        echo "</div>";
    }
    ?>

</body>
</html>