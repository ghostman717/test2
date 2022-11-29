<?php

// 1. Create interface `IVehicle`.
// 2. Populate interface `IVehicle` with following methods: `getManufacturer`, `setManufacturer`, `getModel`, `setModel`, `drive`, `stop`.
//     1. `getManufacturer` accepts nothing and returns string
//     2. `setManufacturer` accepts one string parameter and returns `void`
//     3. `getModel` accepts nothing and returns string
//     4. `setModel` accepts one string parameter and returns `void`
//     5. `drive` accepts nothing and returns `void`
//     6. `stop` accepts nothing and returns `void`
// 3. Create abstract class `AbstractVehicle`.
// 4. `AbstractVehicle` has to fully implement interface `IVehicle` (class should contain implementation of all methods from `IVehicle` interface)
// 5. Methods `drive` and `stop` have to print string of the following structure: `<Manufacturer> <Model> is <driving/stopping>` . You can use any function you want such as echo or print_r
// 6. Create constructor that will initialize all class properties of `AbstractVehicle` by accepting parameters.
// 7. Create class `Car` .
// 8. Class `Car` has to extend `AbstractVehicle` .
// 9. Add new property to class `Car` . Name it however you want
// 10. Implement constructor to initialize all class properties including inherited ones. To initialize parent’s class properties call parent’s constructor
// 11. Create interface `IDataModel` .
// 12. Populate interface `IDataModel` with method `getData` . It accepts nothing and retuns `array`.
// 13. Class `Car` has to implement interface `IDataModel` and it’s method `getData` .
// 14. Method `getData` should return associative array with all class properties including inherited.


interface IVehicle 
{
  public function getManufacturer() : string;
  public function setManufacturer($Manufacturer) : void;
  public function getModel() : string;
  public function setModel($Model) : void;
  public function drive() : void;
  public function stop() : void;
}

abstract class AbstractVehicle implements IVehicle
{
  public $Manufacturer;
  public $Model;

  public function __construct($Manufacturer, $Model)
  {
    $this->Manufacturer = $Manufacturer;
    $this->Model = $Model;
  }

  public function setManufacturer($Manufacturer): void
  {
    $this->Manufacturer = $Manufacturer;
  }

  public function getManufacturer(): string
  {
    return $this->Manufacturer;
  }

  public function setModel($Model): void
  {
    $this->Model = $Model;
  }

  public function getModel(): string
  {
    return $this->Model;
  }

  public function drive(): void
  {
    echo $this->getManufacturer() . "" . $this->getModel() . "is Driving";
  }

  public function stop(): void
  {
    echo $this->getManufacturer() . "" . $this->getModel() . "is Stopping";
  }
}

class Car extends AbstractVehicle implements IDataModel
{
  public $McLaren;

  public function __construct($Model, $Manufacturer, $McLaren)
  {
    parent::__construct($Model, $Manufacturer, $McLaren);
    $this->McLaren = $McLaren;
  }

  public function getData(): array
  {
    $data = array(
      'Manufacturer' => $this->Manufacturer,
      'Model' => $this->Model,
      'McLaren' => $this->McLaren
    );

    return $data;
  }

}

interface IDataModel
{
  public function getData() : array;
}