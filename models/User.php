<?php
require_once(__DIR__.'/Connect.php');

class User
{
    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private int $points;
    private int $role;
    private DateTime $created_at;
    private DateTime $updated_at;
    private DateTime $deleted_at;
    private DateTime $validated_at;

    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setId($value)
    {
        $this->id = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setPseudo($value)
    {
        $this->pseudo = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setPoints($value)
    {
        $this->points = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setRole($value)
    {
        $this->role = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setCreated_at($value)
    {
        $this->created_at = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setUpdated_at($value)
    {
        $this->updated_at = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setDeleted_at($value)
    {
        $this->deleted_at = $value;
    }
    /**
     * @param mixed $value
     * 
     * @return [type]
     */
    public function setValidated_at($value)
    {
        $this->validated_at = $value;
    }

    /**
     * @return [type]
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return [type]
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
    /**
     * @return [type]
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @return [type]
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @return [type]
     */
    public function getPoints()
    {
        return $this->points;
    }
    /**
     * @return [type]
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @return [type]
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }
    /**
     * @return [type]
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }
    /**
     * @return [type]
     */
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }
    /**
     * @return [type]
     */
    public function getValidated_at()
    {
        return $this->validated_at;
    }

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $query =
            'SELECT * FROM `users`;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }
    public static function getUsersClassment()
    {
        $query =
            'SELECT `pseudo`, `points` FROM `users` ORDER BY  `points` DESC;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }

    public static function getTop3Users()
    {
        $query =
            'SELECT `pseudo`, `points` FROM `users` ORDER BY  `points` DESC LIMIT 3;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }

    /**
     * @param int $id
     * 
     * @return object
     */
    public static function get(int $id):object|bool 
    {
        $db = Database::dbConnect();
        $query = "SELECT * FROM `users` WHERE `id` = :id ;";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    /**
     * @param string $email
     * 
     * @return object
     */
    public static function getByEmail(string $email):object|bool 
    {
        $db = Database::dbConnect();
        $query = 'SELECT * FROM `users` WHERE `email` = :email ;';
        $sth = $db->prepare($query);
        $sth->bindValue(':email', $email);
        $sth->execute();
        $result = $sth->fetch();
 
        return $result;
    }

    public static function validateEmail(string $email):bool {
        $db = Database::dbConnect();
        $query = 'UPDATE `users` 
        SET
            `validated_at`= NOW() 
        WHERE `email` = :email';
        $sth = $db->prepare($query);
        $sth->bindValue(':email', $email);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }
    /**
     * @return bool
     */
    public function add(): bool
    {
        $db = Database::dbConnect();
        $query = 'INSERT INTO `users` (`pseudo`, `email`,`password`,`points`, `role`) VALUES (:pseudo, :email, :password, :points, :role);';
        $sth = $db->prepare($query);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->bindValue(':points', $this->points, PDO::PARAM_INT);
        $sth->bindValue(':role', $this->role, PDO::PARAM_INT);
        return $sth->execute();
    }

    public static function isMailExist(string $email): bool
    {
        $db = Database::dbConnect();
        $verifQuery = "SELECT `id` FROM `users` WHERE `email` = :email ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':email', $email, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetchAll();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    public static function isIdExist(int $id):bool
    {
        $db = Database::dbConnect();
        $verifQuery = "SELECT `id` FROM `users` WHERE `id` = :id ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':id', $id, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetch();
        return !empty($result);

    }
    public function updateAdmin(int $id): bool
    {
        $db = Database::dbConnect();
        $query = "UPDATE `users` 
        SET `pseudo`=:pseudo,
            `points`=:points,
            `role`= :role 
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':points', $this->points, PDO::PARAM_INT);
        $sth->bindValue(':role', $this->role, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }

    public function updateUser(int $id): bool
    {
        $db = Database::dbConnect();
        $query = "UPDATE `users` 
        SET `pseudo`=:pseudo,
            `email`=:email,
            `password`=:password
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }
    public static function delete(int $id): array
    {
        $query =
            'DELETE FROM `users` WHERE  `id` = :id ;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $users = $sth->fetchAll();

        return $users;
    }

    public function updatePoints($id) {
        $db = Database::dbConnect();
        $query = "UPDATE `users` 
        SET
            `points`=:points
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':points', $this->points, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }
}
