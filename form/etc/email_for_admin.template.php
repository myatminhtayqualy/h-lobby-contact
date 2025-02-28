【株式会社ハウジングロビー】コーポレートサイトにお問い合わせがありました。
<?php
function sanitizeAndEchoAdmin($inputText)
{
    $sanitizedText = strip_tags($inputText);
    $decodedText = html_entity_decode($sanitizedText);
    echo $decodedText;
}
?>
「株式会社ハウジングロビー」コーポレートサイトにお問い合わせがありました。
内容を確認し、ご連絡をお願いいたします。

-------------------------------------------------

お問い合わせ種別：<?php echo sanitizeAndEchoAdmin($input['choice']['value']); ?><?php echo "\n"; ?>
お名前（漢字）：<?php echo sanitizeAndEchoAdmin($input['family_name']['value']); ?> <?php echo sanitizeAndEchoAdmin($input['name']['value']); ?><?php echo "\n"; ?>
お名前（フリガナ）：<?php echo sanitizeAndEchoAdmin($input['katakana_01']['value']); ?> <?php echo sanitizeAndEchoAdmin($input['katakana_02']['value']); ?><?php echo "\n"; ?>
<?php if ($input['lastname_01']['value'] !== "" || $input['lastname_02']['value'] !== "" || $input['klastname_01']['value'] !== "" || $input['klastname_02']['value'] !== "") { ?>
賃貸人名（漢字）：<?php echo sanitizeAndEchoAdmin($input['lastname_01']['value']); ?> <?php echo sanitizeAndEchoAdmin($input['lastname_02']['value']); ?><?php echo "\n"; ?>
賃貸人名（フリガナ）：<?php echo sanitizeAndEchoAdmin($input['klastname_01']['value']); ?> <?php echo sanitizeAndEchoAdmin($input['klastname_02']['value']); ?><?php echo "\n"; ?>
<?php } ?>
メールアドレス：<?php echo sanitizeAndEchoAdmin($input['mail']['value']); ?><?php echo "\n"; ?>
メールアドレス（確認用）：<?php echo sanitizeAndEchoAdmin($input['confirm_mail']['value']); ?><?php echo "\n"; ?>
<?php if ($input['address_01']['value'] !== "1" && $input['address_02']['value'] !== "2" && $input['address_03']['value'] !== "価値") { ?>
ご住所：<?php echo sanitizeAndEchoAdmin($input['address_01']['value']); ?> - <?php echo sanitizeAndEchoAdmin($input['address_02']['value']); ?><?php echo sanitizeAndEchoAdmin($input['address_03']['value']); ?><?php echo "\n"; ?>
<?php } ?>
電話番号：<?php echo sanitizeAndEchoAdmin($input['tel_01']['value']); ?> - <?php echo sanitizeAndEchoAdmin($input['tel_02']['value']); ?> - <?php echo sanitizeAndEchoAdmin($input['tel_03']['value']); ?><?php echo "\n"; ?>
<?php if ($input['resident']['value'] !== "") { ?>
ご依頼内容：<?php echo sanitizeAndEchoAdmin($input['resident']['value']); ?><?php echo "\n"; ?>
<?php } ?>
<?php if ($input['owner']['value'] !== "") { ?>
ご要望ご相談内容：<?php echo sanitizeAndEchoAdmin($input['owner']['value']); ?><?php echo "\n"; ?>
<?php } ?>
<?php if ($input['search']['value'] !== "") { ?>
ご要望ご相談内容：<?php echo sanitizeAndEchoAdmin($input['search']['value']); ?><?php echo "\n"; ?>
<?php } ?>
お問い合わせ内容：<?php echo sanitizeAndEchoAdmin($input['content_inquiry']['value']); ?>

-------------------------------------------------