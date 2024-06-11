<!DOCTYPE html>
<html>
<head>
    <title>Guestbook</title>
</head>
<body>
    <style>
        body {
            background-color: #FFFFCC;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #FF9900;
            font-size: 36px;
            text-align: center;
            text-shadow: 2px 2px #000000;
        }

        form {
            background-color: #FFFFFF;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin: auto;
        }

        input[type="text"],
        textarea {
            width: 90%;
            height: 50px;
            margin: 0 5%;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            margin-bottom: 10px;
            resize: vertical;
        }
        textarea {
            width: 90%;
            height: 50px;
            margin: 0 5%;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            margin-bottom: 10px;
            resize: vertical;
            margin: 0 5%;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #FF9900;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FFCC33;
        }

        h2 {
            color: #FF9900;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            color: #333333;
            margin-bottom: 10px;
        }
        h4 {margin: 0;}
    </style>
    <h1>Welcome to the Guestbook</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $name = $_POST['name'];
        $message = $_POST['message'];
        $date = date('d-m-Y');

        // Validate the form data (you can add more validation if needed)

        // Save the entry to a file or database
        $entry = [
            'name' => $name,
            'date' => $date,
            'message' => $message
        ];
        // Read existing entries
        
        // Save the updated entries to the file
        // Convert the entry to JSON format
        $entries = json_decode($entries, true); // Convert JSON to array

// Append the new entry to the existing entries
        $entries[] = $entry;

// Convert the updated entries back to JSON format
$jsonEntry = json_encode($entries);

// Save the JSON entry to the file
file_put_contents('entries.json', $jsonEntry);

        // Display a success message
        echo '<p>Thank you for signing the guestbook! :D</p>';
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea><br>

        <input type="submit" value="Sign Guestbook">
    </form>

    <h2>Guestbook Entries</h2>

    <?php
    // Read and display the guestbook entries
    $entries = file_get_contents('entries.json');
    $decodedEntries = json_decode($entries, true);
    if ($decodedEntries) {
        foreach ($decodedEntries as $entry) {
            echo $entry['name'] . ': ' . $entry['message'];
        }
    }
    ?>
</body>
</html>