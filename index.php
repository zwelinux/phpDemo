<!DOCTYPE html>
<html>
    <head>
        <style type='text/css'>
            * {
                margin: auto;
                max-width: 700px;
                margin-left: 20px;
            }

            h2 {
                padding-top: 20px;
                padding-bottom: 30px;
                font-size: 2.5em;
                font-weight: 700;
                color: #4d4d4d;
            }

            input {
                width: 250px;
                height: 30px;
                font-size: 1.3em;
            }

            .button {
                width: 120px;
                height: 40px;
                font-size: 1em;
                background-color: #03cafc;
                box-shadow: 3px 5px 5px #5d5d5d;
                border-radius: 7px;    
                border: #fff;  
            }

            .button:hover {
                width: 120px;
                height: 40px;
                font-size: 1em;
                background-color: #0c5e8a;
                color: #fff;
            }

        </style>
    </head>

<body>




<h2>Amazon Instance Pricing Calculator</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label><b>Instance ကုန်ကျငွေ (MMK Only)</b></label><br />
    <input type='text' name='instancePrice' value="<?php echo $instancePrice ?>" required='true' />
    <!-- $instancePrice -->
    <!-- $instancePriceError -->

    <br/><br />

    <label><b>တစ်လ နာရီစုစုပေါင်း (Default : 750)</b></label><br />
    <input type='text' name='totalWorkingHours' value="<?php echo $totalWorkingHours ?>" required='true' />
    <!-- $totalWorkingHours -->
    <!-- $totalWorkingHoursError -->

    <br /><br />
    <input type="submit" name="submit" class="button" value="Submit">
    <br /><br />
</form>


<?php 
    // $instancePriceError = "";
    // $totalWorkingHoursError = "";
    $instancePrice = "";
    $totalWorkingHours = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["instancePrice"])) {
            $instancePrice = "";
        } else {
            $instancePrice = test_input($_POST["instancePrice"]);
        }

        if (empty($_POST["totalWorkingHours"])) {
            $totalWorkingHours = "";
        } else {
            $totalWorkingHours = test_input($_POST["totalWorkingHours"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    echo "<h3>Answer Will Appear Here : ";
    echo $instancePrice / $totalWorkingHours . " MMK </h3>";

?>

</body>
</html>
