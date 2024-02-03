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
            <div class='user-card'>
                <div class='avatar'>Restaurant Chain Information</div>
                <h2>%s %s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>Birth Date: %s</p>
                <p>Membership Expiration Date: %s</p>
                <p>Role: %s</p>
            </div>",
            $this->companyname,
            $this->cuisineType."料理の種類",
            $this->numberOfLocation,
            $this->hasDriveThrough,
            $this->establishedYear,
            $this->parentCompany,
            $this->cuisineType,
            $this->cuisineType
        );
    }
    public function toMarkdown(): string {

        return "";

    }
    public function toArray(): array{
        return [];
    }



}
?>