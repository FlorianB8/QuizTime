<?php
require_once(__DIR__ . '/Connect.php');

class Quiz
{
    private int $id;
    private string $name;
    private string $created_at;
    private string $updated_at;
    private string $deleted_at;
    private int $id_categories;

    /**
     * @return [type]
     */
    public function getId()
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
     * @return [type]
     */
    public function getName()
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
     * @return [type]
     */
    public function getCreated_at()
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
     * @return [type]
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setUpdated_at($value): void
    {
        $this->updated_at = $value;
    }

    /**
     * @return [type]
     */
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setDeleted_at($value): void
    {
        $this->deleted_at = $value;
    }

    /**
     * @return [type]
     */
    public function getId_categories()
    {
        return $this->id_categories;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setId_categories($value): void
    {
        $this->id_categories = $value;
    }


    /**
     * @param int $id
     * 
     * @return object
     */
    public static function get(int $id): object|bool
    {
        $db = Database::dbConnect();
        $query =
            'SELECT  `quiz`.`name` as "quizName", `quiz`.`id` as "id_quiz", `categories`.`name` as "categoryName", `id_categories`, `icon` 
        FROM `quiz` 
        LEFT JOIN `categories`
        ON `quiz`.`id_categories` = `categories`.`id` 
        WHERE `quiz`.`id` = :id ;';
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }
    public static function isIdExist(int $id): bool
    {
        $db = Database::dbConnect();
        $verifQuery = "SELECT `id` FROM `quiz` WHERE `id` = :id ;";
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
            'SELECT `quiz`.`id` as "id_quiz", `quiz`.`name` as "quizName", `categories`.`name` as "categoryName", `id_categories` 
            FROM `quiz` 
            LEFT JOIN `categories` 
            ON `quiz`.`id_categories` = `categories`.`id`;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $quizzes = $sth->fetchAll();

        return $quizzes;
    }
    
    public static function getBySearch(string $search, int $limit, int $offset)
    {
        $db = Database::dbConnect();
        $query = 'SELECT `quiz`.`name` AS `quizName`, `categories`.`name` AS `categoryName`, `quiz`.`id`
                FROM `quiz`
                JOIN `categories`
                ON `categories`.`id` = `quiz`.`id_categories`
                WHERE `categories`.`name` LIKE :search 
                OR `quiz`.`name` LIKE :search
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
     * @return bool
     */
    public function add(): bool
    {
        $db = Database::dbConnect();
        $query = 'INSERT INTO `quiz` (`name`, `id_categories`) VALUES (:name, :id_categories);';
        $sth = $db->prepare($query);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
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
        $query = "UPDATE `quiz` 
        SET `name`= :name,
            `id_categories`= :id_categories,
            `updated_at` = :updated_at
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':name', $this->name, PDO::PARAM_STR);
        $sth->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $sth->bindValue(':updated_at', $this->updated_at, PDO::PARAM_STR);
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
            'DELETE FROM `quiz` WHERE  `id` = :id ;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public static function getThirdQuiz()
    {
        $query =
            'SELECT * FROM `quiz` LIMIT 3;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $quizzes = $sth->fetchAll();

        return $quizzes;
    }

    public static function getByCategory(int $id_categories)
    {
        $query =
            'SELECT  `quiz`.`id` AS `id_quiz` , `quiz`.`name` , `categories`.`id` AS `id_categories`
            FROM `quiz` 
            JOIN `categories`
            ON `quiz`.`id_categories` = `categories`.`id`
            WHERE `id_categories` = :id_categories;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id_categories', $id_categories, PDO::PARAM_INT);
        $sth->execute();
        $quizzes = $sth->fetchAll();

        return $quizzes;
    }
}
