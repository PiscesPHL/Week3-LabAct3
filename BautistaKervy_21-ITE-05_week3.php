<?php

// Define a base class Vehicle to store core information common to all vehicles
class Vehicle
{
    // Private properties to store vehicle details
    private $make;
    private $model;
    private $year;

    // Constructor to initialize vehicle details
    public function __construct($make, $model, $year)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to get vehicle details (cannot be overridden)
    public final function getDetails()
    {
        // Return a formatted string with vehicle details
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Method to describe the vehicle (can be overridden by child classes)
    public function describe()
    {
        // Default description for a vehicle
        return "This is a vehicle.";
    }
}

// Define a Car class that extends Vehicle and adds additional information
class Car extends Vehicle
{
    // Private property to store the number of doors
    private $numberOfDoors;

    // Constructor to initialize car details
    public function __construct($make, $model, $year, $numberOfDoors)
    {
        // Call the parent constructor to initialize vehicle details
        parent::__construct($make, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    // Method to get the number of doors
    public function getNumberOfDoors()
    {
        return $this->numberOfDoors;
    }

    // Override the describe method to provide a car-specific description
    public function describe()
    {
        return "This is a car.";
    }
}

// Define a final Motorcycle class that extends Vehicle (cannot be further extended)
final class Motorcycle extends Vehicle
{
    // Constructor to initialize motorcycle details
    public function __construct($make, $model, $year)
    {
        // Call the parent constructor to initialize vehicle details
        parent::__construct($make, $model, $year);
    }

    // Override the describe method to provide a motorcycle-specific description
    public function describe()
    {
        return "This is a motorcycle.";
    }
}

// Define an ElectricVehicle interface with a chargeBattery method
interface ElectricVehicle
{
    // Method to charge the battery (must be implemented by classes that implement this interface)
    public function chargeBattery();
}

// Define an ElectricCar class that extends Car and implements ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle
{
    // Private property to store the battery level
    private $batteryLevel;

    // Constructor to initialize electric car details
    public function __construct($make, $model, $year, $numberOfDoors)
    {
        // Call the parent constructor to initialize car details
        parent::__construct($make, $model, $year, $numberOfDoors);
        $this->batteryLevel = 0;
    }

    // Implement the chargeBattery method to charge the battery
    public function chargeBattery()
    {
        $this->batteryLevel = 100;
        return "Battery charged to 100%.";
    }

    // Method to get the battery level
    public function getBatteryLevel()
    {
        return $this->batteryLevel;
    }

    // Override the describe method to provide an electric car-specific description
    public function describe()
    {
        return "This is an electric car.";
    }
}

// Testing the Implementation
$car = new Car("Toyota", "Camry", 2022, 4);
echo $car->getDetails() . "\n";
echo $car->describe() . "\n";
echo "Number of doors: " . $car->getNumberOfDoors() . "\n";

$motorcycle = new Motorcycle("Honda", "CBR500R", 2022);
echo $motorcycle->getDetails() . "\n";
echo $motorcycle->describe() . "\n";

$electricCar = new ElectricCar("Tesla", "Model 3", 2022, 4);
echo $electricCar->getDetails() . "\n";
echo $electricCar->describe() . "\n";
echo $electricCar->chargeBattery() . "\n";
echo "Battery level: " . $electricCar->getBatteryLevel() . "\n";
?>
