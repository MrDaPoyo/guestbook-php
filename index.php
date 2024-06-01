<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $message = $_POST['message'];

    // Validate the form data (you can add more validation if needed)
    if (empty($name) || empty($message)) {
        echo 'Please fill in all fields.';
    } else {
        // Save the guestbook entry to a file or database
        // For simplicity, we'll just append it to a text file
        $entry = "Name: $name\nMessage: $message\n\n";
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
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea><br>

        <input type="submit" value="Sign Guestbook">
    </form>
    <?php
    // Display the guestbook entries
    $entries = file_get_contents('guestbook.txt');
    echo "<h2>Guestbook Entries:</h2>";
    echo "<pre>$entries</pre>";
    // Save the guestbook entries to a file named "data"
    ?>

</body>
</html>