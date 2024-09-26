<?php
// Initialize variables
$name = $section = "";
$nameErr = $sectionErr = "";
$successMessage = "";

// Handle form submission with POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    // Section validation
    if (empty($_POST["section"])) {
        $sectionErr = "Section is required";
    } else {
        $section = test_input($_POST["section"]);
        if (!preg_match("/^[a-zA-Z0-9- ]*$/", $section)) {
            $sectionErr = "Only letters, numbers, and dashes allowed";
        }
    }

    // If no errors, show success message
    if (empty($nameErr) && empty($sectionErr)) {
        $successMessage = "Form submitted successfully with Name: $name and Section: $section";
    }
}

// Function to sanitize inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group 5 Form Example</title>
    <style>
        body, html {
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Centered form container */
        .center-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 500px;
            width: 350px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        form {
            width: 100%;
            margin-bottom: 20px;
        }

        input, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 12px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #3a1297;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #004a6f;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: -5px;
            margin-bottom: 10px;
        }

        .success {
            margin-top: 20px;
            padding: 12px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="center-box">
    <h2>GET and POST</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" required>
        <span class="error"><?php echo $nameErr;?><br></span>

        <label for="section">Section:</label>
        <input type="text" name="section" id="section" value="<?php echo htmlspecialchars($section); ?>" required>
        <span class="error"><?php echo $sectionErr;?><br><br></span>

        <button type="submit">Submit</button>
    </form>

    <!-- Success message -->
    <?php if (!empty($successMessage)): ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>
</div>

<!-- Display GET data if available -->
<?php if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)): ?>
    <div class="center-box">
        <h3>GET Request Data:</h3>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name'] ?? 'No name provided'); ?></p>
        <p><strong>Section:</strong> <?php echo htmlspecialchars($_GET['section'] ?? 'No section provided'); ?></p>
    </div>
<?php endif; ?>
</body>
</html>
