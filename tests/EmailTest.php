<?php
//designates the use of strict data types
//forces the matching types of data passed in
declare(strict_types=1);

//set required resources
use PHPUnit\Framework\TestCase;
//Directory of the location of code that we are testing
require __DIR__ . '/../src/Email.php';

//EmailTest extendes TestCase
//\vendor\PHPUnit\Framework\TestCase - EmailTest is a TestCase
//TestCase is the parent EmailTest has everything that TestCase does + a little more
final class EmailTest extends TestCase {

    //Test has one Assert - sign of a good UnitTest
    public function testCanBeCreatedFromValidEmailAddress(): void {
        //assertInstanceOf is part of TestCase
        $this->assertInstanceOf(
            //confirms that the method "fromString" returns and instance of the class that is an email
            Email::class,
            //passing a good email address
            Email::fromString('user@example.com')
        );
    }

    //Similar to above but are passing in an invalid value
    //Expect an exception to be thrown (based off of class Email - ensureIsValidEmail )
    public function testCannotBeCreatedFromInvalidEmailAddress(): void {
        //expectException part of TestCase
        //Exception as thrown by the class Email
        //this exception test Should match what we get when we call fromString
        $this->expectException(InvalidArgumentException::class);//function inside of class = method
        //passing in an invalid arguement "invalid"
        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void {
        //Calls fromString method and compares the results to the value provided
        $this->assertEquals(
            //saying this sting is = to the result of the class that comes from "fromString"
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}

?>