<?php

namespace Models;
use Models\User;
use Models\FileConvertible;

class Employee extends User implements FileConvertible{
    private string $jobType;
    private int $salary;
    private \DateTime $hireDate;
    private string $award;


    public function __construct(
         string $jobType, int $salary, \DateTime $hireDate, string $award
    ) {
        $this->jobType = $jobType;
        $this->salary = $salary;
        $this->hireDate = $hireDate;
        $this->award = $award;
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