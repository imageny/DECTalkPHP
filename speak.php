<?php
   $tts = 'Command error in q parameter.';
   
   if ($_GET['q']); {
	 $tts = $_GET['q'];
    };

	{
     $command = "say.exe -w tts.wav "."\"[:phoneme on]\" "."\"".$tts."\"";
     shell_exec("cd dectalk && ".$command);
     $file = "dectalk/tts.wav";
	 playFile($file);
	};

function playFile($file){
	header('Content-Type: audio/x-wav');
	readfile($file);
}