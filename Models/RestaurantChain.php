<?php

namespace Models;

class RestaurantChain extends Company implements FileConvertible{
    private int $chainId;
    private array $Restaurantlocation;
    private string $cuisineType;
    private int $numberOfLocation;
    private bool $hasDriveThrough;
    private int $establishedYear;
    private string $parentCompany;


    public function __construct(
        string $companyname,int $foundingYear,string $description,string $website,string $phoneNumber,string $industry,
        string $ceo,bool $isPubliclyTraded,
        int $chainId, array $Restaurantlocation, string $cuisineType, int $numberOfLocation, bool $hasDriveThrough,
        int $establishedYear,string $parentCompany
    ) {
        parent::__construct( $companyname, $foundingYear, $description, $website, $phoneNumber, $industry, $ceo, $isPubliclyTraded); 
        
        $this->chainId = $chainId;
        $this->Restaurantlocation = $Restaurantlocation;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocation = $numberOfLocation; 
        $this->hasDriveThrough = $hasDriveThrough;
        $this->establishedYear = $establishedYear; 
        $this->parentCompany = $parentCompany;
    }

    public function toString():string{

        return "";
    }
    public function toHTML(): string{
        return sprintf("
            <div class='container'>
                <h1>Restaurant Chain Roghan, %s</h1>
                <div class='restaurant-chain'>
                    <div class='chain-info'>
                        <div class ='title'>
                            Restaurant Chain Information
                        </div>
                        <div class='chain-info-detail'>
                            <div class='chain-header'>
                                <h2>%s <span class='toggle-info'>^</span></h2>
                            </div>
                            <div class='chain-info-body'>
                                <p>Company Name: %s</p>
                                <p>Address: %s ZipCode: %s</p>
                                <div class='employees'>
                                    <h3>Employees:</h3>
                                    <ul>
                                        <li>ID: 9, Job Title: cashier, Lyric Predovic, Start Date: 2019-01-01</li>
                                        <li>ID: 230925964, Job Title: chef, Constance Jaskolski, Start Date: 2020-04-25</li>
                                        <li>ID: 2514, Job Title: cashier, Joaquin McKenzie, Start Date: 2023-03-24</li>
                                        %s
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>",
            $this->companyname,
            $this->cuisineType,
            $this->cuisineType,
            $this->Restaurantlocation[0]->getAddress(),
            $this->Restaurantlocation[0]->getZipcode(),
            $this->parentCompany,
            $this->cuisineType,
            $this->cuisineType
        );
    }
    public function toMarkdown(): string {
        return "## User: {$this->chainId}
                 - Email: {$this->cuisineType}
                 - Phone Number: {$this->numberOfLocation}
                 - Address: {$this->hasDriveThrough}
                 - Role: {$this->establishedYear}";

    }
    public function toArray(): array{
        return [];
    }



}
?>