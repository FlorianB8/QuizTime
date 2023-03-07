<?php 

class Question {
    private int $id;
    private string $question;
    private int $points; 
    private DateTime $created_at;
    private int $id_quiz;

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
public function getQuestion():string{
    return $this->question;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setQuestion($value):void{
    $this->question = $value;
}

/**
 * @return int
 */
public function getPoints():int{
    return $this->points;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setPoints($value):void{
    $this->points = $value;
}

/**
 * @return DateTime
 */
public function getCreated_at():DateTime{
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
public function getId_quiz():int{
    return $this->id_quiz;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setId_quiz($value):void{
    $this->id_quiz = $value;
}

/**
 * @param int $id
 * 
 * @return object
 */
public static function get(int $id):object|bool
{
    $db = dbConnect();
    $query = "SELECT * FROM `questions` WHERE `id` = :id ;";
    $sth = $db->prepare($query);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch();

    return $result;
}
/**
 * @return array
 */
public static function getAll(): array
{
    $query =
        'SELECT * FROM `questions;`';
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
    $query = 'INSERT INTO `users` (`question`, `points`,`id_quiz`) VALUES (:question, :points, :id_quiz);';
    $sth = $db->prepare($query);
    $sth->bindValue(':question', $this->question, PDO::PARAM_STR);
    $sth->bindValue(':points', $this->points, PDO::PARAM_INT);
    $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);

    return $sth->execute();
}


}