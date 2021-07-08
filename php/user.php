<?php
$getin = "";

include "config.php";

if (isset($_POST['submit'])) {
    //print 'submit is set';

    // Holt die Inputs von der Form
    $nickname = htmlspecialchars($_POST['nickname']);
    $nickname = trim($_POST['nickname']);
    $password = htmlspecialchars($_POST['password']);
    $password = trim($_POST['password']);

    if (isset($_POST['nickname']) && strlen($_POST['nickname']) < 1) {
        $errorMessage['nickname'] = 'Bitte username angeben';
    }
    if (isset($_POST['password']) && strlen($_POST['password']) < 1) {
        $errorMessage['password'] = 'Bitte Passwort angeben';
    }


    if (strlen($_POST['nickname']) < 1 || (strlen($_POST['password']) < 1)){
        print 'errors';
    } else{
        print 'no errors';
        $usr = getUserByUser($nickname); //exist user?
        if ($usr == false){
            print 'usr wrong';
            $errorMessage['general'] = 'Etwas wurde falsch eingegeben';
        }else{
            print 'usr true';
            if ($_REQUEST['password'] == $usr['password']){
                print 'pw true';

                /* logg in*/
                $_SESSION['logged_in'] = 1;
                $name = $_POST['nickname'];
                /* location = eingeloggt CMS Seite einbinden */
                print "relocated"; 
                header('Location: welcome_cms.php');

            }else{
                print 'pw wrong';
                $errorMessage['general'] = 'Etwas wurde falsch eingegeben';
            }
        }
    }
} else{
    print 'god ned`!';
}

//Zuweisung Registrierung

if (isset($_POST['registrierung'])) {
    //print 'submit is set';

    // gets the inputs from the form
    $name = htmlspecialchars($_POST['name']);
    $name = trim($_POST['name']);
    $nickname = htmlspecialchars($_POST['nickname']);
    $nickname = trim($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $email = trim($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password = trim($_POST['password']);

    if (isset($_POST['name']) && strlen($_POST['name']) < 1) {
        $errorMessage['name'] = 'Bitte Name angeben';
    }
    if (isset($_POST['nickname']) && strlen($_POST['nickname']) < 1) {
        $errorMessage['nicknameR'] = 'Bitte Nickname angeben';
    }
    if (isset($_POST['email']) && strlen($_POST['email']) < 1) {
        $errorMessage['email'] = 'Bitte email angeben';
    }
    if (isset($_POST['password']) && strlen($_POST['password']) < 1) {
        $errorMessage['passwordR'] = 'Bitte Passwort angeben';
    }


    if (strlen($_POST['nickname']) < 1 || (strlen($_POST['password']) < 1 || (strlen($_POST['name']) < 1 || (strlen($_POST['email']) < 1)))) {
        print 'errors 123';
    } else{
        print 'no errors';
        $usr = getUserByUser($nickname); //exist user?
        if ($usr == false){
            print 'user not exist';
            createuser($name, $nickname, $password, $email);
            print "create user";
            $getin = "Herzlichen Glückwunsch! Sie können sich nun einloggen";
        }else{
            print 'user exist';
            $errorMessage['nicknameR'] = 'Nickname ist bereits vergeben';
        }
    }
} else{
    print 'god ned`!';
}

/* Datenbank Kommunikation */ 
/**
 * Überprüft die Daten mit der Datenbank
 */
function getUserByEmail($nickname)
{
    global $db_connection;
    try{
        $stmt = $db_connection->prepare("SELECT * FROM users WHERE nickname = ?");
        $stmt->bind_param('s', $_nickname);
        $_nickname = htmlspecialchars($nickname);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 0){
            return false; //found nothing
        }else{
            return $result->fetch_assoc();
        }
    }catch(Exception $exception){
        die('Problem with database');
        return false;
    }
}

// Registierung


function createuser($name, $nickname, $password, $email)
{
    global $db_connection;
        // Create
        try {
            $stmt = $db_connection->prepare("INSERT INTO users (`name`, nickname, email, `password`) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $name, $nickname, $email, $password);
            // $name = desinfect($name);
            // $nickname = desinfect($nickname);
            // $email = desinfect($email);
            // $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute();
            return $stmt->insert_id;
        } catch (Exception $e) {
            return false;
        }
}


function getUserByUser($username)
{ print 'getuser';
    global $db_connection;
    try{
        $stmt = $db_connection->prepare("SELECT * FROM users WHERE nickname = ?");
        $stmt->bind_param('s', $_username);
        $_username = htmlspecialchars($username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 0){
            return false; //found nothing
        }else{
            return $result->fetch_assoc();
        }
    }catch(Exception $exception){
        die('Problem in DB');
        return false;
    }
}


?>