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

  private function getAllMessages() {
    $db = new PDO('mysql:host=localhost;dbname=smtest;charset=UTF8;', 'root', '');
    $sql = "SELECT * FROM `messages`";
    $sth = $db->query($sql);

    $results = $sth->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;

    $sth = null;
    $db = null;
  }

  private function getLastId() {
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

  public function testMessage() {
//    global $MIN_NAME_LENGTH;
    
    if (strlen($this->user) < MIN_NAME_LENGTH) {
      return ERR_NAME;
    }
    
    return NO_ERR;


  }

  public function mePrint()
  {
    echo '<pre>mePrint()::';
    echo $this->time->format('Y-m-d H:i:s');
    echo '<br>';
    echo $this->user;
    echo '<br>';
    echo $this->email;
    echo '<br>';
    echo $this->message;
    echo '<br>';
    echo "</pre>";
  }
}


$task = new tTask($_POST["task"]);
$task->execute();
$task = null;




/*
date_default_timezone_set('Europe/Moscow');
//time_zone="Europe/Moscow";
/*
$task = $_POST["task"];

echo "<pre>POST:<br>";
print_r($_POST);
echo "</pre>";

if ($task === TASK_POST) {
  echo "task === TASK_POST<br>";
}


$mess = new tMessage(new DateTime(), $_POST["user"], $_POST["email"], $_POST["message"]);
$mess->mePrint();

try {
  $db = new PDO('mysql:host=localhost;dbname=smtest', 'root', '');
} catch (PDOException $e) {
  echo 'Подключение не удалось: ' . $e->getMessage();
}

$parameters = array(
  'p1' => $mess->time->format('Y-m-d H:i:s'),
  'p2' => $mess->user,
  'p3' => $mess->email,
  'p4' => $mess->message
);

try {
  $stmt = $db->prepare("INSERT INTO `messages`(`time`, `user`, `email`, `message`) VALUES (:p1, :p2, :p3, :p4)");
} catch (PDOException $e) {
  echo 'Prepare не удалось: ' . $e->getMessage();
}

$stmt->bindValue(':p1', $mess->time->format('Y-m-d H:i:s'), PDO::PARAM_STR);
$stmt->bindValue(':p2', $mess->user, PDO::PARAM_STR);
$stmt->bindValue(':p3', $mess->email, PDO::PARAM_STR);
$stmt->bindValue(':p4', $mess->message, PDO::PARAM_STR);

try {
  $stmt->execute();
} catch (PDOException $e) {
  echo 'Execute не удалось: ' . $e->getMessage();
}

echo "\nPDO::errorCode(): ", $db->errorCode();
echo "\nPDO::rowcount(): ", $stmt->rowCount();


if (!$stmt) {
  echo "\nPDO::errorInfo():\n";
  print_r($db->errorInfo());
}


//$stmt->execute([$mess->time->format('Y-m-d H:i:s'), $mess->user, $mess->email, $mess->message]);

// $stmt = $db->query("SELECT * FROM messages");
$category = $stmt->fetch(PDO::FETCH_LAZY);
echo '<pre>!!!!!!!';
print_r($category);


$sql = "INSERT INTO `messages` (`time`, `user`, `email`, `message`) VALUES (:p1, :p2, :p3, :p4)";
echo PdoDebugger::show($sql, $parameters);



$sql = "INSERT INTO messages (time, user, email, message) VALUES (:p1, :p2, :p3, :p4)";

$stmt = $db->prepare("INSERT INTO log (logcol, logcol1, logcol2, logcol3) VALUES (:p1, :p2, :p3, :p4)");
$name = 'Новая категория';
$query = "INSERT INTO `log` (`logcol`) VALUES (:name)";
$params = [
    ':name' => $name
];
$stmt = $db->prepare($query);
$stmt->execute($params);
*/
/*
echo '<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
</head>
<body>
' ;

foreach ($_POST as $s) {
  echo ($s);
  '<br>';
}
try {
  $db = new PDO('mysql:host=localhost;dbname=smtest', 'root', '');
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage();
  die();
}

$stmt = $db->query("SELECT * FROM messages");
while ($row = $stmt->fetch())
{
  echo '<pre>';
  print_r($row);
}

echo '
</body>
</html>

';
*/
