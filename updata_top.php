<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cooking Mam</title>
    <link rel="stylesheet" href="sheet/CookingMam.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>

<body>
    <!-- メインヘッダー -->
    <div class="header_page">
        <!-- サブヘッダー -->
        <div id="header">
            <div class="first_header">
                <!-- アイコン枠 -->
                <div class="img_frame">
                    <!-- トップアイコン -->
                    <img src="resipippi_use_icon.png" alt="cook" class="top_icon">
                </div>

                <!-- メニュー枠（インターフェース） -->
                <div class="menu_icon_frame">
                    <!-- 二つ分のメニュー枠 -->
                    <div class="frame_set">
                        <!-- 左側ユーザーメイン枠 -->
                        <div class="left_button">
                            <!-- 左のユーザーサブ枠 -->
                            <div class="left_icon_set">
                                <!-- ユーザーアイコン -->
                                <i class="fas fa-user fa-3x"></i>
                            </div>
                        </div>
                        <!-- 右側レシピメイン枠 -->
                        <div class="right_button">
                            <!-- 右側レシピサブ枠 -->
                            <div class="rigtht_icon_set">
                                <!-- フォルダーアイコン -->
                                <i class="fas fa-folder fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub_header">
            <!-- 入力フォームのまとまり -->
            <form action="https://www.merukari.com" class="header_from">
                <!-- 入力フォーム -->
                <input type="text" id="inp" placeholder="食材・料理">
                <!-- 検索ボタン_虫眼鏡アイコン -->
                <button type="submit" id="subbtn"><i class="fas fa-search"></i> </button>
            </form>
        </div>
    </div>
    <div class="center">
        <img src="chenge_resipi.png" alt="サンプル画像" class="sub_top" />
    </div>
    <div id="target"></div>
    <a href="#" class="cp_btn" id="bt">スタート</a> -----------------------------------------------------------------------------------]
    <!-- ---------------------------------------------------------------------------------- -->
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
<!-- -------------------------------------------------------------------------------------------------- -->

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            //-------------------------------------------------------------
            $(function() {
                // ボタンを押したら通信する関数を起動
                $("#cp_btn").click(function() {

                    $.ajax({
                        type: "POST",
                        url: "sample.php",
                        data: {
                            "sample": 2
                        },
                        // 通信に成功したとき新たな関数を起動しここにHTMLに表示するコードを書く
                        success: getRecipeData
                    });
                });
            });

            function getRecipeData(result){
                result = debugJsonData;
                            // const $container = $('.container');
                            // $container.find('.title').text()
                            // $container.find('.title-label').append()
                            $("div").append(`<h2>${result.recipeName}</h2>`);
                            // 新しめ IE11で動かない
                            for(image of result.images){
                                $("div").append(`<img src="${image}">`);
                            }
                            // 昔ながら
                            $("div").append(`<ol id="tejyun"></ol>`);
                            result.recipeStep.forEach(step =>{
                                $("#tejyun").append(`<li>${step}</li>`);
                            });
            
                            // PHPが返すデータ {
                        // var debugJsonData = {
                        //     recipeName: "カレー",
                        //     recipeStep:[
                        //             "切る",
                        //             "焼く",
                        //             "煮込む"
                        //                     ],
                        //     images:[
                        //             "sample.jpg"
                        //                         ]
                        //             };
                        //     }

        </script>
</body>

</html>