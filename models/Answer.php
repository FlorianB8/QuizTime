<?php 
require_once(__DIR__.'/Connect.php');

class Answer {
    private int $id;
    private string $answer;
    private string $created_at;
    private int $id_question;
    private string $choice;
/**
 * @return int
 */
public function getId():int{
    return $this->id;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setId($value):void{
    $this->id = $value;
}

/**
 * @return int
 */
public function getChoice():int{
    return $this->choice;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setChoice($value):void{
    $this->choice = $value;
}
/**
 * @return string
 */
public function getAnswer():string{
    return $this->answer;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setAnswer($value):void{
    $this->answer = $value;
}

/**
 * @return string
 */
public function getCreated_at():string{
    return $this->created_at;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setCreated_at($value):void{
    $this->created_at = $value;
}

/**
 * @return int
 */
public function getId_question():int{
    return $this->id_question;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setId_question($value):void{
    $this->id_question = $value;
}

/**
 * Méthode pour récupérer une réponse ou une liste de réponses
 * @param int $id
 * 
 * @return array
 */
public static function get(int $id = NULL):array|bool
{
    $db = Database::dbConnect();
    $query = 'SELECT *
                FROM `answers`' .
            (($id) ? 'WHERE `id_questions` = :id' : '');
    $sth = $db->prepare($query);
    (($id) ? $sth->bindValue(':id', $id, PDO::PARAM_INT) : '');
    $sth->execute();
    $result = $sth->fetchAll();

    return $result;
}
/**
 * Méthode pour récupérer la liste des réponses
 * @return array
 */
public static function getAll(): array
{
    $query =
        'SELECT * FROM `answers` ;';
    $db = Database::dbConnect();
    $sth = $db->query($query);
    $users = $sth->fetchAll();

    return $users;
}

/**
 * Méthode pour ajouter une réponse dans la base de données
 * @return bool
 */
public function add(): bool
{
    $db = Database::dbConnect();
    $query = 'INSERT INTO `answers` (`answer`, `choice`,`id_questions`) VALUES (:answer, :choice, :id_questions);';
    $sth = $db->prepare($query);
    $sth->bindValue(':answer', $this->answer, PDO::PARAM_STR);
    $sth->bindValue(':choice', $this->choice, PDO::PARAM_STR);
    $sth->bindValue(':id_questions', $this->id_question, PDO::PARAM_INT);

    return $sth->execute();
}

/**
 * Méthode pour récupérer toutes les réponses d'une question
 * @param int $id
 * 
 * @return [type]
 */
public static function getAllAnswersQuestion (int $id)
{
    $query =
        'SELECT `id`, `answer`, `choice`, `id_questions`  
        FROM `answers` 
        WHERE `id_questions` = :id_questions ;';
    $db = Database::dbConnect();
    $sth = $db->prepare($query);
    $sth->bindValue(':id_questions', $id, PDO::PARAM_INT);
    $sth->execute();
    $questions = $sth->fetchAll();

    return $questions;
}

/**
 * Méthode pour modifier une réponse dans la base de données
 * @param int $id
 * 
 * @return bool
 */
public function update(int $id): bool
    {
        $db = Database::dbConnect();
        $query = "UPDATE `answers` 
        SET `answer`=:answer,
            `choice`=:choice
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':answer', $this->answer, PDO::PARAM_STR);
        $sth->bindValue(':choice', $this->choice, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }
}