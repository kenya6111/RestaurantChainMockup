<?php

namespace Helpers;

use Faker\Factory;
use Models\FileConvertible;
use Models\User;
use Models\RestaurantChain;
use Models\Employee;
use Models\RestaurantLocation;

class RandomGenerator implements FileConvertible {
    public static function employee(int $NumberOffee): Employee {
        $faker = Factory::create();
        $jobTypeNumber = $faker ->numberBetween(0, 3);
        $jobTypeList=["receptionist","kitchen","manager","hall"];

        $awardNumber = $faker ->numberBetween(0, 3);
        $awardList=["awardA","awardB","awardC","awardD"];  

        return new Employee(
            $jobTypeList[$jobTypeNumber],
            $NumberOffee,
            $faker->dateTime(),
            $awardList[$awardNumber],
        );
    }

    public static function restaurantLocation(int $NumberOfEmployees, int $NumberOffee, int $NumberOfzipcode): RestaurantLocation {
        $faker = Factory::create();
        $employees=[];

        //従業員リストを生成
        for($i = 0;$i < $NumberOfEmployees; $i++ ){
            $employees[$i] = self::employee($NumberOffee);
        }

        return new RestaurantLocation(
            $faker->company(),
            $faker->address(),
            $faker->catchPhrase(),
            $faker->url,
            $NumberOfzipcode,
            $employees,
            $faker->boolean,
            $faker->boolean,
        );
    }

    public static function restaurantchain(int $NumberOfemployees, int $NumberOffee, int $NumberOflocations, int  $NumberOfzipcode): RestaurantChain {
        $faker = Factory::create();
        $restaurantLocations=[];

        //restaurantLocationリストを生成
        for($i = 0;$i < $NumberOflocations; $i++ ){
            $restaurantLocations[$i] = self::restaurantLocation($NumberOfemployees, $NumberOffee, $NumberOfzipcode);
        }
        
    
        return new RestaurantChain(
            //company
            $faker->company(),
            $faker->year(),
            $faker->catchPhrase(),
            $faker->url,
            $faker->phoneNumber,
            $faker->word,
            $faker->name,
            $faker->boolean,

            //restaurantChain
            $faker->unique()->numberBetween(1, 1000),
            $restaurantLocations,
            $faker ->word,
            $NumberOflocations,
            $faker ->boolean,
            $faker ->year(),
            $faker ->name
        );
    }

    public static function restaurantchains(int $NumberOfrestaurant, int $NumberOfemployees, int $NumberOffee, int  $NumberOflocations, int $NumberOfzipcode): array {
        $faker = Factory::create();
        $restaurantChains = [];

        for ($i = 0; $i < $NumberOfrestaurant; $i++) {
            $restaurantChains[] = self::restaurantchain($NumberOfemployees,  $NumberOffee,   $NumberOflocations,  $NumberOfzipcode);
        }

        return $restaurantChains;
    }

    public static function user(): User {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
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