<?php 

class Answer {
    private int $id;
    private string $answer;
    private int $valid; 
    private string $created_at;
    private int $id_question;

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
 * @return int
 */
public function getValid():int{
    return $this->valid;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setValid($value):void{
    $this->valid = $value;
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
 * @param int $id
 * 
 * @return array
 */
public static function get(int $id = NULL):array|bool
{
    $db = dbConnect();
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
 * @return array
 */
public static function getAll(): array
{
    $query =
        'SELECT * FROM `answers` ;';
    $db = dbConnect();
    $sth = $db->query($query);
    $users = $sth->fetchAll();

    return $users;
}

/**
 * @return bool
 */
public function add(): bool
{
    $db = dbConnect();
    $query = 'INSERT INTO `answers` (`answer`, `valid`,`id_question`) VALUES (:answer, :valid, :id_question);';
    $sth = $db->prepare($query);
    $sth->bindValue(':answer', $this->answer, PDO::PARAM_STR);
    $sth->bindValue(':valid', $this->valid, PDO::PARAM_INT);
    $sth->bindValue(':id_question', $this->id_question, PDO::PARAM_INT);

    return $sth->execute();
}

public static function getAllAnswersQuiz (int $id)
{
    $query =
        'SELECT `id`, `question`, `points`, `id_quiz` 
        FROM `questions` 
        WHERE `id_quiz` = :id_quiz ;';
    $db = dbConnect();
    $sth = $db->prepare($query);
    $sth->bindValue(':id_quiz', $id, PDO::PARAM_INT);
    $sth->execute();
    $questions = $sth->fetchAll();

    return $questions;
}
}