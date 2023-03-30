<?php 

class Question {
    private int $id;
    private string $question;
    private int $points; 
    private string $created_at;
    private int $id_quiz;
    private string $correct;

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
public function getCorrect():int{
    return $this->correct;
}
/**
 * @param mixed $value
 * 
 * @return void
 */
public function setCorrect($value):void{
    $this->correct = $value;
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
 * @return 
 */
public static function get(int $id = NULL)
{
    $db = dbConnect();
    $query = 'SELECT `questions`.`id` ,`questions`.`question`, `questions`.`correct`, `questions`.`points`, `quiz`.`name`, `questions`.`id_quiz`
                FROM `questions`
                LEFT JOIN `quiz`
                ON `questions`.`id_quiz` = `quiz`.`id`'.
            (($id) ? 'WHERE `questions`.`id` = :id' : '');
    $sth = $db->prepare($query);
    (($id) ? $sth->bindValue(':id', $id, PDO::PARAM_INT) : '');
    $sth->execute();
    $result = ($id) ? $sth->fetch() : $sth->fetchAll();

    return $result;
}

public static function getQuestionById(int $id = NULL)
{
    $db = dbConnect();
    $query = 'SELECT `questions`.`id` ,`questions`.`question`, `questions`.`correct`, `questions`.`points`, `quiz`.`name`, `questions`.`id_quiz`
                FROM `questions` 
                LEFT JOIN `quiz`
                ON `questions`.`id_quiz` = `quiz`.`id`
                WHERE `questions`.`id` = :id ;';
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
        'SELECT * FROM `questions`;';
    $db = dbConnect();
    $sth = $db->query($query);
    $users = $sth->fetchAll();

    return $users;
}


public function add()
{
    $db = dbConnect();
    $query = 'INSERT INTO `questions` (`question`,`correct`, `points`,`id_quiz`) VALUES (:question,:correct, :points, :id_quiz);';
    $sth = $db->prepare($query);
    $sth->bindValue(':question', $this->question, PDO::PARAM_STR);
    $sth->bindValue(':points', $this->points, PDO::PARAM_INT);
    $sth->bindValue(':correct', $this->correct, PDO::PARAM_STR);
    $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);
    $sth->execute();

    $lastId = $db->lastInsertId();

    return $lastId;
}

public static function getAllQuestions (int $id)
{
    $query =
        'SELECT `id`, `question`, `points`, `id_quiz`, `correct`
        FROM `questions` 
        WHERE `id_quiz` = :id_quiz ;';
    $db = dbConnect();
    $sth = $db->prepare($query);
    $sth->bindValue(':id_quiz', $id, PDO::PARAM_INT);
    $sth->execute();
    $questions = $sth->fetchAll();

    return $questions;
}

public function update(int $id): bool
    {
        $db = dbConnect();
        $query = "UPDATE `questions` 
        SET `question`=:question,
            `correct`=:correct,
            `points` = :points,
            `id_quiz` = :id_quiz
        WHERE `id` = :id";
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->bindValue(':question', $this->question, PDO::PARAM_STR);
        $sth->bindValue(':correct', $this->correct, PDO::PARAM_STR);
        $sth->bindValue(':points', $this->points, PDO::PARAM_STR);
        $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->rowCount();

        return $result > 0 ? true : false;
    }
}
