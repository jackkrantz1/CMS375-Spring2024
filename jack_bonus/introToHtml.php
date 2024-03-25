<!DOCTYPE html>
<html>

<head>
    <title>
        Test HTML ?
    </title>
</head>

<body style="text-align:center;">

    <h1 style="color:green;">
        Test Code
    </h1>

    <?php
        
        if(array_key_exists('button', $_POST)) {
            button();
        }

        function button() {
            echo 'Hello World!';
        }

        if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button2() {
            echo 'Apples!';
        }

        if(array_key_exists('button3', $_POST)) {
            button3();
        }

        function button3() {
            echo 'Water';
        }

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the textbox is not empty
    if (!empty($_POST['userInput'])) {
        // Get the input from the form and sanitize it
        $userInput = htmlspecialchars($_POST['userInput']);
        
        // Echo the input back to the user
        echo "You entered: " . $userInput;
    } else {
        // If the textbox is empty, prompt the user to enter something
        echo "Please enter something in the textbox.";
    }
}

    ?>

    <form method="post">
        <input type="submit" name="button"
        class="button" value="Button" />

    <form method="post">
        <input type="submit" name="button2"
        class="button2" value="Button" />
 
    <form method="post">
        <input type="submit" name="button3"
        class="button3" value="Button" />


        
    <form action="introToHtml.php" method="post">
        <label for="userInput">Enter something:</label>
        <input type="text" id="userInput" name="userInput">
        <input type="submit" value="Submit">
    </form>


    <form action="jack.php">
        <input type="submit" value="Go to New Page" />
    </form> 




</body>
</html>
