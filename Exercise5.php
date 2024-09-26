<?php
$name = $section = $email = $password = $successMessage = "";
$nameErr = $sectionErr = $emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // Check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["section"])) {
        $sectionErr = "Section is required";
      } else {
        $section = test_input($_POST["section"]);
      }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // Check if e-mail address is valid or not
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = test_input($_POST["password"]);
        // Validating the password minimum length. 
        if (strlen($password) < 6) {
          $passwordErr = "Password must be at least 6 characters long";
        }
      }
}
//The message indicates that the inputs have been successfully submitted.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Group 5</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1, h2 {
    text-align: center;
    color: #000000;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px 0;
}

label {
    margin-bottom: 10px;
    font-size: 1.1rem;
    color: #555;
}

input[type="text"] {
    width: 60%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.response {
    margin-top: 30px;
    text-align: center;
    font-size: 1.2rem;
    color: #333;
    background-color: #e9ecef;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ddd;
}

hr {
    margin: 30px 0;
    border: 0;
    border-top: 1px solid #ccc;
}
    </style>     
</head>
<body>
<div class="center-box">
    <h2>INFOMATION</h2>
    <div class="success-message"><?php echo $successMessage; ?></div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <span class="error">* <?php echo $nameErr;?></span>
        <input type="text" name="name">

        <label for="section">Section:</label>
        <span class="error">* <?php echo $sectionErr;?></span>
        <input type="text" name="section">

        <label for="email">Email:</label>
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="text" name="email">

        <label for="password">Password:</label>
        <span class="error">* <?php echo $passwordErr;?></span>
        <input type="password" name="password" id="passwordField">
        <button type="submit">SUBMIT</button>

<!--This will output all the necessary information you inputted-->
<?php if (empty($nameErr) && empty($emailErr) && empty($sectionErr) && empty($passwordErr)) {
    $successMessage = "submitted successfully!";
?>
    <h2>Your Input:</h2>
    <p>Name: <?php echo $name; ?></p>
    <p>Section: <?php echo $section; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Password: <?php echo $password; ?></p>
<?php 
}
 ?>
    </form>
    <script>
    // Function to suggest a password automatically when the password field is been pointed
    function suggestPassword() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var passwords = JSON.parse(xhr.responseText);
                var passwordField = document.getElementById('passwordField');
                passwordField.placeholder = passwords[0]; // Suggest password in the placeholder
                  }
        };
        xhr.open('GET', 'passwords.php', true);
        xhr.send();
    }

    // Trigger the password suggestion when the user pointed on the password field
    document.getElementById('passwordField').addEventListener('focus', suggestPassword);
</script>
</body>
</html>

<?php
// Function to generate random password
function generateRandomPassword($length = 6) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomPassword;
}

$passwords = [];

// Generate random passwords and store them in the array
for ($i = 0; $i < 30; $i++) { // Generate 30 passwords
    $passwords[] = generateRandomPassword(6); // Each password is 6 characters long
}

// Return the passwords as a JSON response
header('Content-Type: application/json');
echo json_encode($passwords);
?>
