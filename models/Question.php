<?php
require_once(__DIR__ . '/Connect.php');

class Question
{
    private int $id;
    private string $question;
    private int $points;
    private string $created_at;
    private int $id_quiz;
    private string $correct;

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
     * @return int
     */
    public function getCorrect(): int
    {
        return $this->correct;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setCorrect($value): void
    {
        $this->correct = $value;
    }
    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setQuestion($value): void
    {
        $this->question = $value;
    }

    /**
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setPoints($value): void
    {
        $this->points = $value;
    }

    /**
     * @return string
     */
    public function getCreated_at(): string
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
     * @return int
     */
    public function getId_quiz(): int
    {
        return $this->id_quiz;
    }
    /**
     * @param mixed $value
     * 
     * @return void
     */
    public function setId_quiz($value): void
    {
        $this->id_quiz = $value;
    }

    /**
     * Méthode permettant de récupérer une question ou la liste des questions
     * @param int $id
     * 
     * @return 
     */
    public static function get(int $id = NULL)
    {
        $db = Database::dbConnect();
        $query = 'SELECT `questions`.`id` ,`questions`.`question`, `questions`.`correct`, `questions`.`points`, `quiz`.`name`, `questions`.`id_quiz`
                FROM `questions`
                LEFT JOIN `quiz`
                ON `questions`.`id_quiz` = `quiz`.`id`' .
            (($id) ? 'WHERE `questions`.`id` = :id' : '');
        $sth = $db->prepare($query);
        (($id) ? $sth->bindValue(':id', $id, PDO::PARAM_INT) : '');
        $sth->execute();
        $result = ($id) ? $sth->fetch() : $sth->fetchAll();

        return $result;
    }
    public static function getBySearch(string $search, int $limit, int $offset)
    {
        $db = Database::dbConnect();
        $query = 'SELECT `questions`.`id` ,`questions`.`question`, `questions`.`correct`, `questions`.`points`, `quiz`.`name`, `questions`.`id_quiz`
                FROM `questions`
                JOIN `quiz`
                ON `questions`.`id_quiz` = `quiz`.`id`
                WHERE `questions`.`question` LIKE :search 
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
     * Méthode permettant de récupérer les question d'un quiz en fonction de l'id
     * @param int $id
     * 
     * @return [type]
     */
    public static function getQuestionById(int $id = NULL)
    {
        $db = Database::dbConnect();
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
     * Méthode permettant de récupérer toutes les questions
     * @return array
     */
    public static function getAll(): array
    {
        $query =
            'SELECT * FROM `questions`;';
        $db = Database::dbConnect();
        $sth = $db->query($query);
        $users = $sth->fetchAll();

        return $users;
    }


    /**
     * 
     * @return [type]
     */
    public function add()
    {
        $db = Database::dbConnect();
        $query = 'INSERT INTO `questions` (`question`,`correct`, `points`,`id_quiz`) VALUES (:question,:correct, :points, :id_quiz);';
        $sth = $db->prepare($query);
        $sth->bindValue(':question', $this->question, PDO::PARAM_STR);
        $sth->bindValue(':points', $this->points, PDO::PARAM_INT);
        $sth->bindValue(':correct', $this->correct, PDO::PARAM_STR);
        $sth->bindValue(':id_quiz', $this->id_quiz, PDO::PARAM_INT);
        

        $result = $sth->execute();;

        return $result;
    }

    public static function getAllQuestions(int $id, int $admin = NULL)
    {
        if ($admin != null) {
            $query =
                'SELECT `id`, `question`, `points`, `id_quiz` 
                FROM `questions` 
                WHERE `id_quiz` = :id_quiz ;';
        } else {
            $query =
                'SELECT `id`, `question`, `points`, `id_quiz` , `correct`
                FROM `questions` 
                WHERE `id_quiz` = :id_quiz ;';
        }
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id_quiz', $id, PDO::PARAM_INT);
        $sth->execute();
        $questions = $sth->fetchAll();

        return $questions;
    }

    public static function  verifyCorrectAnswer(int $id)
    {
        $db = Database::dbConnect();
        $query =
            'SELECT `correct`, `points`
            FROM `questions`
            WHERE `id` = :id ;';
            $sth = $db->prepare($query);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $questions = $sth->fetch();
            
            return $questions;
    }
    public function update(int $id): bool
    {
        $db = Database::dbConnect();
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

    /**
     * @param int $id
     * 
     * @return array
     */
    public static function delete(int $id): array
    {
        $query =
            'DELETE FROM `questions` WHERE  `id` = :id ;';
        $db = Database::dbConnect();
        $sth = $db->prepare($query);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $users = $sth->fetchAll();

        return $users;
    }
}
