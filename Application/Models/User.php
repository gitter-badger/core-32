<?php

namespace Brime\Models;

use Brime\Core\DatabaseFactory;

class User
{
    private $database;

    public function __construct()
    {
        $this->database = DatabaseFactory::getFactory()->getConnection();
    }

    public function get($userId)
    {

    }

    public function getByEmail($email) {}

    public function create($userId, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = $this->database->prepare("INSERT INTO users (userid, password) VALUES (:userid, :password)");
        $query->execute(array(
            ':userid' => $userId,
            ':password' => $passwordHash,
        ));

        if ($query->rowCount() == 1) {
            return true;
        }
        return false;
    }

    public function getEMailAddress($userId) {}
    public function setEMailAddress($userId, $email) {}
    public function setPassword($userId, $password) {}

    public function isAdmin($userId) { return false; }
}