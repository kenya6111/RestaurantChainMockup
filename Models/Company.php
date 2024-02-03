<?php

namespace Models;

class Company implements FileConvertible{
    protected string $companyname;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phoneNumber;
    private string $industry;
    private string $ceo;
    private bool $isPubliclyTraded;


    public function __construct(
         string $companyname, int $foundingYear, string $description, string $website,
         string $phoneNumber, string $industry, string $ceo, bool $isPubliclyTraded
    ) {
        $this->companyname = $companyname;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phoneNumber =$phoneNumber;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPubliclyTraded = $isPubliclyTraded;
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