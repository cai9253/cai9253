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
      
            /* Reset some default styles */

      body, h1, h2, p, ul, li {
    margin: 0;
   padding: 0;
}

/* General styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

header {
    background: #3a1297;
    color: #fff;
    padding: 10px 0;
}

header .container {
    width: 80%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

main {
    padding: 20px 0;
}

main .container {
    width: 80%;
    margin: 0 auto;
}

section {
    margin-bottom: 20px;
}

form {
    display: grid;
    gap: 10px;
}

form label {
    display: block;
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
}

form button {
    padding: 10px 20px;
    background-color: #3a1297;
    color: #fff;
    border: none;
    cursor: pointer;
}

footer {
    background: #3a1297;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

footer .container {
    width: 80%;
    margin: 0 auto;
}
@media (max-width: 768px) {
    header .container {
        flex-direction: column;
        align-items: flex-start;
    }

    nav ul {
        flex-direction: column;
    }

    nav ul li {
        margin: 10px 0;
    }
}

h2{
    text-align: center;
}
hr{
    width: 100px;
    margin: 10px auto;
}
.members{
    display: flex;
    justify-content: center;
    align-items: center;
}
.team-mem{
    margin: 8px;
}
img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 40px;
}
h4,p{
    text-align: center;
    font-size: 12px;
    margin: auto;
}
ul{
    text-align: center;
    font-size: 12px;
    margin: auto;
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
