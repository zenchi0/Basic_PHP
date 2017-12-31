<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>SDEV 300 Lab 3</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="table.css" />
</head>
<body>
    <div class="ice">
        <section>
            <h1 class="title">Shapes</h1>
            <?php
                abstract class Shape {
                    abstract protected function calcArea();
                    abstract protected function calcPerim();
                    abstract protected function propertyArray();
                }
                class Circle extends Shape {
                    public $shapeName = "Circle";
                    public $imageLocation = "circle.png";
                    public $radius;
                    public function __construct($radius) {
                        $this->radius = $radius;
                    }
                    public function calcArea() {
                        $r = $this->radius;
                        echo nl2br("Area: ".(M_PI * (pow($r, 2)))." square meters.\n");
                    }
                    public function calcPerim() {
                        $r = $this->radius;
                        echo "Perimiter: ".(2 * (M_PI * $r))." meters";
                    }
                    public function propertyArray() {
                        $stringArray = array($this->calcArea(),
                                             $this->calcPerim());
                        return $stringArray;
                    }
                }
                class Rectangle extends Shape {
                    public $shapeName = "Rectangle";
                    public $imageLocation = "rectangle.png";
                    public $length;
                    public $width;
                    public function __construct($length, $width) {
                        $this->length = $length;
                        $this->width = $width;
                    }
                    public function calcArea() {
                        echo nl2br("Area: ".($this->length * $this->width)." square meters.\n");
                    }
                    public function calcPerim() {
                        echo "Perimiter: ".(2 * ($this->length + $this->width))." meters";
                    }
                    public function propertyArray() {
                        $stringArray = array($this->calcArea(),
                                             $this->calcPerim());
                        return $stringArray;
                    }
                }
                class Triangle extends Shape {
                    public $shapeName = "Triangle";
                    public $imageLocation = "triangle.png";
                    public $base;
                    public $height;
                    public function __construct($base, $height) {
                        $this->base = $base;
                        $this->height = $height;
                    }
                    public function calcArea() {
                        $a = $this->height;
                        $b = $this->base;
                        echo nl2br("Area: ".(.5 * ($b * $a))." square meters.\n");
                    }
                    public function calcPerim() {
                        $a = $this->height;
                        $b = $this->base;
                        echo "Perimiter: ".($a + $b + sqrt(pow($a, 2) + pow($b, 2)))." meters";
                    }
                    public function propertyArray() {
                        $stringArray = array($this->calcArea(),
                                             $this->calcPerim());
                        return $stringArray;
                    }
                }
                class Square extends Shape {
                    public $shapeName = "Square";
                    public $imageLocation = "square.png";
                    public $length;
                    public function __construct($length) {
                        $this->length = $length;
                    }
                    public function calcArea() {
                        echo nl2br("Area: ".($this->length * $this->length)." square meters.\n");
                    }
                    public function calcPerim() {
                        echo "Perimiter: " .(4 * $this->length)." meters";
                    }
                    public function propertyArray() {
                        $stringArray = array($this->calcArea(),
                                             $this->calcPerim());
                        return $stringArray;
                    }
                }
                $squareLength = 5.3; //meters
                $square = new Square($squareLength);
                $rectangleLength = 4.2; //meters
                $rectangleWidth = 5.6; //meters
                $rectangle = new Rectangle($rectangleLength, $rectangleWidth);
                $triangleBase = 10.2; //meters
                $triangleHeight = 5.4; //meters
                $triangle = new Triangle($triangleBase, $triangleHeight);
                $circleRadius = 2.65; //meters
                $circle = new Circle($circleRadius);

                printTable($circle, $rectangle, $triangle, $square);
                function printTable($circle, $rectangle, $triangle, $square) {
                    $shapes = array();
                    $shapeArray[0] = $circle;
                    $shapeArray[1] = $rectangle;
                    $shapeArray[2] = $triangle;
                    $shapeArray[3] = $square;
                    $counter= 1;
                    $newRow = false;
                    echo "<table>\n";
                    echo "\t</caption>\n";
                    foreach ($shapeArray as $shape) {
                        if (($counter % 2 == 0)) {
                            $newRow = false;
                        } else {
                            $newRow = true;
                        }
                        echo (($newRow) ? "<tr>\n\t<td>\n" : "\t<td>\n");
                        echo "\t\t<img src='{$shape->imageLocation}'
                                  alt='{$shape->shapeName}' title='{$shape->shapeName}'/>\n";
                        echo "\t\t<ul>\n";
                        $properties = $shape->propertyArray();
                        
                        echo "\t\t</ul>\n";
                        echo (($newRow) ? "\t</td>\n" : "\t</td>\n</tr>\n");
                        $counter++;
                    }
                    echo "</table>\n";
                }
            ?>
        </section>
    </div>
    <div class="ice">
        <section>
            <h1 class="title">Quote</h1>
            <?php
            $quote ="Don't fear failure. In great attempts it is glorius even to fail. - Bruce Lee";
            $quoteArray = array();
            $quoteArray["original"] = $quote;
            $quoteArray["replaced text"] = str_replace("failure", "the Reaper", $quote);
            $quoteArray["location of t's"] = charLocationString($quote, "t");
            $quoteArray["all upper case"] = strtoupper($quote);

            $counter = 1;
            $newRow = false;
            echo "<table>\n";
            foreach ($quoteArray as $key => $value) {
                $formattedKey = ucfirst($key);
                if (($counter % 2 == 0)) {
                    $newRow = false;
                } else {
                    $newRow = true;
                }
                echo (($newRow) ? "<tr>\n\t<td>\n" : "\t<td>\n");
                echo "\t\t<b>$formattedKey</b>\n";
                echo "\t\t<p>\n$value\n</p>\n";
                echo (($newRow) ? "\t</td>\n" : "\t</td>\n</tr>\n");
                $counter++;
            }
            echo "</table>\n";
            function charLocationString($quote, $char) {
                $position = 0;
                $returnString = "";
                while (($position = strpos($quote, $char, $position)) !== false) {
                    $returnString .= "The character '" . $char . "' was found at position: " .
                                      $position . "<br />\n";
                    $position++;
                }
                return $returnString;
            }
            ?>
        </section>
    </div>
    <div class="ice">
        <section>
            <h1 class="title">Patterns</h1>
            <table>
                <tr>
                    <td>
                        <pre><?php pattern1() ?></pre>
                    </td>
                    <td>
                        <pre><?php pattern2() ?></pre>
                    </td>
                </tr>
                <tr>
                    <td>
                        <pre><?php pattern3() ?></pre>
                    </td>
                    <td>
                        <pre><?php pattern4() ?></pre>
                    </td>
                </tr>
            </table>
            <?php
            function pattern1() {
                for ($i=1; $i <= 8; $i++) {
                    for ($n=1; $n <= $i ; $n++) {
                        echo $n . " ";
                    }
                    echo "\n";
                }
            }
            function pattern2() {
                for ($i=8; $i > 0; $i--) {
                    for ($n=1; $n <= $i; $n++) {
                        echo $n . " ";
                    }
                    echo "\n";
                }
            }
            function pattern3() {
                $numSpaces = 15;
                for ($i=1; $i <= 8; $i++) {
                    for ($spaces=1; $spaces < $numSpaces; $spaces++) {
                        echo " ";
                    }
                    for ($n=$i; $n > 0 ; $n--) {
                        echo $n . " ";
                    }
                    echo "\n";
                    $numSpaces = $numSpaces - 2;
                }
            }
            function pattern4() {
                $numSpaces = 0;
                for ($i=8; $i > 0 ; $i--) {
                    for ($spaces=0; $spaces < $numSpaces; $spaces++) {
                        echo " ";
                    }
                    for ($n=1; $n <= $i; $n++) {
                        echo $n . " ";
                    }
                    echo "\n";
                    $numSpaces = $numSpaces + 2;
                }
            }
            ?>
        </section>
    </div>
</body>
</html>
