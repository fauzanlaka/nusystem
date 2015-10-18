<?php 
	$view_access=false;
	$procedure_access=false;
	$connected = true;

	if(isset($_POST['install'])) 
	{
		$formstr = $_POST['formstr'];								
		$perfs = explode("&", $formstr);	
		$posted = array();		

		foreach($perfs as $perf) 
		{
			$perf_key_values = explode("=", $perf);
			$key = urldecode($perf_key_values[0]);
			$value = urldecode($perf_key_values[1]);	
			$posted[$key]=$value;			
		}
	

		if (!function_exists('mysqli_connect')) {
  			echo "Mysqli library has not been installed on your server . Please, ask service provider to install it \n";
		}  
		else
		{
			
			$link=@mysqli_connect($posted['txtHost'],$posted['txtUser'],$posted['txtPass'],$posted['txtDB']) or databaseerror();						
			@mysqli_close($link);
		}
		
		if($connected==true) // && $writeable==true
		{
		check_privilegies();

		if($view_access==false)
		{
			echo "You don't have access for creating views . Please, ask your service provider to give access for creating views \n";
		}

		if($procedure_access==false)
		{
			echo "You don't have access for creating stored procedures . Please, ask your service provider to give access for creating stored procedures \n";
		}
                
				
		if($view_access==true && $procedure_access == true)
		{
		$res = execute_database_scripts();
		
		setup_config_file($posted);

		echo "1";
		}

		}
		

		exit();
	}

function setup_config_file($posted)
{

	$file_content = file_get_contents("config_install.php");
	$file_content = str_replace("[mysql_host]", trim($posted['txtHost']), $file_content);
	$file_content = str_replace("[mysql_user]", trim($posted['txtUser']), $file_content);
	$file_content = str_replace("[mysql_pass]", trim($posted['txtPass']), $file_content);
	$file_content = str_replace("[mysql_db]", trim($posted['txtDB']), $file_content);


	@session_start();

	$_SESSION['fcontent']=$file_content;
	


}

function execute_database_scripts()
{
global $posted;
global $my_link;
$my_link = mysqli_connect($posted['txtHost'],$posted['txtUser'],$posted['txtPass'],$posted['txtDB']);

    runfile("tables_and_data.sql");
    runfilep("procedures.sql");

mysqli_close($my_link);
return true;
}

function databaseerror()
{
	global $connected;
	$connected = false;
	echo "Cannot connect to mysql database . \n";
	
}

function check_privilegies()
{
global $view_access,$procedure_access,$posted;
$link = @mysqli_connect($posted['txtHost'],$posted['txtUser'],$posted['txtPass'],$posted['txtDB']) ;

$results = mysqli_query($link,"SHOW PRIVILEGES");

while($row=mysqli_fetch_array($results))
{
	if($row['Privilege']=="Create view")
	{
		$view_access = true;
	}
	else if($row['Privilege']=="Create routine")
	{
		$procedure_access =true;
	}
}

@mysqli_close($link);
}

function runfile($file)
{
global $my_link;
$file_content = file($file);
$query = "";
foreach($file_content as $sql_line){
if(trim($sql_line) != "" && strpos($sql_line, "--") === false){
 $query .= $sql_line;
 if (substr(rtrim($query), -1) == ';'){
 //  echo $query;
   $result = mysqli_query($my_link,$query)or die(mysqli_error($my_link));
   $query = "";
  }
 }
}
}

function runfilep($file)
{
global $my_link;
	$file_content = file_get_contents($file);

	$queries = explode("$$", $file_content);
	foreach($queries as $query)
	{
		if(trim($query)=="") continue ;

		$pos = strpos($query,"DELIMITER");
		if($pos!== false) continue;
		//echo $query."<br><br><br>";
		$result = mysqli_query($my_link,$query)or die(mysqli_error($my_link));

	} 
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Quizzes and Surveys</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language ="javascript" src="../jquery.js"></script>
<script language ="javascript" src="../extgrid.js"></script>
<script src="cms.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../style/index.css" media="screen" />

<script language="javascript">
function install()
{

	document.getElementById('btnInstall').disabled="disabled";
	var str = $("form").serialize();	

	 $.post("install.php", { formstr : str , install : 1 },
         function(data){       
	    if(data!="1")
	    {     
            	alert(data);
	    	document.getElementById('btnInstall').disabled="";
	    }
	    else
	    {
		window.location.href="installed.php"; 
            }
        });
}
function ShowBackupMsg(inst_type)
{
    if(inst_type=="1")
    {
         document.getElementById('backupmsg').style.display="none";
    }
    else
        {
            document.getElementById('backupmsg').style.display="";
        }
}
</script>

</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <script language="javascript">

         window.onscroll = function()
         {
            MoveLoadingMessage("loadingDiv");
         }

         jQuery.ajaxSetup({
            beforeSend: function() {            
            $('#loadingDiv').show()
         },
            complete: function(){
            $('#loadingDiv').hide()
         },
            success: function() {}
         });
         
        </script>
        
              <table style="display:none" id="loadingDiv" style="position: absolute; left: 10px; top: 10px">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td bgcolor="red">
                                        <font color="white" size="3"><b>&nbsp;Please, wait&nbsp;</b></font>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
               </table>

	<script language="javascript">
            MoveLoadingMessage("loadingDiv");
        </script>


<div id="wrap" >


<div id="menu">
<ul>

</ul>
</div>

<?php 
$yes = "<font color=green>yes</font>";
$no = "<font color=green>no</font>";
$writable = false;
if (is_writable("config.php")) 
{
	$writable = true;
}

?>

<div id="content">
<div  align=center> <br /><br />
   <form method="post" >

	<table style="width:500px">
		<tr>
			<td colspan=2><font size=3>Installation</font><hr /><br /> </td>
		</tr>
		<tr style="display:none">
			<td>Config file writable : </td>
			<td><?php echo $writable == true ?  $yes :  $no ;?></td>
		</tr>
		<tr>
			<td align=right>MYSQL Host : </td>
			<td><input type=text name=txtHost id=txtHost /></td>
		</tr>
		<tr>
			<td align=right>MYSQL User : </td>
			<td><input type=text name=txtUser id=txtUser /></td>
		</tr>
		<tr>
			<td align=right>MYSQL Password : </td>
			<td><input type=text name=txtPass id=txtPass /></td>
		</tr>
		<tr>
			<td align=right>MYSQL Database : </td>
			<td><input type=text name=txtDB id=txtDB /></td>
		</tr>
                
<tr>
			<td colspan=2><br /><hr /><br /> </td>
		</tr>

		<tr><td colspan=2 align=center><input onclick="install()" type=button name=btnInstall id=btnInstall value="Install" style="width:150px"></td></tr>
	</table>

     </form>
</div>

<div class="left"> 



</div>

<div style="clear: both;"> </div>

</div>
<br />
<div id="bottom"> </div>
<div id="footer" align=center>
<font face=arial size=3>Developed by :<a target="_blank" href="http://phpexamscript.net">www.phpexamscript.net</a></font>
</div>

</div>
</br>
</br>
</br>
<hr />
<br />
<table border=0 align=center style="width:600px"><span align=center><tr><td>
	<font face=tahoma size=2 align=center >
		Say, [O believers], "We have believed in Allah and what has been revealed to us and what has been revealed to Abraham and Ishmael and Isaac and Jacob and the Descendants and what was given to Moses and Jesus and what was given to the prophets from their Lord. We make no distinction between any of them, and we are Muslims [in submission] to Him."
		(2:136)
	</font></span>
</td></tr></table>

</body>
</html>
