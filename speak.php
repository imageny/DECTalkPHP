<?php
date_default_timezone_set('America/Chicago');
   $tts = 'Command error in q parameter.';
   
    if ($_GET['q']) {
	 $tts = $_GET['q'];
    }
   
   $truncate = substr($tts, 0, 15);
   
   $file = "dectalk/speech." . md5($truncate) . "." . date("mdyhisA") . ".wav";

   $filename = "speech." . md5($truncate) . "." . date("mdyhisA") . ".wav ";

	if (!file_exists($file)) {
     $command = "cd dectalk && say.exe -w " . $filename . "[:phoneme on]" . $tts;
     shell_exec($command);
	}
	
	if (file_exists($file)) {
	 playFile($file);
	}

function playFile($file){
	header('Content-Type: audio/x-wav');
	readfile($file);
}
?>
