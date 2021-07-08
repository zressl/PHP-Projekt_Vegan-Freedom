<?php
$info = "";

if(isset($_POST['submit_data'])){
    include ('config.php');

    $title = $_POST['Article_title'];
    $content = $_POST['Article_content'];

    if(!empty($title) && !empty($content)){
        $createNewItem = newItem($title, $content);

        if($createNewItem == false){
            //echo "Daten konnten nicht gesendet werden";
            $info = "daten konnten nicht gesendet werden!";
        }else{
            //echo "Beitrag wurde erfolgreich erstellt";
                $info = "beitrag wurde erfolgreich erstellt!";
        }
        //Felder ohne Inhalt
    }else{
        //print ('Felder sind nicht vollständig ausgefüllt');
        $info = "Felder sind nicht vollständing ausgefüllt!";
    }

}else{
    echo ('doesnt work');
}

function newItem($title, $content){
    global $db_connection;
    try{
        $stmt = $db_connection->prepare("INSERT INTO blog_beitraege (Article_title, Article_content) VALUES (?,?)");
        $stmt->bind_param("ss", $title, $content);
        $stmt->execute();
        echo "sql";
        return $stmt->insert_id;
    }catch(Exception $e){
        echo "flase";
        return false;
    }
}

?>