<!-- ASSIGNMENT NO-12 -->
 
<!DOCTYPE html>
<html>
<head>
    <title>PHP ASSIGNMENT</title>
</head>
<body>

    <!-- 1. Take number as input and on the click of button print the cube of that number.  -->
    <hr>
    <h2>Cube of a number</h2>
    <form method="get">
        <input type="number" name="a1" value="" placeholder="Enter number" required>
        <br><br>
        <input type="submit" name="btn1" value="Cube">
    </form>

    <?php
    if (isset($_GET['btn1'])) {
        $num = $_GET['a1'];
        $cube = $num * $num * $num;
        echo "Cube of ", $num, " is: ", $cube;
    }
    ?><br><br><br>




    <!-- 2. Take number as input and on the click of button print the table of that number.  -->
    <hr>
    <h2>Table</h2>
    <form method="get">
        <input type="number" name="t1" value="" placeholder="Enter number" required>
        <br><br>
        <input type="submit" name="btn2" value="Table">
    </form>

    <?php
    if (isset($_GET['btn2'])) {
        $n = $_GET['t1'];

        for ($i = 1; $i <= 10; $i++) {
            echo $n . " x " . $i . " = " . ($n * $i) . "<br>";
        }
    }
    ?> <br><br><br>




    <!-- 3. Take number as input and on the click of button print the factorial of that number.  -->
    <HR>
    <h2>Factorial</h2>
    <form method="get">
        <input type="number" name="c1" value="" placeholder="Enter number" required>
        <br><br>
        <input type="submit" name="btn3" value="Factorial">
    </form>

    <?php
    if (isset($_GET['btn3'])) {
        $number = $_GET['c1'];
        $fact = 1;

        for ($i = 1; $i <= $number; $i++) {
            $fact *= $i;
        }

        echo "Factorial of ", $number, " is: ", $fact;
    }
    ?><br><br><BR>    <h2>Enter 5 Subject Marks</h2>




    <!-- 4. Take number as input and on the click of button check it is prime or not.  -->
    <hr>
    <h2>Check prime number</h2>
    <form method="get">
        <input type="number" name="d1" value="" placeholder="Enter number" required>
        <br><br>
        <input type="submit" name="btn4" value="Check prime or not"><br>
    </form>

    <?php
    if (isset($_GET['d1'])) {
        $p = $_GET['d1'];
        $isPrime = true;

        if ($p <= 1) {
            $isPrime = false;
        }

        for ($i = 2; $i <= sqrt($p); $i++) {
            if ($p % $i == 0) {
                $isPrime = false;
                break;
            }
        }

        if ($isPrime) {
            echo "$p is a prime number";
        } else {
            echo "$p is not a prime number";
        }
    }
    ?><br><br><br>



    <!-- 5. Take 5 subject marks,print totla marks and percentage.-->
    <hr>
    <h2>Enter 5 Subject Marks</h2>
     <form method="get">
        <input type="number" name="s1" placeholder="Subject 1" required><br><br>
        <input type="number" name="s2" placeholder="Subject 2" required><br><br>
        <input type="number" name="s3" placeholder="Subject 3" required><br><br>
        <input type="number" name="s4" placeholder="Subject 4" required><br><br>
        <input type="number" name="s5" placeholder="Subject 5" required><br><br>
        <input type="submit" name="btn5" value="Calculate"><br>
    </form>

    <?php
    if (isset($_GET['btn5'])) {
        $total = $_GET['s1'] + $_GET['s2'] + $_GET['s3'] + $_GET['s4'] + $_GET['s5'];
        $percentage = $total / 5;

        echo "Total Marks: ", $total;
        echo "<br>Percentage: ", $percentage;
    }
    ?><br><br><br>



    <!-- 6. Calcualate Total salary-->
    <hr>
    <h2>Employee Salary Calculator</h2>
    <form method="get">
        <input type="number" name="bs" placeholder="Basic Salary" required><br><br>
        <input type="number" name="hr" placeholder="HRA" required><br><br>
        <input type="number" name="da" placeholder="DA" required><br><br>
        <input type="submit" name="btn6" value="Calculate Salary"><br>
    </form>

    <?php
    if (isset($_GET['btn6'])) {
        $total = $_GET['bs'] + $_GET['hr'] + $_GET['da'];
        echo "Total Salary: ₹", $total;
    }
    ?><br><br><br>



    <!-- 7.Grade system based om marks -->
    <hr>
    <h2>Enter Marks</h2>
    <form method="get">
        <input type="number" name="m" placeholder="Enter Marks" required><br><br>
        <input type="submit" name="btn7" value="Check Grade"><br>
    </form>

    <?php
    if (isset($_GET['btn7'])) {
        $marks = $_GET['m'];
        if ($marks >= 90) {
            echo "Grade A+";
        } elseif ($marks >= 80) {
            echo "Grade A";
        } elseif ($marks >= 70) {
            echo "Grade B+";
        } elseif ($marks >= 60) {
            echo "Grade B";
        } elseif ($marks >= 50) {
            echo "Grade C";
        } else {
            echo "Fail";
        }
    }
    ?>

</body>
</html>