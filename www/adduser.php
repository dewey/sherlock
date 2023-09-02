<?php
	error_reporting(0);
	require_once "sekrit.php";

        function checkPresence($username){ 
		global $sqlserver, $sqluser, $sqlpw, $sqldb;
                $sqlconnection=mysqli_connect($sqlserver,$sqluser,$sqlpw);
                mysqli_select_db($sqlconnection,$sqldb);
                $sqlstr = "SELECT id from usernames WHERE username = '".mysqli_real_escape_string($sqlconnection,$username)."' LIMIT 1";
                $sqlquery=mysqli_query($sqlconnection, $sqlstr);
                if(mysqli_num_rows($sqlquery)==0){
                        return 0;
                }
                return 1;
        }

        function addUser($username, $userid){
		global $sqlserver, $sqluser, $sqlpw, $sqldb;
                $already = checkPresence($username);
                if ($already == 1) {
                        return false;
                }
                $sqlconnection=mysqli_connect($sqlserver,$sqluser,$sqlpw);
                mysqli_select_db($sqlconnection,$sqldb);
                $sqlstr = "INSERT into usernames (username, userid) values('".mysqli_real_escape_string($sqlconnection,$username)."', '".mysqli_real_escape_string($sqlconnection,$userid)."');";
                $sqlquery=mysqli_query($sqlconnection, $sqlstr);
                $newid = mysqli_insert_id($sqlconnection);
                return true;
        }

	if ($_GET["username"] && $_GET["userid"]) {
		$success = addUser($_GET["username"], $_GET["userid"]);
		if ($success) {
			echo 'Added!';
		} else {
			echo 'You\'re already added, dummy';
		}
	} else {
?>
	<form action="" method="get">
		What.CD username: <input type="text" name="username" /> <br />
		What.CD userid: <input type="text" name="userid" /> <br />
		<input type="submit" value="Add me!" />
	</form>

<?php
	}
?>


