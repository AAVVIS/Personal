<?php



	
	require_once('inc/chat.inc.php');

	 

	
	


	 

	$oSimpleChat = new SimpleChat();

	 

	
	


	 $sChatResult = $oSimpleChat->acceptMessages();

	
	
	echo $sChatResult;

	 

	?>