<?php

namespace Models;

use Faker\Extension\FileExtension;

class RestaurantLocation implements FileConvertible{
    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private  array $employees;
    private bool $isOpen;
    private bool $hasDriveThrought;

    public function __construct(
        string $name, string $address, string $city, string $state, string $zipCode,
        array $employees,bool $isOpen,bool $hasDriveThrought,
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state; 
        $this->zipCode = $zipCode;
        $this->employees = $employees; 
        $this->hasDriveThrought = $hasDriveThrought;
    }

    public function toString():string{

        return "";
    }
    public function toHTML(): string{
        return "";
    }
    public function toMarkdown(): string {

        return "";

    }
    public function toArray(): array{
        return [];
    }



}
?>