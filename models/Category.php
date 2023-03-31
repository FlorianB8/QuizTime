<?php
require_once(__DIR__.'/Connect.php');

class Category
{
    private int $id;
    private string $name;
    private string $icon;
    private DateTime $created_at;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setId($value): void
    {
        $this->id = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setName($value): void
    {
        $this->name = $value;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setIcon($value): void
    {
        $this->icon = $value;
    }

    /**
     * @return DateTime
     */
    public function getCreated_at(): DateTime
    {
        return $this->created_at;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setCreated_at($value): void
    {
        $this->created_at = $value;
    }

    public static function isIdExist(int $id):bool
    {
        $db = Database::dbConnect();
        $verifQuery = "SELECT `id` FROM `categories` WHERE `id` = :id ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':id', $id, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetch();
        return !empty($result);

    }
    /**
     * @return array
     */
    public static function getAll(): array
    {
        $query =
            'SELECT * FROM `categories`;';
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
        $query = "SELECT * FROM `categories` WHERE `id` = :id ;";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }
    
    /**
     * @return bool
     */
    public function add(): bool
    {
        $db = Database::dbConnect();
        $query = 'INSERT INTO `categories` (`name`, `icon`) VALUES (:name, :icon);';
        $sth = $db->prepare($query);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':icon', $this->icon, PDO::PARAM_STR);
        return $sth->execute();
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function update(int $id): bool
    {
        $db = Database::dbConnect();
        $query = "UPDATE `categories` 
        SET `name`= :name,
            `icon`= :icon
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':icon', $this->icon, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }

    /**
     * @param int $id
     * 
     * @return array
     */
    public static function delete(int $id): array
    {
        $query =
            'DELETE FROM `categories` WHERE  `id` = :id ;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $users = $sth->fetchAll();

        return $users;
    }
}
