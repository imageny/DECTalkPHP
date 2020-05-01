<?php
date_default_timezone_set('America/Chicago');
   $tts = 'Command error in q parameter.';
   
   $truncate = substr($tts, 0, 15);
   
   if ($_GET['q']) {
	 $tts = $_GET['q'];
    }

$file = "dectalk/speech." . md5($truncate) . "." . date("mdyhisA") . ".wav";

$filename = "speech." . md5($truncate) . "." . date("mdyhisA") . ".wav ";

	if (!file_exists($file)) {
     $command = "say.exe -w " . $filename . "[:phoneme on]" . $tts;
     shell_exec("cd dectalk && ".$command);
	}
	
	if (file_exists($file)) {
	 playFile($file);
	}

function playFile($file){
	header('Content-Type: audio/x-wav');
	readfile($file);
}
