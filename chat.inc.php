<?php

	 



	
	class SimpleChat {

	


	    	    var $sDbName;

	    var $sDbUser;

	    var $sDbPass;

 

	

	    function SimpleChat() {

	       
	        $this->sDbName = "myid";

	        $this->sDbUser = "root";

	        $this->sDbPass = "Pass0013";

	    }

	 
	    function acceptMessages() {
		


	        if ($_COOKIE['member_name']) {

	            if(isset($_POST['s_say']) && $_POST['s_message']) {

	                session_start();
			$sUsername = $_SESSION["firstname"];
			$userid = $_SESSION["user_id"];
			$frndid = $_SESSION["frnd_id"];
	 
	               
	                $vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass,$this->sDbName);


	               
	                mysqli_select_db($this->sDbName);

	 

	                $sMessage = mysqli_real_escape_string( $vLink,$_POST['s_message']);

	                if ($sMessage != '') {
				
	                    mysqli_query($vLink,"INSERT INTO `s_chat_messages` SET `user`='{$sUsername}',`user_id`='{$userid}', `frnd_id`='{$frndid}', `message`='{$sMessage}', `when`=UNIX_TIMESTAMP()");

	                }

	 

	                mysqli_close($vLink);

	            }

	        }

	 

	        ob_start();

	        require_once('chat_input.html');

	        $sShoutboxForm = ob_get_clean();

	 

	        return $sShoutboxForm;

	    }

	 

	    function getMessages() {

		session_start();
	        $vLink = mysqli_connect("localhost", $this->sDbUser, $this->sDbPass,$this->sDbName);
		
	 

	        
	        mysqli_select_db($this->sDbName);

	 

	        
	        $vRes = mysqli_query( $vLink,"SELECT * FROM `s_chat_messages` WHERE (user_id='{$_SESSION["user_id"]}' or user_id='{$_SESSION["frnd_id"]}') and (frnd_id = '{$_SESSION["frnd_id"]}' or frnd_id = '{$_SESSION["user_id"]}') ORDER BY `id` ASC LIMIT 15");

	 

	        $sMessages = '';

	 

	        
	        if ($vRes) {

	            while($aMessages = mysqli_fetch_array($vRes)) {

	                $sWhen = date("H:i:s", $aMessages['when']);

	                $sMessages .= '<div class="message">' . $aMessages['user'] . ': ' . $aMessages['message'] . '<span>(' . $sWhen . ')</span></div>';

	            }

	        } else {

	            $sMessages = 'DB error, create SQL table before';

	        }

	 

	        mysqli_close($vLink);

	 

	        ob_start();

	        require_once('chat_begin.html');

	        echo $sMessages;

	        require_once('chat_end.html');

	        return ob_get_clean();

	    }

	}

	 

	?>