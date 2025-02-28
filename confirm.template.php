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
<script>(function(w,d,s,l,i){
    w[l]=w[l]||[];
    w[l].push({
        'gtm.start':
        new Date().getTime(),event:'gtm.js'
    });
    var f=d.getElementsByTagName(s)[0], j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';
    j.async=true;
    j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;
    f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NM89TGHL');</script>
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
            <div class="step">
              <p class="step-num">STEP 1</p>
              <p class="step-desc">内容入力</p>
            </div>
            <i class="fa fa-arrow-right"></i>
            <div class="step active">
              <p class="step-num">STEP 2</p>
              <p class="step-desc">内容確認</p>
            </div>
            <i class="fa fa-arrow-right"></i>
            <div class="step">
              <p class="step-num">STEP 3</p>
              <p class="step-desc">送信完了</p>
            </div>
          </div><!-- /.process -->

          <p class="text-sm-center mb15 font16">入力内容をご確認の上、よろしければ最下部の「この内容で送信する」ボタンを押してください。</p>

          <!-- FORM -->
          <form method="post" action="" name="inquiry_form">
            <!-- 問合せ種別 -->
            <fieldset id="fieldset-top">
              <div class="input-text-wrap">
                <h2 class="font-notosans700 font20 h2-confirm">お問い合わせ種別</h2>
                <p class="font-notosans500 font16 text-navy"><?php echo h($input['choice']['value']); ?></p>
              </div>
            </fieldset>

            <!-- senitize -->
            <?php
            function sanitizeAndEcho($inputText)
            {
              // Remove HTML and PHP tags
              $strippedText = strip_tags($inputText);
              // Convert special characters to HTML entities
              $decodedText = htmlspecialchars($strippedText, ENT_QUOTES, 'UTF-8');
              echo $decodedText;
            }
            ?>

            <!-- お名前 -->
            <fieldset>
              <!-- お名前（漢字） -->
              <div class="input-text-wrap mb10">
                <label class="label-input-text required" for="name01">お名前（漢字）</label>
                <div class="inputs">
                  <div style="display:grid; grid-template-columns: 1fr; gap:8px;">
                    <p class="word-break">
                      <?php echo sanitizeAndEcho($input['family_name']['value']); ?> <?php echo sanitizeAndEcho($input['name']['value']); ?>
                    </p>
                  </div>
                </div>
              </div>
              <!-- お名前（フリガナ） -->
              <div class="input-text-wrap">
                <label class="label-input-text required" for="name02">お名前（フリガナ）</label>
                <div class="inputs">
                  <div style="display:grid; grid-template-columns: 1fr; gap:8px;">
                    <?php echo sanitizeAndEcho($input['katakana_01']['value']); ?> <?php echo sanitizeAndEcho($input['katakana_02']['value']); ?>
                  </div>
                </div>
              </div>
            </fieldset>
            <?php
            $lastname_01 = h($input['lastname_01']['value']);;
            $lastname_02 = h($input['lastname_02']['value']);
            $klastname_01 = h($input['klastname_01']['value']);;
            $klastname_02 = h($input['klastname_02']['value']);
            ?>
            <?php if (!empty($lastname_01 || $lastname_02 || $klastname_01 || $klastname_02)) { ?>
              <fieldset>
                <!-- お名前（漢字） -->
                <?php
                if (!empty($lastname_01 || $lastname_02)) { ?>
                  <div class="input-text-wrap mb10">
                    <label class="label-input-text optional" for="name03">賃貸人名（漢字）</label>
                    <div class="inputs">
                      <div style="display:grid; grid-template-columns: 1fr; gap:8px;">
                        <p class="word-break"><?php echo sanitizeAndEcho($input['lastname_01']['value']); ?> <?php echo sanitizeAndEcho($input['lastname_02']['value']); ?></p>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <!-- お名前（フリガナ） -->
                <?php
                if (!empty($klastname_01 || $klastname_02)) { ?>
                  <div class="input-text-wrap">
                    <label class="label-input-text optional" for="name04">賃貸人名（フリガナ）</label>
                    <div class="inputs">
                      <div style="display:grid; grid-template-columns: 1fr; gap:8px;">
                        <?php echo sanitizeAndEcho($input['klastname_01']['value']); ?> <?php echo sanitizeAndEcho($input['klastname_02']['value']); ?>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </fieldset>
            <?php } ?>

            <fieldset>
              <!-- メールアドレス -->
              <div class="input-text-wrap">
                <label class="label-input-text required" for="email01">メールアドレス</label>
                <div class="inputs">
                  <?php echo sanitizeAndEcho($input['mail']['value']); ?>
                </div>
              </div>
            </fieldset>

            <fieldset>
              <!-- メールアドレス（確認用） -->
              <div class="input-text-wrap">
                <label class="label-input-text required" for="email02">メールアドレス（確認用）</label>
                <div class="inputs">
                  <?php echo sanitizeAndEcho($input['confirm_mail']['value']); ?>
                </div>
              </div>
            </fieldset>

            <fieldset id="address-confirm">
              <div class="input-text-wrap">
                <label class="label-input-text required" for="address">ご住所</label>
                <div class="inputs">
                  <div>
                    <div class="input-flex mb10">
                      <?php echo sanitizeAndEcho($input['address_01']['value']); ?> - <?php echo sanitizeAndEcho($input['address_02']['value']); ?>
                    </div>
                    <p class="word-break"><?php echo sanitizeAndEcho($input['address_03']['value']); ?></p>
                  </div>
                </div>
              </div>
            </fieldset>

            <fieldset>
              <div class="input-text-wrap">
                <label class="label-input-text required" for="tel">電話番号</label>
                <div class="inputs">
                  <div class="input-flex">
                    <?php echo sanitizeAndEcho($input['tel_01']['value']); ?> - <?php echo sanitizeAndEcho($input['tel_02']['value']); ?> - <?php echo sanitizeAndEcho($input['tel_03']['value']); ?>
                  </div>
                </div>
              </div>
            </fieldset>

            <!-- 入居者用の依頼内容種別 -->
            <fieldset id="confirm-fieldset-resident">
              <div class="input-text-wrap">
                <p class="required">ご依頼内容</p>
                <ul class="inquiry-type-list">
                  <?php
                  $selectedValues = isset($input['resident']['value']) ? $input['resident']['value'] : array();
                  if (!is_array($selectedValues)) {
                    $selectedValues = array($selectedValues);
                  }
                  ?>
                  <?php foreach ($selectedValues as $value) : ?>
                    <li><?php echo h($value); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </fieldset>

            <!-- オーナー様用の問合せ内容種別 -->
            <fieldset id="confirm-fieldset-owner">
              <div class="input-text-wrap">
                <p class="required mb15">ご依頼内容：</p>
                <ul class="inquiry-type-list">
                  <?php
                  $selectedValues = isset($input['owner']['value']) ? $input['owner']['value'] : array();
                  if (!is_array($selectedValues)) {
                    $selectedValues = array($selectedValues);
                  }
                  ?>
                  <?php foreach ($selectedValues as $value) : ?>
                    <li><?php echo h($value); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </fieldset>

            <!-- 賃貸物件をお探しの方用の問合せ内容種別 -->
            <fieldset id="confirm-fieldset-search">
              <div class="input-text-wrap">
                <p class="required mb15">ご依頼内容：</p>
                <ul class="inquiry-type-list">
                  <?php
                  $selectedValues = isset($input['search']['value']) ? $input['search']['value'] : array();
                  if (!is_array($selectedValues)) {
                    $selectedValues = array($selectedValues);
                  }
                  ?>
                  <?php foreach ($selectedValues as $value) : ?>
                    <li><?php echo h($value); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </fieldset>
            <?php
            $content_inquiry = h($input['content_inquiry']['value']);;
            ?>
            <?php if (!empty($content_inquiry)) { ?>
              <fieldset>
                <!-- お問い合わせ内容 -->
                <div class="input-text-wrap">
                  <p class="mb15">お問い合わせ内容</p>
                  <div class="inputs">
                    <p class="word-break"><?php echo sanitizeAndEcho($input['content_inquiry']['value']); ?></p>
                  </div>
                </div>
              </fieldset>
            <?php } ?>
            <div class="btn-wrap">
              <button class="reset" type="button" onclick="backButton();">
                戻る
              </button>
              <!-- <a href="javascript:void(0);" class="reset" onclick="backButton();">戻る</a> -->

              <form method="post" action="" name="inquiry_form">
                <?php foreach ($input as $key => $i) : ?>
                  <?php
                  // Convert array values to a string if necessary
                  $value = is_array($i['value']) ? implode(', ', $i['value']) : $i['value'];
                  ?>
                  <input type="hidden" name="<?php echo h($key); ?>" value="<?php echo h($value); ?>">
                <?php endforeach; ?>
                <input type="hidden" name="mode" value="submit">
                <input type="hidden" name="token" value="<?php echo h($token); ?>">
                <button class="submit" onclick="document.inquiry_form.submit();return false;">この内容で送信する</button>
              </form>
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
  <script>
    function backButton() {
      localStorage.setItem('achor', '1');
      localStorage.setItem('data', '1');
      history.back();
      return false;
    }
  </script>

</body>

</html>