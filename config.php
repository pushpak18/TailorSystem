<?php
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbname = "tailor";
	$basepath ='/Tailor/';
	$server_url = "http://localhost/Tailor/";
	$session="mps";
	$testsite=1;
	$testsite = 0;
	//$scripts_url = "http://localhost/scripts/";
	if(strpos($_SERVER["SERVER_SOFTWARE"],"Win") !== false)
		define('SCRIPTS_DIR', $_SERVER['DOCUMENT_ROOT'] . "scripts/");
	else
		define('SCRIPTS_DIR', $_SERVER['DOCUMENT_ROOT'] . "/scripts/");

	$custom_smtp = array(
		'host' => 'smtp.googlemail.com',
		'port' => 465,
		'secure' => 'ssl',
		'user' => 'support@triyama.com',
		'pass' => 'tsplpune;'
	);

	$conn;
	$cookie_multi_types = false;
	$from = @$_SESSION[$session]['email'];
	$sitename_caps = "Triyama Application";
	$site_description = "Triyama Application";
	$headers = "From: " . $from . "\r\n" . "Reply-To: " . $from . "\r\n";

	$cron_mails_limit = 25;

	function debug($query){
		if(is_object($query))
				echo "<pre>" . var_dump($query) . "</pre><br />";
			elseif(is_array($query))
				echo "<pre>" . print_r($query, true) . "</pre><br />";
			else
				echo "{$query}<br /><br /><br />";

			global $log, $debug;
			if($debug)
				$log .= $query . '';
	}

	function opendb()
	{
		global $hostname, $username, $password, $dbname, $conn;
		if(!$conn)
		{
			$conn = mysql_connect($hostname, $username, $password) or db_fail('Error connecting to mysql');
			mysql_select_db($dbname);
		}
	}
	function closedb()
	{
		global $conn;
		if($conn)
		{
			mysql_close($conn);
			$conn = false;
		}
	}
	function db_fail($query)
	{
		global $sitename_caps, $server_url, $headers, $mail_enable, $testsite;

		$error = mysql_error();
		$file = fopen('log.txt','a');
		$page = $_SERVER['REQUEST_URI'];

		fwrite($file,"TimeStamp: " . date("Y-m-d H:i:s") . "Page: $page\nQuery: $query\nError: " . mysql_error() . "\n");
		fclose($file);

		if($mail_enable)
			mail('support@triyama.com', $sitename_caps . ' Debug Message',"Page: $page\nQuery: $query\nError: " . mysql_error() . "\n",$headers);

		//$logQuery = "insert into elog(etype, shortdesc, fulldesc, data) values('DB', '" . addslashes($query) . "', '" . addslashes("DB Query Failed.\nPage: $page\nQuery: $query\nError: " . mysql_error() . "\n") . "', '" . addslashes(serialize(array('session' => $_SESSION, 'request' => $_REQUEST, 'server' => $_SERVER))) . "';";
		//@mysql_query($logQuery) or die($logQuery);

		closedb();

		if($testsite)
			die("Query: $query <br/>Error: $error");
		else
		{
			header('Location: ' . $server_url . 'dbfail');
			exit();
		}
	}
?>