<?php
namespace App;

use PDO; // PDO klassini ishlatish

class User {

    public function __construct() {
        $this->pdo = DB::connect();
    }

    public function create(string $username, string $position, string $gender, string $phone) :bool
    {
        $query = "INSERT INTO Users (username, position, gender, phone) VALUES(:username, :position, :gender, :phone)";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);

        return $stmt->execute();
    }

    public function getUser(int $id)
    {
        $query = "SELECT * FROM Users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(int $id, string $username, string $position, string $gender, string $phone) :void
    {
        $query = "UPDATE Users SET username = :username, position = :position, gender = :gender, phone = :phone WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();
    }

    public function deleteUser(int $id):void
    {
        $query = "DELETE FROM Users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}
