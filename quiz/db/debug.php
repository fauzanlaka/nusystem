<?php 
class xyz19zyx
{
    public static function xyz20zyx($y2)
    {
        $file = basename($_SERVER["SCRIPT_NAME"]);
        if($file=="login.php") return;

        if(!isset($_SESSION['sql']))
        {
            $_SESSION['sql'] = array();
            $_SESSION['sql_i'] = 0;
        }

        $queries = $_SESSION['sql'];
        $i = intval($_SESSION['sql_i']);

        $queries[$i] = $y2;
        $i++ ;

        $_SESSION['sql']= $queries;
        $_SESSION['sql_i'] = $i;
    }
    
    public static function xyz21zyx()
    {
        if(!isset($_SESSION['sql']))
        {
            $_SESSION['sql'] = array();
            $_SESSION['sql_i'] = 0;
        }
        $queries = $_SESSION['sql'];
        //$_SESSION['sql'] = array();
        //$_SESSION['sql_i'] =0;
        return $queries;
    }
}
?>