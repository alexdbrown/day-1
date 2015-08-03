<?php
class Car
{
    public $make_model;
    public $price;
    public $miles;

    function __construct($make, $price, $miles)
    {
        $this->make_model = $make;
        $this->price = $price;
        $this->miles = $miles;
    }
}

$first_car = new Car("Honda CRV", 12000, "150,000");
$second_car = new Car("Tesla S", 53000, "20,000");
$third_car = new Car("Deron's Highschool Volvo", 5000, "170000)";

$cars_matching_search = array($first_car, $second_car, $third_car);

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
            echo "<li> $car->make_model </li>";
            echo "<ul>";
                echo "<li> $$car->price</li>";
                echo "<li> Miles: $car->miles </li>";
            echo "</ul>";
          }
      ?>
    </div>
  </body>
</html>