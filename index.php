<?php
require_once(dirname(__FILE__) . '/form/etc/config.php');
/* デバッグモード */
if (DEBUG) {
	ini_set('display_errors', 1);
	error_reporting(-1);
}
require_once(dirname(__FILE__) . '/form/lib/functions.php');
require_once(dirname(__FILE__) . '/form/lib/Session.php');

class SimpleFormController
{


	protected $script_encoding = 'UTF-8';

	protected $input_html   = './index.template.php';
	protected $confirm_html = './confirm.template.php';
	protected $thanks_url   = '../subpage-templates/contact-complete.html';

	protected $input = array();

	protected $email_for_admin = './form/etc/email_for_admin.template.php';
	protected $email_for_user  = './form/etc/email_for_user.template.php';
	protected $email_return    = 'email';

	protected $error = 0;


	public function __construct()
	{

		$this->config = new MailConfig();
		session_cache_limiter('');
		Session::start('form_session');
		$paths = array('input_html', 'confirm_html', 'email_for_admin', 'email_for_user');

		foreach ($paths as $p) {
			$this->{$p} = realpath(dirname(__FILE__) . '/' . $this->{$p});
		}

		$columns = $this->config->get_columns();
		foreach ($columns as $key => $value) {
			$columns[$key]['error'] = array();
		}
		$this->input = $columns;

		if (!empty($_POST)) {
			foreach ($_POST as $key => $val) {
				if (!isset($this->input[$key])) continue;
				$this->input[$key]['value'] = $val;
			}
		}
	}


	public function input()
	{
		$this->render($this->input_html);
	}


	public function confirm()
	{

		/*if( !$this->validate() ){
			Session::set('form_error', '入力内容に誤りがあります。ご確認ください。');
			$this->input();
			exit;
		}*/

		$tokens = Session::get('form_csrf_token');
		$new_token = $this->generate_token();
		$tokens[$new_token] = $new_token;
		Session::set('form_csrf_token', $tokens);

		$this->render($this->confirm_html, array('token' => $new_token));
	}

	/*	public function validate(){

		$error = 0;

		foreach($this->input as &$input){

			if( $input['required'] ){
				if( $input['type']==='array' ? empty($input['value']) : !strlen($input['value']) )
				$input['error'][] = $input['name'].'を入力してください';
			}

			switch($input['type']){
				case 'hiragana':
					$input['value'] = mb_convert_kana($input['value'], 'HVcS', $this->script_encoding);
					if( !preg_match('/^[　ァ-ヾ]*$/u', $input['value']) ){
						$input['error'][] = $input['name'].'はひらがなで入力してください。';
					}
					break;
				case 'katakana':
					$input['value'] = mb_convert_kana($input['value'], 'KVCS', $this->script_encoding);
					if( !preg_match('/^[　ァ-ヾ]*$/u', $input['value']) ){
						$input['error'][] = $input['name'].'はカタカナで入力してください。';
					}
					break;
				case 'number':
					$input['value'] = mb_convert_kana($input['value'], 'a', $this->script_encoding);
					if( !preg_match('/^\d*$/', $input['value']) ){
						$input['error'][] = $input['name'].'は半角数字で入力してください。';
					}
					break;
				case 'numberh':
					$input['value'] = preg_replace('/[−ー―‐]/u', '-', mb_convert_kana($input['value'], 'a', $this->script_encoding));
					if( !preg_match('/^(\d|-)*$/', $input['value']) ){
						$input['error'][] = $input['name'].'は半角数字とハイフンで入力してください。';
					}
					break;
				case 'zipcode':
					$input['value'] = preg_replace('/[−ー―‐]/u', '-', mb_convert_kana($input['value'], 'a', $this->script_encoding));
					if( preg_match('/^((\d{3})-?(\d{4}))?$/', $input['value'], $matches) ){
						if(strlen($input['value'])) $input['value'] = $matches[2].'-'.$matches[3];
					}else{
						$input['error'][] = $input['name'].'の書式が正しくありません。';
					}
					break;
				case 'phone':
					$input['value'] = preg_replace('/[−ー―‐]/u', '-', mb_convert_kana($input['value'], 'a', $this->script_encoding));
					if( !preg_match('/^(\d{1,4}-?\d{1,4}-?\d{1,4})?$/', $input['value']) ){
						$input['error'][] = $input['name'].'の書式が正しくありません。';
					}
					break;
				case 'email':
					$input['value'] = mb_convert_kana($input['value'], 'a', $this->script_encoding);
					if( !preg_match('/^([a-z0-9_.+-]+[@][a-z0-9-]+?(\.[a-z0-9-]+?)+)?$/', $input['value']) ){
						$input['error'][] = $input['name'].'が不正です。';
					}
					break;
				case 'confirm':
					if( $input['value'] !== $this->input[$input['target']]['value'] ){
						$input['error'][] = $this->input[$input['target']]['name'].'が一致しません。';
					}
					break;
				case 'other':
					if( $this->input[$input['target']]['value']===$input['condition'] && !strlen($input['value']) ){
						$input['error'][] = $input['name'].'を入力してください。';
					}
					break;
			}

			$error += count($input['error']);

			unset($input);

		}

		$this->error = $error;

		return !$error;

	}*/


	public function submit()
	{

		$tokens = Session::get('form_csrf_token');

		if (!isset($tokens[$_POST['token']])) {
			Session::set('form_error', '多重送信 または 不正な送信とみなされました。恐れ入りますがもう一度ご確認ください。');
			$this->confirm();
			exit;
		}

		/*		if( !$this->validate() ){
			Session::set('form_error', '入力内容に誤りがあります。ご確認ください。');
			$this->input();
			exit;
		}*/

		unset($tokens[$_POST['token']]);
		Session::set('form_csrf_token', $tokens);

		$is_return = $this->config->get_email_return() && $this->input[$this->config->get_email_return()]['type'] === 'email' && strlen($this->input[$this->config->get_email_return()]['value']);

		$send_to = $this->config->get_send_to();


		//new field (updated 28.2.2025)
		$input = $this->input;

		if ($input['choice']['value'] === '営業の方はこちら') {

			if ($is_return) {
				$this->sendTo($this->input[$this->config->get_email_return()]['value'], $this->email_for_user);
			}

			$this->redirect($this->thanks_url);
			return;
		}

		//end new field (updated 28.2.2025)

		foreach ($send_to as $value) {
			$this->sendTo($value, $this->email_for_admin, $is_return ? $this->input[$this->config->get_email_return()]['value'] : NULL);
		}

		if ($is_return) {
			$this->sendTo($this->input[$this->config->get_email_return()]['value'], $this->email_for_user);
		}

		$this->redirect($this->thanks_url);
	}


	// protected function sendTo($address, $template_path, $reply_to=NULL){

	// 	$address = trim($address);

	// 	ob_start();
	// 	$input = $this->input;
	// 	include($template_path);
	// 	$message = explode("\n", trim(ob_get_clean()));

	// 	mb_language("ja");
	// 	mb_internal_encoding("ISO-2022-JP");

	// 	$subject = mb_convert_encoding(trim(array_shift($message)), "JIS", $this->script_encoding);
	// 	$message = mb_convert_encoding(trim(implode("\n", $message)), "JIS", $this->script_encoding);

	// 	$header	= "";
	// 	$header .= "From:"  . $this->config->get_from_adress() . "\n";
	// 	if($reply_to){
	// 		$header .= "Reply-To:" . trim($reply_to) . "\n";
	// 	}
	// 	$header	= mb_convert_encoding($header, "JIS", $this->script_encoding);

	// 	return mb_send_mail($address, $subject, $message, $header);

	// }
	protected function sendTo($address, $template_path, $reply_to = NULL)
	{
		$address = trim($address);

		ob_start();
		$input = $this->input;
		include($template_path);
		$message = explode("\n", trim(ob_get_clean()));

		mb_language("ja");
		mb_internal_encoding("ISO-2022-JP");

		$subject = mb_convert_encoding(trim(array_shift($message)), "JIS", $this->script_encoding);
		$message = mb_convert_encoding(trim(implode("\n", $message)), "JIS", $this->script_encoding);

		$header = "";
		$from_name = "ハウジングロビー"; // Set the desired display name here
		$from_email = $this->config->get_from_adress();
		$header .= "From: \"$from_name\" <$from_email>\n";
		if ($reply_to) {
			$header .= "Reply-To: " . trim($reply_to) . "\n";
		}
		$header = mb_convert_encoding($header, "JIS", $this->script_encoding);

		return mb_send_mail($address, $subject, $message, $header);
	}



	public function render($file, $vars = array())
	{
		extract($vars);
		$input = $this->input;
		include($file);
		exit;
	}


	public function redirect($to)
	{
		header('Location: ' . $to);
		exit;
	}


	protected function generate_token()
	{
		if (function_exists('openssl_random_pseudo_bytes')) {
			return bin2hex(openssl_random_pseudo_bytes(32));
		} else {
			return substr(sha1(mt_rand()) . sha1(mt_rand()), 0, 64);
		}
	}
}


$form = new SimpleFormController();
$mode = isset($_POST['mode']) ? $_POST['mode'] : Session::get('mode');
switch ($mode) {
	case 'submit':
		$form->submit();
		break;
	case 'confirm':
		$form->confirm();
		break;
	default:
		$form->input();
		break;
}
