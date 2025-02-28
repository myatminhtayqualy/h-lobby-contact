【株式会社ハウジングロビー】へお問い合わせいただきありがとうございます。

<?php
function sanitizeAndEchoUser($inputText)
{
    $sanitizedText = strip_tags($inputText);
    $decodedText = html_entity_decode($sanitizedText);
    echo $decodedText;
}
?>

<?php echo sanitizeAndEchoUser($input['family_name']['value']); ?> <?php echo sanitizeAndEchoUser($input['name']['value']); ?>様

この度は「株式会社ハウジングロビー」コーポレートサイトより、お問い合わせいただきありがとうございます。
以下の内容でお問い合わせを受け付けました。
数日以内に担当者よりご連絡差し上げますのでお待ち下さいませ。

-------------------------------------------------

お問い合わせ種別：<?php echo sanitizeAndEchoUser($input['choice']['value']); ?><?php echo "\n"; ?>
お名前（漢字）：<?php echo sanitizeAndEchoUser($input['family_name']['value']); ?> <?php echo sanitizeAndEchoUser($input['name']['value']); ?><?php echo "\n"; ?>
お名前（フリガナ）：<?php echo sanitizeAndEchoUser($input['katakana_01']['value']); ?> <?php echo sanitizeAndEchoUser($input['katakana_02']['value']); ?><?php echo "\n"; ?>
<?php if($input['lastname_01']['value'] !== "" || $input['lastname_02']['value'] !== "" || $input['klastname_01']['value'] !== "" || $input['klastname_02']['value'] !== "") {?>
賃貸人名（漢字）：<?php echo sanitizeAndEchoUser($input['lastname_01']['value']); ?> <?php echo sanitizeAndEchoUser($input['lastname_02']['value']); ?><?php echo "\n"; ?>
賃貸人名（フリガナ）：<?php echo sanitizeAndEchoUser($input['klastname_01']['value']); ?> <?php echo sanitizeAndEchoUser($input['klastname_02']['value']); ?><?php echo "\n"; ?>
<?php } ?>
メールアドレス：<?php echo sanitizeAndEchoUser($input['mail']['value']); ?><?php echo "\n"; ?>
メールアドレス（確認用）：<?php echo sanitizeAndEchoUser($input['confirm_mail']['value']); ?><?php echo "\n"; ?>
<?php if($input['address_01']['value'] !== "1" && $input['address_02']['value'] !== "2" && $input['address_03']['value'] !== "価値"){?>
ご住所：<?php echo sanitizeAndEchoUser($input['address_01']['value']); ?> - <?php echo sanitizeAndEchoUser($input['address_02']['value']); ?><?php echo sanitizeAndEchoUser($input['address_03']['value']); ?><?php echo "\n"; ?>
<?php } ?>
電話番号：<?php echo sanitizeAndEchoUser($input['tel_01']['value']); ?> - <?php echo sanitizeAndEchoUser($input['tel_02']['value']); ?> - <?php echo sanitizeAndEchoUser($input['tel_03']['value']); ?><?php echo "\n"; ?>
<?php if($input['resident']['value'] !== ""){?>
ご依頼内容：<?php echo sanitizeAndEchoUser($input['resident']['value']); ?><?php echo "\n"; ?>
<?php } ?>
<?php if($input['owner']['value'] !== ""){?>
ご要望ご相談内容：<?php echo sanitizeAndEchoUser($input['owner']['value']); ?><?php echo "\n"; ?>
<?php } ?>
<?php if($input['search']['value'] !== ""){ ?>
ご要望ご相談内容：<?php echo sanitizeAndEchoUser($input['search']['value']); ?><?php echo "\n"; ?>
<?php } ?>
お問い合わせ内容：<?php echo sanitizeAndEchoUser($input['content_inquiry']['value']); ?>

-------------------------------------------------