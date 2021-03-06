<?php

namespace Training\Domain\Model\User\Identity;

use Common\Domain\Model\ProtectsInvariants;
use Training\Domain\Model\Credentials;
use Training\Domain\Model\FullName;

class User
{
    /**
     * @var UserId
     */
    private $id;

    private $name;

    private $lastName;

    private $username;

    private $passwordHash;

    use ProtectsInvariants;

    public function __construct(UserId $id, FullName $fullName, Credentials $credentials)
    {
       $this->id = $id;
       $this->name = $fullName->name();
       $this->lastName = $fullName->lastName();
       $this->username = $credentials->username();
       $this->passwordHash = $credentials->password();
    }

    /**
     * @return mixed
     */
    public function passwordHash()
    {
        return $this->passwordHash;
    }

    public function encryptPassword($password, $algorithm, callable $createHash)
    {
        $this->passwordHash = $createHash($password, $algorithm);

        return $this;
    }

    public function confirmPassword($password, $confirmPassword)
    {
        $this->assertSame($password, $confirmPassword, 'Password and confirm password must be equal');
    }

    public function authenticate($password, $passwordHash, callable $verify)
    {
        if (!$verify($password, $passwordHash)) {
            throw new UserException('Incorrect password');
        }
        return true;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return $this->id;
    }
}