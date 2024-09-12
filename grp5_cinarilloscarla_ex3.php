<?php
$fileName = 'sample.txt';


if (file_exists($fileName)) {
    echo "Carla Cinarillos.<br>";
    
    
 file_get_contents($fileName);
    $fileContents = file_get_contents($fileName);
    if ($fileContents === false) {
        echo "Error reading the file.\n";
    } else {
        echo "File contents:\n";
        echo $fileContents . "<br>";  


        $lines = file($fileName, FILE_IGNORE_NEW_LINES);
        if ($lines === false) {
            echo "Error reading the file lines.<br>";
        } else {
            echo "File lines:\n";
            foreach ($lines as $line) {
                echo $line . "\n";
            }
        }
    }
} else {
    echo "File does not exist.<br>";
    

    $initialContent = "This is the initial content of the file.\n";
    $result = file_put_contents($fileName, $initialContent);
    if ($result === false) {
        echo "Error writing to the file.<br>";
    } else {
        echo "File created and content written.<br>";
        
        
        if ($fileContents === false) {
            echo "Error reading the file.<br>";
        } else {
            echo "New file contents after creation:\n";
            echo $fileContents . "\n";
        }
    }
}
?>
