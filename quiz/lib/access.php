<?php
class xyz94zyx
{
    public static function xyz95zyx($user_type)
    {
        if($user_type!=$_SESSION['user_type'])
        {
            header("location:login.php");
			exit();
        }
    }
}
?>
