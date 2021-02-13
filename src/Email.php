<?php
declare(strict_types=1);

//This is the final class and cannot make a subclass from this, and it cannot be a parent class
//Returns the instance that is created after the constructor is called
//This instance of $email is then used and tested on with the UnitTest
final class Email
{
    //Variable will take the data type that is assigned to it so no need to delcare the data type
    //Declared private to the class
    private $email;
    //Using strict data types here in the declaration so that if a number is passed through it will not auto convert the input
    //And rather will throw an exception
    //Magic method
    private function __construct(string $email) {
        //passes email to the function that validates the email address
        $this->ensureIsValidEmail($email);
        //assigns the results of the validation to $email
        $this->email = $email;
    }

    public static function fromString(string $email): self {
        return new self($email);
    }
    //magic method
    public function __toString(): string {
        //instance variable access through the this->
        return $this->email;
    }

    //Takes a string with a void return type
    private function ensureIsValidEmail(string $email): void {
        //built in php function checks to see if email is a valid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           //throw an exception for invalid arguement
            throw new InvalidArgumentException (
                sprintf('"%s" is not a valid email address', $email)
            );
        }
    }
}
?>