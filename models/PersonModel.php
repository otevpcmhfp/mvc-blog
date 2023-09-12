<?php

abstract class PersonModel {
    protected string $firstName;
    protected string $lastName;

    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName():string {
        return $this->lastName;
    }

    public function setFirstName(string $firstName):void {
        $this->firstName = $firstName;
    }

    public function getLastName():string {
        return $this->lastName;
    }

    public function setLastName(string $lastName):void {
        $this->lastName = $lastName;
    }

    abstract public function getFullName():string;
}