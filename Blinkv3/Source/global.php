<?php
include("Language/english.php");

session_start();
date_default_timezone_set("Europe/Zagreb");
/*
$host="mysql.hostinger.hr";
$username="u352129894_blink";
$password="Hitman14";
$database="u352129894_blink";
$DBCON = mysqli_connect($host, $username, $password, $database)or die("cannot connect"); 

*/
$host="localhost";
$username="root";
$password="usbw";
$database="blink";

$DBCON = mysqli_connect($host, $username, $password, $database)or die("cannot connect"); 

$websiteName = "Blink v3";


 
if(isset($_SESSION['username']))
	$_SESSION['userLevel']=checkUserLevel();  
else
	$_SESSION['userLevel']=5; //not-logged-in.. 4 = banned


function checkUserLevel()
{
	global $DBCON;
	$qry=mysqli_query($DBCON,"SELECT * FROM user WHERE username='".$_SESSION['username']."'");
	$userLevel=mysqli_fetch_array($qry);
	return $userLevel['usertype'];
}

function indexRedirect()
{
	?>
    <meta http-equiv="refresh" content="3; URL=/index/">
	<?php
}

function underConstruction()
{?>
<div id="body">
	<div id="loginForm">
    
                <table class="loginTable">
                <tbody class="loginTable" >
                	<form method="post">
                    <tr>
                		<td class="loginHeader" colspan="3">!  U izradi  !</td>
                	</tr>
                    <tr>
                    <td class="loginSpacer"></td>
                    </tr>
                    <tr>
                    	<td class="loginSuccess">Stranica u izradi!</td>
                    </tr>
                    <tr>
                    <td class="loginSpacer"></td>
                    </tr>
                    <tr>
                		<td class="loginFooter" colspan="3"></td>
                	</tr>
                </form>
                </tbody>
                </table>
                
	</div>
</div>
<?php
}

function notLoggedIn()
{
?>

<div id="body">
  <div id="loginForm">

    <table class="loginTable">
      <tbody class="loginTable" >
        <form method="post">
          <tr>
            <td class="loginHeader" colspan="3">
              <?php echo lang('l_error')?>!</td>
          </tr>
          <tr>
            <td class="loginSpacer"></td>
          </tr>
          <tr>
            <td class="loginSuccess">
              <?php echo lang('l_mustLogin')?>.
            </td>
          </tr>
          <tr>
            <td class="loginSpacer"></td>
          </tr>
          <tr>
            <td class="loginFooter" colspan="3"></td>
          </tr>
        </form>
      </tbody>
    </table>

  </div>
</div>

<?php
 }
 
 
function getUserType($userType)
{
	switch ($userType)
	{
	case 1:
		$userType="Administrator";
		break;
	case 2:
		$userType="Moderator";
		break;
	case 3:
		$userType="Obični korisnik";
		break;
	case 4:
		$userType="Banned";
		break;
	default:
		$userType="";
		break;
	}
	
	return $userType;
}
?>