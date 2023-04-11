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

    /**
     * Méthode permettant de vérifier si un id existe
     * @param int $id
     * 
     * @return bool
     */
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
     * Méthode permettant de récupérer toutes les catégories
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

    public static function getBySearch(string $search, int $limit, int $offset)
    {
        $db = Database::dbConnect();
        $query = 'SELECT `name`, `icon`, `id`
                FROM `categories`
                WHERE `name` LIKE :search 
                OR `icon` LIKE :search
                LIMIT :limit 
                OFFSET :offset ;';
        $sth = $db->prepare($query);
        $sth->bindValue(':search', '%'.$search.'%');
        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();
        
        return $result;
    }
    /**
     * Méthode permettant de récupérer une catégorie ou la liste des catégories
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
     * Méthode permettant d'ajouter une catégorie dans la base de donées
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
     * Méthode permettant de modifier une catégorie dans la base de données
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
     * Méthode permettant de supprimer une catégorie dans la base de données
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
    
    /**
     * Méthode pour récupérer les 4 premières catégories
     * @return [type]
     */
    public static function getFourthCategory()
    {
        $query =
            'SELECT * FROM `categories` LIMIT 4;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }
}
