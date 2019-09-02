<?php 
// Super global変数
// ー　PHPがもともと用意している変数
// var_dump($_POST);



// このページが表示された時の、送信方法(GET or POST)の確認
// GET送信の場合は、入力画面に遷移する。

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // このページを表示する際の送信がゲットの場合、index.htmlに遷移する
    header('Location: index.html');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>


    <?php


//  funtion.phpを読み込んで、定義した関数を使えるようにする
require_once('functions.php');




    // 送信されてきた値の取得
    // エスケープ処理をして。
    // XSS（クロスサイトスクリプティング）の対策をする。

    // エスケープ処理：htmlspecialchars
    // htmlspecialchars(対象の文字 , オプション , 文字コード)
    
    $username = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8' );
    
    // 関数を使えば上記のようにhtmlspecialcharsを書かずに、function.jp からの関数を読み込めば下記のように短く済む
    $email = h( $_POST['email'] );
    $content = h( $_POST['content']);
    ?>

    <!-- 名前 -->

    <?php
        if($username ==""){
            $usernameresult = 'ユーザー名が入力されてません';
        }else {
            $usernameresult = $username;
        }

    ?>
    <p>名前：<?php echo $usernameresult; ?></p>

    <!-- アドレス -->

    <?php
        if($email ==""){
            $emailresult = 'メールアドレスが入力されてません';
        }else {
            $emailresult = $email;
        }

    ?>

    <p>メールアドレス：<?php echo $emailresult; ?></p>


        <!-- 入力内容 -->
    <?php
        if($content ==""){
            $contentresult = 'お問い合わせ内容が入力されてません';
        }else {
            $contentresult = $content;
        }

    ?>

    <p>入力内容：<?php echo $contentresult;  ?></p>
  


    <form action="thanks.php" method = "POST">

        <input type="hidden" name= "name" value= "<?php echo $username ?>">
        <input type="hidden" name= "email" value= "<?php echo $email ?>">
        <input type="hidden" name= "content" value= "<?php echo $content ?>">



        <button type= "button" onclick ="history.back();" >戻る</button>
        <input type="submit" value ="OK">

    </form>


</body>
</html>