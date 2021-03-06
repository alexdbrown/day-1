<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;

    function __construct($make, $price=null, $miles, $image)
    {
        $this->make_model = $make;
        $this->price = $price;
        $this->miles = $miles;
        $this->image = $image;

        if (is_null($price)) {
            $this->price = 5000;
        }
    }

    function setMake($new_make)
    {
        $this->make_model = $new_make;
    }

    function getMake()
    {
        return $this->make_model;
    }

    function setPrice($new_price)
    {
        $float_price = (float) $new_price;
        if ($float_price != 0) {
          $this->price = $float_price;
        }
    }

    function getPrice()
    {
        return $this->price;
    }

    function setMiles($new_miles)
    {
        $this->miles = $new_miles;
    }

    function getMiles()
    {
        return $this->miles;
    }

    function setImage($new_image)
    {
        $this->image = $new_image;
    }

    function getImage()
    {
        return $this->image;
    }
}

$first_car = new Car("Honda CRV", 12000, 150000, "img/jetta.jpg");
$second_car = new Car("Tesla S", 53000, 20000, "img/tesla.jpg");
$third_car = new Car("Deron's Highschool Volvo", 5000, 170000, "img/volvo.jpg");
$fourth_car = new Car("Jeep Cherokee", null, 68000, "img/cherokee.jpg");

$first_car->setMake("VW Jetta");
$second_car->setMiles(35000);
$third_car->setPrice(5800);

$cars = array($first_car, $second_car, $third_car, $fourth_car);

$cars_matching_search = array();
foreach ($cars as $car) {
    $car_price = $car->getPrice();
    $car_miles = $car->getMiles();
    if (empty($_GET["price"])) {
        if ($car_miles < $_GET["mileage"]) {
          array_push($cars_matching_search, $car);
        }
    } elseif (empty($_GET["mileage"])) {
        if ($car_price < $_GET["price"]) {
            array_push($cars_matching_search, $car);
        }
    } elseif ($car_price < $_GET["price"] && $car_miles < $_GET["mileage"]) {
        array_push($cars_matching_search, $car);
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="car.css" type="text/css" media="all">
    <title>Cars!</title>
  </head>
  <body>
    <div class="container">
      <h1>Available For Purchase</h1>
      <?php
          if (empty($cars_matching_search)) {
              echo "<h1>Uh. Oh! No cars available for you.</h1>";
            } else {
              foreach ($cars_matching_search as $car) {
                $car_make = $car->getMake();
                $car_price = $car->getPrice();
                $car_miles = $car->getMiles();
                $car_image = $car->getImage();

                echo "<h3> $car_make </h3>";
                echo "<img src=$car_image>";
                echo "<ul>";
                    echo "<li> $$car_price</li>";
                    echo "<li> Miles: $car_miles </li>";
                echo "</ul>";
              }
          }

      ?>
    </div>
  </body>
</html>
