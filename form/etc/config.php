<?php
class MailConfig
{
	/*
*	設定ファイル
*	フォームの設定をするファイルです。
*	各項目の項目名や必須チェック設定はここでします。
*/
	public function get_columns()
	{
		/*
		* フォーム各項目の設定
		* 変数名※必須	：テンプレートでも使うのでアルファベットで適当なものを設定してください。
		* 表示名※必須	:必須入力などのエラーメッセージを表示するのに使うので日本語で設定してください。
		* 入力タイプ※必須	:どのような内容が入るかを設定します。基本的にはtextでいいです。設定によっては入力内容に制限をかけ、エラーメッセージを表示させて確認画面へ進めなくさせる事ができます。
						:'text'		基本的にこれを設定する。特に制限なし。
						:'email'	メールアドレス欄用。メールアドレスの形式になっていないものが入力された場合エラーメッセージが出る。
						:'phone'	電話番号欄用。電話番号ではありえない文字が入っていた場合エラー。
						:'zipcode'	郵便番号欄用。
						:'number'	半角数字のみ。
						:'numberh'	半角数字とハイフンのみ。
						:'hiragana'	ひらがなのみ。
						:'katakana'	カタカナのみ。
		* 必須チェック※必須	:必須項目かどうか設定します。設定した項目は未入力だった場合エラーメッセージが表示され、入力しないと確認画面へ進めなくなります。
						:必須項目にする場合はtrue、必須項目ではない場合はfalseと入力してください。
		* その他チェック		:追記予定機能。NULLで。
		* グループ化		:追記予定機能。NULLで。
		*/
		return array(
			/* ▽ここから▽ */
			'choice' => array(
				'name'		=> 'choice-data',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> false,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'family_name' => array(
				'name'		=> 'family-name-data',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'name' => array(
				'name'		=> 'name-data',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'katakana_01' => array(
				'name'		=> 'katakana-name-one',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'katakana_02' => array(
				'name'		=> 'katakana-name-two',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'lastname_01' => array(
				'name'		=> 'last-name-one',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'lastname_02' => array(
				'name'		=> 'last-name-two',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'klastname_01' => array(
				'name'		=> 'klast-name-one',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'klastname_02' => array(
				'name'		=> 'klast-name-two',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'mail' => array(
				'name'		=> 'mail-data',
				'type'		=> 'email',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'confirm_mail' => array(
				'name'		=> 'confirm-mail-data',
				'type'		=> 'email',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'address_01' => array(
				'name'		=> 'address01',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'address_02' => array(
				'name'		=> 'address02',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'address_03' => array(
				'name'		=> 'address03',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'tel_01' => array(
				'name'     => 'telephone01',
				'type'     => 'text',
				'value'    => '',
				'required' => true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'tel_02' => array(
				'name'     => 'telephone02',
				'type'     => 'text',
				'value'    => '',
				'required' => true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'tel_03' => array(
				'name'     => 'telephone03',
				'type'     => 'text',
				'value'    => '',
				'required' => true,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'resident' => array(
				'name'		=> 'resident-data',
				'type'		=> 'checkbox',
				'value'		=> '',
				'required'	=> false,
				'check'		=> NULL,
				'group'		=> NULL
			),
			'owner' => array(
				'name'		=> 'owner-data',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'group'		=> NULL
			),
			'search' => array(
				'name'		=> 'search-data',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'group'		=> NULL
			),
			'content_inquiry' => array(
				'name'		=> 'inquiry-data',
				'type'		=> 'text',
				'value'		=> '',
				'required'	=> true,
				'check'		=> NULL,
				'group'		=> NULL
			),
		);
	}
	public function get_email_return()
	{
		/*
		* お問い合わせしたユーザにメールを送るかどうか。
		* 送らないならfalse、送るならメールアドレスの項目の変数名（上記のフォーム各項目の設定参照）を書いてください。
		*/
		return 'mail';
		//return 'mail';//送る場合の設定例。
	}

	public function get_from_adress()
	{
		/*
		*	送信元アドレス設定
		*	送信元アドレス欄に表示されるアドレスを指定します。
		*	（送信専用で受信できないアドレスでも構いません。)
		*/
		return 'support@h-lobby.jp';
	}

	public function get_send_to()
	{
		/*
		* 管理者メールアドレス設定（送信先）
		* カンマで区切って複数のメールアドレスを書くと複数の管理者に同時送信されます。
		*/
		return array(
			'myatminhtay.qualymm@gmail.com',
		);
	}
}


/*
* 基本設定ここまで
* これより下は開発用や特殊な環境下用の設定になります。
* 開発等しない場合は書き換えなくていいです。
*/

/*
	* デバッグモード
	* 基本的にfalseのままにしておいてください。
	* trueにした場合はphpのエラー表示が出るようになります。
	* !!!本番公開の際は絶対にfalseにすること!!!
	*/
define('DEBUG', false);

/* 言語・タイムゾーンなどの設定 */
setlocale(LC_TIME, 'ja_JP');
date_default_timezone_set('Asia/Tokyo');
