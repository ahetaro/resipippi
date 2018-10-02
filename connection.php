<?php
    // DBからdataを持ってくる、配列で保存
    $data = array();
    
    // $pageに$_POST['page']に格納
    $page = $_POST['page'];

    // DBからもってくるdetaの種類？
    $mysqli = new mysqli('Host or IP','my,_db', 'username', 'password',);
    
    if($mysqli->connect_error){
        echo $mysqli->connect_error;
        exit();
    }else{
        $mysqli->set_charaset("utf8");
    }
    // ここで選択、このuser_idは例え。

    // count文でレシピの件数を取得
    $sql= "SELECT count(*) FROM rand_recipe";    

    // count文の結果を使ってrandom

    // random値を使ってselect文を作成
    $sql = "SELECT user_id,name FROM user_table";
    if($result=$mysql->query($sql)){
        // 連想配列を取得,assocがなにかは知らん
        while($row=result->fetch_assoc(){

            echo $row["user_id"].$row["name"]."<br>";
            // JSに返すためのものをdata[]に格納
            $data[]=$row;
        }

            // 結果セットを閉じる
        $result->close();
    }

    $data = [
        $recipeName => "カレー",
        $recipeStep => [
            "",
            "",
            ""
        ],
        $images => [
            ""
        ];

    // ここで$dataに格納したものを返す
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data)
    ?>