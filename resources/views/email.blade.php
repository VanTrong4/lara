<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $mailData['name']?>　様<br><br>
    この度は弊社ホームページへのお問い合わせいただき<br>
    誠にありがとうございました。<br>
    フォームより以下の内容で送信いたしました。<br><br>
    送信内容確認後、改めて担当者よりご連絡いたしますので<br>
    今しばらくお待ちください。<br><br>
    ▼送信内容▼<br>
    ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>
    名前：<?php echo $mailData['name']?><br>
        フリガナ：<?php echo $mailData['Furigana']?><br>
        生年月日：<?php echo $mailData['year'].'/'.$mailData['month'].'/'.$mailData['day']?><br>
        性別：<?php echo $mailData['gender']?><br>
        メールアドレス：<?php echo $mailData['email']?><br>
        ご希望の連絡方法：<?php echo $mailData['preferContact']?><br>
        LINE：<?php echo $mailData['LINEID']?><br>
        郵便番号：<?php echo $mailData['postCodeBef'].'-'.$mailData['postCodeAfter']?><br>
        都道府県：<?php echo $mailData['district']?><br>
        市区町村：<?php echo $mailData['city']?><br>
        番地：<?php echo $mailData['address']?><br>
        マンション名・部屋番号：<?php echo $mailData['apartmentName']?><br>
        郵便番号：<?php echo $mailData['postCodeComBef'].'-'.$mailData['postCodeComAfter']?><br>
        都道府県：<?php echo $mailData['districtCom']?><br>
        市区町村：<?php echo $mailData['cityCom']?><br>
        番地：<?php echo $mailData['addressCom']?><br>
        マンション名・部屋番号：<?php echo $mailData['apartmentNameCom']?><br>
        電話番号：<?php echo $mailData['telephoneCom']?><br>
        銀行名：<?php echo $mailData['bankName']?><br>
        支店名：<?php echo $mailData['branchName']?><br>
        支店番号：<?php echo $mailData['teleBranch']?><br>
        口座の種類：<?php echo $mailData['typeAccount']?><br>
        口座番号：<?php echo $mailData['account']?><br>
        口座名義：<?php echo $mailData['accountName']?><br>
        必要書類の添付：<?php echo $mailData['avatarUser']?><br>
        ※表面: <?php echo $mailData['frontCardUser']?><br>
        ※裏面: <?php echo $mailData['afterCardUser']?><br>
    ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>
    ※本メールはサーバーからの自動返信メールとなっております。<br>
    本メールに返信いただいてもご連絡いたしかねますのでご了承ください。</p>
</body>
</html>