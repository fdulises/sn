<?php

interface user1{
    public function setName( string $name ): void;
    public function getName(): string;
    public function setAge( int $name ): void;
    public function getAge(): int;
}

class user implements user1{
    private $name;
    private $age;

    public function setName( string $name ): void{
        $this->name = $name;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setAge( int $age ): void{
        $this->age = $age;
    }

    public function getAge(): int{
        return $this->age;
    }
}