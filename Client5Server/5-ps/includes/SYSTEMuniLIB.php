<?
// BEGIN: Loose Functions ------------------------------------------
function runPlugins ($itx) {
	$INDO = new F5class();
	if(boolQuery("SELECT * FROM `".dbprfx."plugins` WHERE `runKey` LIKE ';;".$itx['get']['com'].";".$itx['get']['action'].";;' LIMIT 1")) {
		// GREAT! There is an existing runKey matching the GET Paramters, so we retrieve
		// the values now in their proper type/list order.

		// Okay First let's get the Plugin Types from the config table...
		$itx['plugin']['types'] = $INDO->getPluginTypes();
		// Next, let's load each Plugin Type from lowest to highest in List Order
		// defined by the plugins table.
		$plugintypex = 0; // a temporary loop counter
		while (isset($itx['plugin']['types'][$plugintypex])) {
			$itx['plugin']['load'][$plugintypex] = new DBclass();
			$itx['plugin']['load'][$plugintypex]->simpleQuery("SELECT * FROM `".dbprfx."plugins` WHERE `runKey` LIKE ';;".$itx['get']['com'].";".$itx['get']['action'].";;' AND `type` = '".$itx['plugin']['types'][$plugintypex]."' ORDER BY `listOrder` ASC");
			$itx['plugin']['counter'][$plugintypex]['count'] = $itx['plugin']['load'][$plugintypex]->rows();
			$itx['plugin']['counter'][$plugintypex]['current'] = 0;
			while ($itx['plugin']['counter'][$plugintypex]['current'] < $itx['plugin']['counter'][$plugintypex]['count']) {
				$itx['temp']['pluginloader']['result'] = $itx['plugin']['load'][$plugintypex]->result();
				include(pathPrivate."plugins/plg-".$itx['temp']['pluginloader']['result']['folder']."/".$itx['plugin']['types'][$plugintypex]['file'].".php");
			}
		}
	}
	else {
		
		// Ooopsie! There is NOT a runKey matching the GET Paramters, so we retrieve 
		// the default values for the Framework now in their proper type/list order.
		// Okay First let's get the Plugin Types from the config table...
		$itx['plugin']['types'] = $INDO->getPluginTypes();
		// Next, let's load each Plugin Type from lowest to highest in List Order
		// defined by the plugins table.
		$plugintypex = 0; // a temporary loop counter
		while (isset($itx['plugin']['types'][$plugintypex])) {
			$itx['plugin']['load'][$plugintypex] = new DBclass();
			$itx['plugin']['load'][$plugintypex]->simpleQuery("SELECT * FROM `".dbprfx."plugins` WHERE `runKey` LIKE ';;default;all;;' AND `type` = '".$itx['plugin']['types'][$plugintypex]."' ORDER BY `listOrder` ASC");
			$itx['plugin']['counter'][$plugintypex]['count'] = $itx['plugin']['load'][$plugintypex]->rows();
			$itx['plugin']['counter'][$plugintypex]['current'] = 0;
			while ($itx['plugin']['counter'][$plugintypex]['current'] < $itx['plugin']['counter'][$plugintypex]['count']) {
				include(pathPrivate."plugins/plg-".$itx['plugin']['load'][$plugintypex]->result()."/".$itx['plugin']['types'][$plugintypex]['file'].".php");
			}
		}
	}
}
// END: Loose Functions ------------------------------------------
// BEGIN: Class List ---------------------------------------------
class F5class {
	//Initilize Session
	public function initSession($session) {
		if (!isset($session['initiated'])) {
			session_regenerate_id();
			$session['initiated'] = true;
		}
		return $session;
	}
	//Agent Session
	public function agentSession($session,$agent) {
		$fingerprint = md5($agent . secretPUBLIC);
		if (isset($session['HTTP_USER_AGENT'])) {
			if ($session['HTTP_USER_AGENT'] != $fingerprint) {
				die();
				exit;
			}
		} else {
			$session['HTTP_USER_AGENT'] = $fingerprint;
		}
		return $session;
	}

	public function myMIME($filename){


		$mime_types = array(

			'txt' => 'text/plain',
			'htm' => 'text/html',
			'html' => 'text/html',
			'php' => 'text/html',
			'css' => 'text/css',
			'js' => 'application/javascript',
			'json' => 'application/json',
			'xml' => 'application/xml',
			'swf' => 'application/x-shockwave-flash',
			'flv' => 'video/x-flv',

			// images
			'png' => 'image/png',
			'jpe' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'jpg' => 'image/jpeg',
			'gif' => 'image/gif',
			'bmp' => 'image/bmp',
			'ico' => 'image/vnd.microsoft.icon',
			'tiff' => 'image/tiff',
			'tif' => 'image/tiff',
			'svg' => 'image/svg+xml',
			'svgz' => 'image/svg+xml',

			// archives
			'zip' => 'application/zip',
			'rar' => 'application/x-rar-compressed',
			'exe' => 'application/x-msdownload',
			'msi' => 'application/x-msdownload',
			'cab' => 'application/vnd.ms-cab-compressed',

			// audio/video
			'mp3' => 'audio/mpeg',
			'qt' => 'video/quicktime',
			'mov' => 'video/quicktime',
			'mp4' => 'video/mp4',
			'ogg' => 'audio/ogg',
			
			// adobe
			'pdf' => 'application/pdf',
			'psd' => 'image/vnd.adobe.photoshop',
			'ai' => 'application/postscript',
			'eps' => 'application/postscript',
			'ps' => 'application/postscript',

			// ms office
			'doc' => 'application/msword',
			'rtf' => 'application/rtf',
			'xls' => 'application/vnd.ms-excel',
			'ppt' => 'application/vnd.ms-powerpoint',
			'docx' => 'application/msword',
			'xlsx' => 'application/vnd.ms-excel',
			'pptx' => 'application/vnd.ms-powerpoint',


			// open office
			'odt' => 'application/vnd.oasis.opendocument.text',
			'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
			);

		$explode = explode('.',strtolower($filename));
	$x = 0;
		while(isset($explode[$x])) {
		$myreturn = $explode[$x];
		$x++;


	}
	return $myreturn;
	}

	public function genUUID() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

			
			mt_rand( 0, 0xffff ),

			
			mt_rand( 0, 0x0fff ) | 0x4000,

			
			mt_rand( 0, 0x3fff ) | 0x8000,

			
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}

	public function safeGet($get) {
		if (!(isset($get['com']) AND preg_match("/(\w|\-)+/",$get['com']))) {
			$get['com'] = defGETcom;
		}
		if (!(isset($get['action']) AND preg_match("/(\w|\-)+/",$get['action']))) {
			$get['action'] = defGETview; 
		}
		if (!(isset($get['id1']) AND preg_match("/\d/",$get['id1']) AND $get['id1'] < 18446744073709551615)) {
			$get['id1'] = 0;
		}
		if (!(isset($get['id2']) AND preg_match("/\d/",$get['id2']) AND $get['id2'] < 18446744073709551615)) {
			$get['id1'] = 0;
		}
		if (!(isset($get['id3']) AND preg_match("/\d/",$get['id3']) AND $get['id3'] < 18446744073709551615)) {
			$get['id1'] = 0;
		}
		if (!(isset($get['uuid1']) AND preg_match("/(\w|\-)+/",$get['uuid1']))) {
			$get['uuid1'] = defGETuuid;
		}
		if (!(isset($get['uuid2']) AND preg_match("/(\w|\-)+/",$get['uuid2']))) {
			$get['uuid2'] = defGETuuid;
		}
		if (!(isset($get['uuid3']) AND preg_match("/(\w|\-)+/",$get['uuid3']))) {
			$get['uuid3'] = defGETuuid;
		}
		if (isset($get['mode1']) AND preg_match("/\w/",$get['mode1'])) {
			$get['mode1'] = defMode;
		}
		if (isset($get['mode2']) AND preg_match("/\w/",$get['mode2'])) {
			$get['mode1'] = defMode;
		}
		if (isset($get['mode3']) AND preg_match("/\w/",$get['mode3'])) {
			$get['mode1'] = defMode;
		}
		return $get;
	}

	public function getPrettyTime($foo,$timezone) {
	// New Timezone Object 
	$timez = new DateTimeZone($timezone); 

	// New DateTime Object 
	$date =  new DateTime('@'.$foo, $timez);    


	// You can still set the timezone though like so...        
	$date->setTimezone($timez); 

	// This will now output 2011-05-23 00:00:00 
	return $date->format('l, F jS, Y g:i A');
	}
}
// END: Class List ---------------------------------------------
