<?php

class Comment
{
    private int $id;
    private string $content;
    private string $validated_at;
    private string $created_at;
    private string $deleted_at;
    private int $id_quiz;
    private int $id_players;


    public function setId($value)
    {
        $this->id = $value;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function setValidated_at($value)
    {
        $this->validated_at = $value;
    }
    public function getValidated_at()
    {
        return $this->validated_at;
    }

    public function setCreated_at($value)
    {
        $this->created_at = $value;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setDeleted_at($value)
    {
        $this->deleted_at = $value;
    }
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }

    public function setId_quiz($value)
    {
        $this->id_quiz = $value;
    }
    public function getId_quiz()
    {
        return $this->id_quiz;
    }

    public function setId_players($value)
    {
        $this->id_players = $value;
    }
    public function getId_players()
    {
        return $this->id_players;
    }

    /**
     * @return array
     */
    public static function getAll(): array
    {
        $query =
            'SELECT `comments`.`id` , `content`, `users`.`pseudo`, `users`.`email`, `comments`.`validated_at` 
            FROM `comments`
            LEFT JOIN `users`
            ON `comments`.`id_players` = `users`.`id`;';
        $db = dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }

    public static function get(int $id): object|bool
    {
        $db = dbConnect();
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

    public function add(): bool
    {
        $db = dbConnect();
        $query = 'INSERT INTO `comments` (`content`, `validated_at`,`id_quiz`, `id_players`) VALUES (:content, :validated_at, :id_quiz, :id_players);';
        $sth = $db->prepare($query);
        $sth->bindValue(':content', $this->content, PDO::PARAM_STR);
        $sth->bindValue(':validated_at', $this->validated_at, PDO::PARAM_INT);
        $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);
        $sth->bindValue(':id_players', $this->id_players, PDO::PARAM_INT);

        return $sth->execute();
    }
    public static function isIdExist(int $id): bool
    {
        $db = dbConnect();
        $verifQuery = "SELECT `id` FROM `comments` WHERE `id` = :id ;";
        $verifEmail = $db->prepare($verifQuery);
        $verifEmail->bindValue(':id', $id, PDO::PARAM_STR);
        $verifEmail->execute();
        $result = $verifEmail->fetch();
        return !empty($result);
    }

    public function update(int $id): bool
    {
        $db = dbConnect();
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
    public function validate(int $id): bool
    {
        $db = dbConnect();
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
}
