<?php
//include_once("pdo-debug.php");

define("TASK_POST", "post");
define("TASK_GET_ALL", "get");
define("TASK_GET_LAST_ID", "last");

define("ERR_NAME", "errname");
define("ERR_EMAIL", "erremail");
define("ERR_MESSAGE", "errmessage");
define("NO_ERR", "noerr");

define("MIN_NAME_LENGTH", 3);
define("MIN_MESSAGE_LENGTH", 2);

class tTask
{
  private $taskClass;

  public function __construct($taskClass)
  {
    $this->taskClass = $taskClass;
  }

  private function postMessage()
  {
    $mess = new tMessage(new DateTime(), $_POST["user"], $_POST["email"], $_POST["message"]);

    switch ($mess->testMessage()) {
      case ERR_NAME:
        echo ERR_NAME;
        return;
      case ERR_EMAIL:
        echo ERR_EMAIL;
        return;
      case ERR_MESSAGE:
        echo ERR_MESSAGE;
        return;
    }

    $db = new PDO('mysql:host=localhost;dbname=smtest;charset=UTF8;', 'root', '');

    $parameters = array(
      'p1' => $mess->time->format('Y-m-d H:i:s'),
      'p2' => $mess->user,
      'p3' => $mess->email,
      'p4' => $mess->message
    );

    $sql = "INSERT INTO `messages` (`time`, `user`, `email`, `message`) VALUES (:p1, :p2, :p3, :p4)";
    $sth = $db->prepare($sql);
    try {
      $sth->execute($parameters);
    } catch (PDOException $e) {
      echo 'Execute не удалось: ' . $e->getMessage();
    }
    if ($sth->rowCount() == 1) {
      echo 'SUCCESS';
    }
    $sth = null;
    $db = null;
  }

  private function getAllMessages()
  {
    $db = new PDO('mysql:host=localhost;dbname=smtest;charset=UTF8;', 'root', '');
    $sql = "SELECT * FROM `messages`";
    $sth = $db->query($sql);

    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;

    $sth = null;
    $db = null;
  }

  private function getLastId()
  {
    $db = new PDO('mysql:host=localhost;dbname=smtest;charset=UTF8;', 'root', '');
    $sql = "SELECT `idmessages` FROM `messages` ORDER BY `idmessages` DESC LIMIT 1";

    $sth = $db->query($sql);

    $results = $sth->fetch(PDO::FETCH_ASSOC);
    if ($sth->rowCount() == 1) {
      echo $results['idmessages'];
    }

    $sth = null;
    $db = null;
  }

  public function execute()
  {
    switch ($this->taskClass) {
      case TASK_POST:
        $this->postMessage();
        break;
      case TASK_GET_ALL:
        $this->getAllMessages();
        break;
      case TASK_GET_LAST_ID:
        $this->getLastId();
        break;
    }
  }
}

class tMessage
{
  public $time;
  public $user = '';
  public $email = '';
  public $message = '';

  public function __construct($time, $user, $email, $message)
  {
    $this->time = $time;
    $this->user =  htmlspecialchars($user);
    $this->email =  htmlspecialchars($email);
    $this->message =  htmlspecialchars($message);
  }

  public function testMessage()
  {
    if (strlen($this->user) < MIN_NAME_LENGTH) {
      return ERR_NAME;
    }
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    if (preg_match($pattern, $this->email) == false) {
      return ERR_EMAIL;
    }
    if (strlen($this->message) < MIN_MESSAGE_LENGTH) {
      return ERR_MESSAGE;
    }
    return NO_ERR;
  }
}

$task = new tTask($_POST["task"]);
$task->execute();
$task = null;

?>