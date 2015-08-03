<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;

    function __construct($make, $price=null, $miles)
    {
        $this->make_model = $make;
        $this->price = $price;
        $this->miles = $miles;

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

}

$first_car = new Car("Honda CRV", 12000, "150,000");
$second_car = new Car("Tesla S", 53000, "20,000");
$third_car = new Car("Deron's Highschool Volvo", 5000, "170,000");
$fourth_car = new Car("Jeep Cherokee", null, "68,000");

$first_car->setMake("VW Jetta");
$second_car->setMiles("35,000");
$third_car->setPrice("5800");

$cars_matching_search = array($first_car, $second_car, $third_car, $fourth_car);

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Cars!</title>
  </head>
  <body>
    <div class="container">
      <?php
          foreach ($cars_matching_search as $car) {
            $car_make = $car->getMake();
            $car_price = $car->getPrice();
            $car_miles = $car->getMiles();
            echo "<li> $car_make </li>";
            echo "<ul>";
                echo "<li> $$car_price</li>";
                echo "<li> Miles: $car_miles </li>";
            echo "</ul>";
          }
      ?>
    </div>
  </body>
</html>
