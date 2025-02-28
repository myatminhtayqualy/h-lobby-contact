<?php
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
  require_once(dirname(__FILE__) . '/form/lib/functions.php');
  http_status(404);
}
?>
<!doctype html>
<html lang="ja">

<head>
  <!-- Google Tag Manager HEAD-->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NM89TGHL');
  </script>
  <!-- End Google Tag Manager HEAD-->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="Description" content="">
  <meta name="Keywords" content="">
  <meta name="format-detection" content="telephone=no">
  <link rel="icon" href="../favicon.ico">
  <link rel="shortcut icon" href="../favicon.ico">
  <!-- Google Material icon fonts -->
  <link rel="stylesheet" href="css/destyle.css">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- CSS custom -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/contact.css">

  <title>お問い合わせ| 株式会社ハウジングロビー</title>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/validate.js"></script>
</head>

<body>
  <!-- Google Tag Manager BODY-->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NM89TGHL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager BODY-->

  <div class="wrap">
    <!-- ヘッダ背景イメージ -->
    <div class="header-img">
      <img src="img/img-header-general.jpg" alt="">
    </div><!-- /.heading-img -->
    <!-- ロゴ、ユーティリティヘッダ -->
    <div class="heading-wrap">
      <div class="heading">
        <a href="index.html"><svg class="lower-header-logo-xs" viewBox="0 0 283.8 94.6">
            <use href="img/logo.svg#logo" style="fill:#2B2610;" />
          </svg>
          <svg class="lower-header-logo-long" viewBox="0 0 246 31">
            <use href="img/logo_long.svg#logolong" />
          </svg></a>

        <ul class="nav-util lower-util" id="NAVUTIL">
        </ul>
      </div>
    </div><!-- /.heading-wrap -->
    <!-- メインメニュー -->
    <div class="lower-megamenu-wrap" id="MEGA">
      <div class="header" id="MEGAMENU">
      </div><!--/.header-->
    </div><!-- /.megamenu-wrap-->
    <!-- スペーサー -->
    <div class="spacer"></div>
    <!-- カテゴリーメニュー -->
    <div class="container cat-menu-wrap">
      <div class="cat-menu">
        <div class="cat-menu-tit">
          <p>お問い合わせ<br class="br-xs-none"><span class="en">Contact</span></p>
        </div>
        <div class="cat-menu-list-wrap">
          <ul class="cat-menu-list">
            <li><a class="sublink disable" href="">お問い合わせ</a></li>
          </ul>
        </div>
      </div>
    </div><!-- /.cat-menu-wrap -->
    <!-- パンくずリスト -->
    <div class="inner-controll">
      <div class="container container-index">
        <ul class="breadcrumbs">
          <li><a href="index.html">HOME</a></li>
          <li>お問い合わせ</li>
        </ul>
      </div>
    </div><!-- /.inner-controll -->

    <div class="main-wrap w100 white pt50 pb150">
      <div class="container container-lower">

        <div class="index-tit-wrap">
          <div class="index-tit-cat">
            <p class="en">Contact</p>
            <h1 class="ja">お問い合わせ</h1>
          </div>
        </div><!-- /.tit-wrap -->


        <div class="contact-wrap">
          <div class="process">
            <div class="step active">
              <p class="step-num">STEP 1</p>
              <p class="step-desc">内容入力</p>
            </div>
            <i class="fa fa-arrow-right"></i>
            <div class="step">
              <p class="step-num">STEP 2</p>
              <p class="step-desc">内容確認</p>
            </div>
            <i class="fa fa-arrow-right"></i>
            <div class="step">
              <p class="step-num">STEP 3</p>
              <p class="step-desc">送信完了</p>
            </div>
          </div><!-- /.process -->

          <p class="text-sm-center mb15 font16">お問い合わせ種別を選択し、各項目のご記入をお願いいたします。</p>
          <ul class="contact-note mb30">
            <li class="text-sm-center">お問い合わせ後、各担当者からご連絡させていただきます。</li>
            <li class="text-sm-center">お問い合わせ内容により、ご連絡まで数日いただく場合がございます。</li>
          </ul>

          <!-- FORM -->
          <form method="post" action="" name="inquiry_form">
            <!-- 問合せ種別 -->
            <fieldset id="fieldset-top">
              <div>
                <h2 class="font-notosans700 font20 text-center">お問い合わせ種別</h2>
                <p class="required mb15 choice-inst">お問合せ内容の種別をお選びください。</p>
              </div>
              <div class="choice_wrap">
                <?php
                $name = 'choice';
                $count = 1;
                $values = array(
                  '入居者様からのお問い合わせ（あなたが入居中の場合）',
                  '物件オーナー様・賃貸経営に関するお問い合わせ',
                  '賃貸のお部屋探しの方',
                  '弊社への各種お問い合わせ及び、ご相談',
                  '一般の方'
                ); ?>
                <input type="hidden" id="input-<?php echo h($name); ?>" value="">
                <?php foreach ($values as $value) : ?>
                  <label for="choice01-<?php echo $count; ?>">
                    <input type="radio" id="choice01-<?php echo $count; ?>" class="rbtn" name="<?php echo h($name); ?>" value="<?php echo h($value); ?>" <?php echo $value === $input[$name]['value'] ? 'checked' : '' ?> />
                    <!-- <input type="radio" id="choice01-1" name="choice01" value="choice01-1" /> -->
                    <span><?php echo h($value); ?></span>
                  </label>
                  <?php $count++; ?>
                <?php endforeach; ?>
              </div>
              <p class="error" id="err-msg-input-choice"><?php if (!empty($err_msg['<?php echo h($choice); ?>'])) echo $err_msg['<?php echo h($choice); ?>']; ?></p>
            </fieldset>

            <!-- お名前 -->
            <fieldset id="name">
              <!-- お名前（漢字） -->
              <div class="input-text-wrap mb10">
                <label class="label-input-text required" for="name01">お名前（漢字）</label>
                <div class="inputs" id="kanji-name">
                  <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
                    <?php $fname = 'family_name'; ?>
                    <input type="text" class="w100" placeholder="姓" name="<?php echo h($fname); ?>" value="<?php echo h($input[$fname]['value']); ?>" id="name01-1">
                    <?php $name = 'name'; ?>
                    <input type="text" class="w100" placeholder="名" name="<?php echo h($name); ?>" value="<?php echo h($input[$name]['value']); ?>" id="name01-2">
                  </div>
                  <p class="error" id="err-msg-input-name"><?php if (!empty($err_msg['<?php echo h($fname); ?>'])) echo $err_msg['<?php echo h($fname); ?>']; ?></p>
                </div>
              </div>
              <!-- お名前（フリガナ） -->
              <div class="input-text-wrap">
                <label class="label-input-text required" for="name02">お名前（フリガナ）</label>
                <div class="inputs" id="katakana-name">
                  <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
                    <?php $kname01 = 'katakana_01'; ?>
                    <input type="text" class="w100" placeholder="セイ" name="<?php echo h($kname01); ?>" value="<?php echo h($input[$kname01]['value']); ?>" id="name02-1">
                    <?php $kname02 = 'katakana_02'; ?>
                    <input type="text" class="w100" placeholder="メイ" name="<?php echo h($kname02); ?>" value="<?php echo h($input[$kname02]['value']); ?>" id="name02-2">
                  </div>
                  <p class="error" id="err-msg-input-kname"><?php if (!empty($err_msg['<?php echo h($kname01); ?>'])) echo $err_msg['<?php echo h($kname01); ?>']; ?></p>
                </div>
              </div>
            </fieldset>

            <p class="font14 text-sm-center mb5" id="lessor-text">※お問い合わせの方とご契約者名が異なる場合は、賃貸人名義もご記入ください。</p>

            <fieldset id="lessor-name">
              <!-- <legend>賃貸人名</legend>-->
              <!-- お名前（漢字） -->
              <div class="input-text-wrap mb10">
                <label class="label-input-text optional" for="name03">賃貸人名（漢字）</label>
                <div class="inputs">
                  <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
                    <?php $lname_01 = 'lastname_01'; ?>
                    <input type="text" class="w100" placeholder="姓" name="<?php echo h($lname_01); ?>" value="<?php echo h($input[$lname_01]['value']); ?>" id="name03-1">
                    <?php $lname_02 = 'lastname_02'; ?>
                    <input type="text" class="w100" placeholder="名" name="<?php echo h($lname_02); ?>" value="<?php echo h($input[$lname_02]['value']); ?>" id="name03-2">
                  </div>
                </div>
              </div>
              <!-- お名前（フリガナ） -->
              <div class="input-text-wrap">
                <label class="label-input-text optional" for="name04">賃貸人名（フリガナ）</label>
                <div class="inputs">
                  <div style="display:grid; grid-template-columns: 1fr 1fr; gap:8px;">
                    <?php $klname_01 = 'klastname_01'; ?>
                    <input type="text" class="w100" placeholder="セイ" name="<?php echo h($klname_01); ?>" value="<?php echo h($input[$klname_01]['value']); ?>" id="name04-1">
                    <?php $klname_02 = 'klastname_02'; ?>
                    <input type="text" class="w100" placeholder="メイ" name="<?php echo h($klname_02); ?>" value="<?php echo h($input[$klname_02]['value']); ?>" id="name04-2">
                  </div>
                  <p class="error" id="err-msg-input-lkname"><?php if (!empty($err_msg['<?php echo h($klname_01); ?>'])) echo $err_msg['<?php echo h($klname_01); ?>']; ?></p>
                </div>
              </div>
            </fieldset>

            <fieldset>
              <!-- メールアドレス -->
              <div class="input-text-wrap">
                <label class="label-input-text required" for="email01">メールアドレス</label>
                <div class="inputs">
                  <p class="font12 mb5">半角英数文字でご入力ください。</p>
                  <p class="font12 mb10">ご退去のご依頼の方は、退去後も連絡の取れるアドレスをご記入ください。</p>
                  <?php $mail = 'mail'; ?>
                  <input class="w100" type="email" id="email01" name="<?php echo h($mail); ?>" value="<?php echo h($input[$mail]['value']); ?>" placeholder="例）aaa@example.com">
                  <p class="error" id="err-msg-input-mail"><?php if (!empty($err_msg['<?php echo h($mail); ?>'])) echo $err_msg['<?php echo h($mail); ?>']; ?></p>
                </div>
              </div>
            </fieldset>

            <fieldset>
              <!-- メールアドレス（確認用） -->
              <div class="input-text-wrap">
                <label class="label-input-text required" for="email02">メールアドレス（確認用）</label>
                <div class="inputs">
                  <?php $cmail = 'confirm_mail'; ?>
                  <input class="w100" type="email" id="email02" name="<?php echo h($cmail); ?>" value="<?php echo h($input[$cmail]['value']); ?>" placeholder="例）aaa@example.com">
                  <p class="error" id="err-msg-input-cmail"><?php if (!empty($err_msg['<?php echo h($cmail); ?>'])) echo $err_msg['<?php echo h($cmail); ?>']; ?></p>
                </div>
              </div>
            </fieldset>

            <fieldset id="address">
              <div class="input-text-wrap">
                <label class="label-input-text required" for="address">ご住所</label>
                <div class="inputs" id="address-no">
                  <div>
                    <p class="font12 mb5">建物名称まで正確にご記入ください。</p>
                    <p class="font12 mb10">駐車場の解約の場合は、区画番号を最後にご記入ください。</p>
                    <div class="input-flex mb10" id="postal-number">
                      <?php $address01 = 'address_01'; ?>
                      <input class="postal" type="text" id="address01" name="<?php echo h($address01); ?>" maxlength="3" size="3" placeholder="000"> -
                      <?php $address02 = 'address_02'; ?>
                      <input class="postal" type="text" id="address02" name="<?php echo h($address02); ?>" maxlength="4" size="4" placeholder="0000">
                      <p class="error" id="err-msg-input-address"><?php if (!empty($err_msg['<?php echo h($address01); ?>'])) echo $err_msg['<?php echo h($address01); ?>']; ?></p>
                    </div>
                    <?php $address03 = 'address_03'; ?>
                    <input class="w100" type="text" id="address03" name="<?php echo h($address03); ?>" placeholder="ご住所">
                  </div>
                  <p class="error" id="err-msg-input-address03"><?php if (!empty($err_msg['<?php echo h($address03); ?>'])) echo $err_msg['<?php echo h($address03); ?>']; ?></p>
                </div>
              </div>
            </fieldset>

            <fieldset>
              <div class="input-text-wrap">
                <label class="label-input-text required" for="tel">電話番号</label>
                <div class="inputs" id="phone-no">
                  <p class="font12 mb5">半角数字でご入力ください。</p>
                  <p class="font12 mb10">ご退去のご依頼の方は、退去後も連絡の取れるアドレスをご記入ください。</p>
                  <div class="input-flex">
                    <?php $tel01 = 'tel_01'; ?>
                    <?php $tel02 = 'tel_02'; ?>
                    <?php $tel03 = 'tel_03'; ?>
                    <input type="tel" id="tel01" name="<?php echo h($tel01); ?>" maxlength="4" size="4" placeholder="000"> -
                    <input type="tel" id="tel02" name="<?php echo h($tel02); ?>" maxlength="4" size="4" placeholder="0000"> -
                    <input type="tel" id="tel03" name="<?php echo h($tel03); ?>" maxlength="4" size="4" placeholder="0000">
                  </div>
                  <p class="error" id="err-msg-input-tel"><?php if (!empty($err_msg['<?php echo h($tel01); ?>'])) echo $err_msg['<?php echo h($tel01); ?>']; ?></p>
                </div>
              </div>
            </fieldset>

            <!-- 入居者用の依頼内容種別 -->
            <fieldset class="fieldset-resident" id="fieldset-resident">
              <p class="required mb15 choice-inst">ご依頼内容：下記より該当する依頼内容をお選びください。（複数選択可）</p>
              <div class="choice_wrap">
                <?php
                $name = 'resident';
                $count = 1;
                $values = array(
                  '車庫証明発行依頼',
                  '退去証明・賃料証明発行依頼',
                  '名義変更手続きの依頼',
                  '婚姻等による契約者名義変更について（苗字の変更含む）',
                  '解約手続き（駐車場の解約を含む）',
                  '契約の更新手続きについて',
                  '建物や室内の不具合について（共用部含む）',
                  '賃料等のお支払いについて',
                  'その他、ご相談やお困りごとについて'
                );

                // Assuming $input is an array of selected values
                $selectedValues = isset($input[$name]['value']) ? $input[$name]['value'] : array(); // Example: ['車庫証明発行依頼', '契約の更新手続きについて']
                if (!is_array($selectedValues)) {
                  $selectedValues = array($selectedValues);
                }
                ?>
                <input type="hidden" id="input-<?php echo htmlspecialchars($name); ?>" value="">
                <?php foreach ($values as $value) : ?>
                  <label for="resident0-<?php echo $count; ?>">
                    <input type="checkbox" id="resident0-<?php echo $count; ?>" class="resident" name="<?php echo h($name); ?>[]" value="<?php echo h($value); ?>" <?php echo in_array($value, $selectedValues) ? 'checked' : ''; ?> />
                    <?php echo h($value); ?>
                  </label>
                  <?php $count++; ?>
                <?php endforeach; ?>
              </div>
              <p class="error" id="err-msg-input-resident"><?php if (!empty($err_msg['<?php echo h($resident); ?>'])) echo $err_msg['<?php echo h($resident); ?>']; ?></p>
            </fieldset>

            <!-- オーナー様用の問合せ内容種別 -->
            <fieldset class="fieldset-owner" id="fieldset-owner">
              <p class="required choice-inst mb15">ご要望ご相談内容：下記より該当される内容をお選びください。（複数選択可）</p>
              <div class="choice_wrap">
                <?php
                $name = 'owner';
                $count = 1;
                $values = array(
                  '物件の募集をお願いしたい',
                  '管理委託に関して相談をしたい',
                  '建物の修繕及びリノベーションの相談をしたい',
                  'ホームステージングの相談をしたい',
                  '賃貸物件の空室対策について相談をしたい',
                  '土地・建物の売買について相談をしたい',
                  '物件等の購入について相談をしたい',
                  '相続関連の相談をしたい',
                  '空き家・民泊運営について相談したい',
                  'その他'
                );

                // Assuming $input is an array of selected values
                $selectedValues = isset($input[$name]['value']) ? $input[$name]['value'] : array(); // Example: ['車庫証明発行依頼', '契約の更新手続きについて']
                if (!is_array($selectedValues)) {
                  $selectedValues = array($selectedValues);
                }
                ?>
                <input type="hidden" id="input-<?php echo h($name); ?>" value="">
                <?php foreach ($values as $value) : ?>
                  <label for="owner0-<?php echo $count; ?>">
                    <input type="checkbox" id="owner0-<?php echo $count; ?>" class="owner" name="<?php echo h($name); ?>[]" value="<?php echo h($value); ?>" <?php echo in_array($value, $selectedValues) ? 'checked' : ''; ?> />
                    <?php echo h($value); ?>
                  </label>
                  <?php $count++; ?>
                <?php endforeach; ?>
              </div>
              <p class="error" id="err-msg-input-owner"><?php if (!empty($err_msg['<?php echo h($owner); ?>'])) echo $err_msg['<?php echo h($owner); ?>']; ?></p>
            </fieldset>

            <!-- 賃貸物件をお探しの方用の問合せ内容種別 -->
            <fieldset class="fieldset-search" id="fieldset-search">
              <p class="required choice-inst mb15">ご要望ご相談内容：下記より該当される内容をお選びください。（複数選択可）</p>
              <div class="choice_wrap">
                <?php
                $name = 'search';
                $count = 1;
                $values = array(
                  '賃貸アパート、マンションを探している',
                  '賃貸一戸建て、借家を探している',
                  '駐車場を探している',
                  '店舗、テナントを探している',
                  'その他'
                );

                // Assuming $input is an array of selected values
                $selectedValues = isset($input[$name]['value']) ? $input[$name]['value'] : array(); // Example: ['車庫証明発行依頼', '契約の更新手続きについて']
                if (!is_array($selectedValues)) {
                  $selectedValues = array($selectedValues);
                }
                ?>
                <input type="hidden" id="input-<?php echo h($name); ?>" value="">
                <?php foreach ($values as $value) : ?>
                  <label for="search0-<?php echo $count; ?>">
                    <input type="checkbox" id="search0-<?php echo $count; ?>" class="search" name="<?php echo h($name); ?>[]" value="<?php echo h($value); ?>" <?php echo in_array($value, $selectedValues) ? 'checked' : ''; ?> />
                    <?php echo h($value); ?>
                  </label>
                  <?php $count++; ?>
                <?php endforeach; ?>
              </div>
              <p class="error" id="err-msg-input-search"><?php if (!empty($err_msg['<?php echo h($search); ?>'])) echo $err_msg['<?php echo h($search); ?>']; ?></p>
            </fieldset>

            <fieldset>
              <!-- お問い合わせ内容 -->
              <div class="input-text-wrap">
                <label class="label-input-text" for="message">お問い合わせ内容</label>
                <div class="inputs">
                  <?php $inquiry = 'content_inquiry'; ?>
                  <textarea class="" name="<?php echo h($inquiry); ?>" id="message" cols="30" rows="8" placeholder="ご自由にお書きください。（400文字まで）"></textarea>
                </div>
              </div>
            </fieldset>

            <div class="btn-wrap">
              <!-- <input type="reset" value="リセット" /> -->
              <button type="reset" class="reset" id="reset-btn">リセット</button>
              <!-- <input type="submit" value="この内容で確認する" /> -->
              <button class="submit" id="check-btn">
                <input type="hidden" name="mode" value="confirm" />
                この内容で確認する
              </button>
            </div>

          </form>

        </div><!-- /.sitemap-wrap -->


      </div><!-- /.container -->
    </div><!-- /.main-wrap.w100.white-->

  </div><!-- /.wrap -->

  <!-- フッター -->
  <div id="FOOTER" class="footer-wrap">
  </div>
  <!-- /.footer -->

  <!-- ページトップボタン -->
  <a href="#top" class="pagetop"></a>

  <!--オーバーレイ nav-->
  <nav id="OVERLAY">
  </nav>

  <!--共通ハンバーガー-->
  <header class="d-md-none" id="hamburger">
    <div id="nav_toggle"> <span></span> <span></span> <span></span> </div>
  </header>

  <script src="js/common.js"></script>
  <script>
    //NAVUTIL呼び出し
    fetch("../subpage-templates/include_nav_util.html")
      .then(response => {
        return response.text()
      })
      .then(data => {
        document.getElementById("NAVUTIL").innerHTML = data;
      });

    //MEGAMENU呼び出し
    fetch("../subpage-templates/include_megamenu.html")
      .then(response => {
        return response.text()
      })
      .then(data => {
        document.getElementById("MEGAMENU").innerHTML = data;
      });

    //FOOTER呼び出し
    fetch("../subpage-templates/include_footer.html")
      .then(response => {
        return response.text()
      })
      .then(data => {
        document.getElementById("FOOTER").innerHTML = data;
      });

    //OVERLAY呼び出し
    fetch("../subpage-templates/include_nav_overlay.html")
      .then(response => {
        return response.text()
      })
      .then(data => {
        document.getElementById("OVERLAY").innerHTML = data;
      });
  </script>

</body>

</html>