<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP PROGRAM</title>
</head>

<body>
    <?php
    // 1. Write a script for output which is given below:
        //   'Welcome PHP'
        //   "Hello world"
        //   $Hello PHPS
    echo "Welcome PHP<br>";
    echo "Hello world<br>";
    echo "\$Hello PHPS";


    // 2. Write a program to perform swapping of two numbers.
    $a = 10;
    $b = 20;

    echo "Before Swapping:<br>";
    echo "a = $a, b = $b<br>";

    $temp = $a;
    $a = $b;
    $b = $temp;

    echo "After Swapping:<br>";
    echo "a = $a, b = $b";


    // 3. Write a program to calculate the area of circle.
    $radius = 5;
    $area = 3.14 * $radius * $radius;

    echo "Radius = $radius<br>";
    echo "Area of Circle = $area";


    // 4.  Write a program to calculate the area of triangle.
    $base = 10;
    $height = 5;

    $area = 0.5 * $base * $height;

    echo "Base = $base<br>";
    echo "Height = $height<br>";
    echo "Area of Triangle = $area";


    // 5.  Write a program to calculate the area of rectangle.
    $length = 8;
    $width = 6;

    $area = $length * $width;

    echo "Length = $length<br>";
    echo "Width = $width<br>";
    echo "Area of Rectangle = $area";


    // 6.  Write a program to find the simple interest.
    $principal = 1000;
    $rate = 5;
    $time = 2;

    $simpleInterest = ($principal * $rate * $time) / 100;

    echo "Principal = $principal<br>";
    echo "Rate = $rate%<br>";
    echo "Time = $time years<br>";
    echo "Simple Interest = $simpleInterest";
    ?>
</body>

</html>