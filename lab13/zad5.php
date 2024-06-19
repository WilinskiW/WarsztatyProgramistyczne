<?php
interface Animal
{
    function makeSound();
    function eat();
}

class Dog implements Animal
{

    function makeSound()
    {
        echo "Woof! \n";
    }

    function eat()
    {
        echo "The dog is eating\n";
    }
}

$dog = new Dog();
$dog->eat();
$dog->makeSound();
?>