<?php
require_once(__DIR__.'/Connect.php');

class Comment
{
    private int $id;
    private string $content;
    private string $validated_at;
    private string $created_at;
    private string $deleted_at;
    private int $id_quiz;
    private int $id_players;


    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setId($value):void
    {
        $this->id = $value;
    }
    /**
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setContent($value):void
    {
        $this->content = $value;
    }
    /**
     * @return string
     */
    public function getContent():string
    {
        return $this->content;
    }

    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setValidated_at($value):void
    {
        $this->validated_at = $value;
    }
    /**
     * @return string
     */
    public function getValidated_at():string
    {
        return $this->validated_at;
    }

    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setCreated_at($value):void
    {
        $this->created_at = $value;
    }
    /**
     * @return string
     */
    public function getCreated_at():string
    {
        return $this->created_at;
    }

    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setDeleted_at($value):void
    {
        $this->deleted_at = $value;
    }
    /**
     * @return string
     */
    public function getDeleted_at():string
    {
        return $this->deleted_at;
    }

    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setId_quiz($value):void
    {
        $this->id_quiz = $value;
    }
    /**
     * @return int
     */
    public function getId_quiz():int
    {
        return $this->id_quiz;
    }

    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setId_players($value):void
    {
        $this->id_players = $value;
    }
    /**
     * @return int
     */
    public function getId_players():int
    {
        return $this->id_players;
    }

    /**
     * Méthode permettant de récupérer la liste des commentaires
     * @return array
     */
    public static function getAll(): array
    {
        $query =
            'SELECT `comments`.`id` , `content`, `users`.`pseudo`, `users`.`email`, `comments`.`validated_at` 
            FROM `comments`
            LEFT JOIN `users`
            ON `comments`.`id_players` = `users`.`id`;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }
    /**
     * @param int $id_players
     * 
     * @return array
     */
    public static function getCommentsUser(int $id_players): array
    {
        $query =
            'SELECT `comments`.`id` , `comments`.`content`, `users`.`pseudo`, `users`.`email`, `comments`.`validated_at` , `quiz`.`name` as `quizName`
            FROM `comments`
            LEFT JOIN `users`
            ON `comments`.`id_players` = `users`.`id`
            LEFT JOIN `quiz`
            ON `comments`.`id_quiz` = `quiz`.`id`
            WHERE `id_players` = :id_players ;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id_players', $id_players, PDO::PARAM_INT);
        $sth->execute();
        $users = $sth->fetchAll();

        return $users;
    }

    /**
     * Méthode permettant de récupérer un commentaire ou la liste des commentaires
     * @param int $id
     * 
     * @return object
     */
    public static function get(int $id): object|bool
    {
        $db = Database::dbConnect();
        $query = 'SELECT `comments`.`id` , `content`, `users`.`pseudo`, `users`.`email`, `comments`.`validated_at` 
        FROM `comments`
        LEFT JOIN `users`
        ON `comments`.`id_players` = `users`.`id` 
        WHERE `comments`.`id` = :id ;';
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    /**
     * Méthode permettant d'ajouter un commentaire
     * @return bool
     */
    public function add(): bool
    {
        $db = Database::dbConnect();
        $query = 'INSERT INTO `comments` (`content`, `id_quiz`, `id_players`) VALUES (:content, :id_quiz, :id_players);';
        $sth = $db->prepare($query);
        $sth->bindValue(':content', $this->content, PDO::PARAM_STR);
        $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);
        $sth->bindValue(':id_players', $this->id_players, PDO::PARAM_INT);

        return $sth->execute();
    }
    /**
     * Méthode permettant de vérifier si un id existe
     * @param int $id
     * 
     * @return bool
     */
    public static function isIdExist(int $id): bool
    {
        $db = Database::dbConnect();
        $verifQuery = "SELECT `id` FROM `comments` WHERE `id` = :id ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':id', $id, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetch();
        return !empty($result);
    }

    /**
     * Méthode permettant de modifier un commentaire
     * @param int $id
     * 
     * @return bool
     */
    public function update(int $id): bool
    {
        $db = Database::dbConnect();
        $query = "UPDATE `comments` 
        SET `content`= :content,
            `validated_at`= :validated_at,
            `id_quiz` = :id_quiz,
            `id_players` = :id_players
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':content', $this->content, PDO::PARAM_STR);
        $sth->bindValue(':validated_at', $this->validated_at, PDO::PARAM_INT);
        $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);
        $sth->bindValue(':id_players', $this->id_players, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }
    /**
     * Méthode permettant de valider un commentaire
     * @param int $id
     * 
     * @return bool
     */
    public function validate(int $id): bool
    {
        $db = Database::dbConnect();
        $query = "UPDATE `comments` 
        SET `validated_at`= :validated_at
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':validated_at', $this->validated_at, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }

    public static function delete(int $id): array
    {
        $query =
            'DELETE FROM `comments` WHERE  `id` = :id ;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $users = $sth->fetchAll();

        return $users;
    }
}
