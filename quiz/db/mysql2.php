<?php

class xyz39zyx
{
    var $link;

    public function xyz40zyx()
    {
       $this->link=mysqli_connect(SQL_IP,SQL_USER,SQL_PWD,SQL_DATABASE) or die(xyz39zyx::xyz54zyx($this->link));
       mysqli_query($this->link,"SET @@SESSION.sql_mode = ''") or die(xyz39zyx::xyz54zyx($this->link));
    }

    public function xyz41zyx()
    {
        $y1 = "SET AUTOCOMMIT=0";
        mysqli_query($this->link,$y1) or die(xyz39zyx::xyz54zyx($this->link));
        $y1 = "BEGIN";
        mysqli_query($this->link,$y1) or die(xyz39zyx::xyz54zyx($this->link));

    }

    public function xyz42zyx($y1)
    {
        if(DEBUG_SQL=="yes") xyz19zyx::xyz20zyx ($y1);
		mysqli_query($this->link,"SET NAMES 'utf8'") ;
        $a1ults = mysqli_query($this->link,$y1) ;
        if(!$a1ults) throw new Exception(xyz39zyx::xyz55zyx($this->link,$y1));
        return $a1ults;
    }

    public function xyz43zyx($y1)
    {
        //echo $y1."<br>";
        if(DEBUG_SQL=="yes") xyz19zyx::xyz20zyx ($y1);
		mysqli_query($this->link,"SET NAMES 'utf8'") ;
        mysqli_query($this->link,$y1) ;        
        $a1ults = mysqli_insert_id($this->link);
        if(!$a1ults) throw new Exception(xyz39zyx::xyz55zyx($this->link,$y1));
        return $a1ults;
    }

    public function xyz44zyx($a1ult)
    {
        mysqli_free_result($a1ult);
    }

    public function xyz45zyx($y1)
    {
        if(DEBUG_SQL=="yes") xyz19zyx::xyz20zyx ($y1);
        $a1ults = mysqli_multi_query($y1,$this->link) ;
        if(!$a1ults) throw new Exception(xyz39zyx::xyz55zyx($this->link,$y1));
        return $a1ults;
    }

    public function xyz46zyx()
    {
        mysqli_query($this->link,"ROLLBACK");
    }

    public function xyz47zyx()
    {
        mysqli_query($this->link,"COMMIT");
    }

    public function xyz48zyx()
    {
        return mysqli_insert_id($this->link);
    }

    public static function xyz49zyx($y1)
    {
        //echo $y1."<br>";
        //exit;
	$link=mysqli_connect(SQL_IP, SQL_USER, SQL_PWD,SQL_DATABASE) or die(xyz39zyx::xyz54zyx($link));
	mysqli_query($link,"SET @@SESSION.sql_mode = ''") or die(xyz39zyx::xyz54zyx($link));
        if(DEBUG_SQL=="yes") xyz19zyx::xyz20zyx ($y1);
	mysqli_query($link,"SET NAMES 'utf8'") ;
	$a1ults=mysqli_query($link,$y1) or die(xyz39zyx::xyz55zyx($link,$y1));
	mysqli_close($link);
	return $a1ults;
    }

    public static function xyz50zyx($y1)
    {
	$link=mysqli_connect(SQL_IP, SQL_USER, SQL_PWD,SQL_DATABASE) or die(xyz39zyx::xyz54zyx($link));
	mysqli_query($link,"SET @@SESSION.sql_mode = ''") or die(xyz39zyx::xyz54zyx($link));
        if(DEBUG_SQL=="yes") xyz19zyx::xyz20zyx ($y1);
	mysqli_query($link,"SET NAMES 'utf8'") ;		
	mysqli_query($link,$y1) or die(xyz39zyx::xyz55zyx($link,$y1));
        $a1ults = mysqli_insert_id($link);
	mysqli_close($link);
	return $a1ults;
    }

    public static function xyz51zyx($y1)
    {
        $a1=array();
	$a1ults=xyz39zyx::xyz49zyx($y1);

	while($a3s=mysqli_fetch_array($a1ults))
	{
		$a1[]=$a3s;
	}
	return $a1;
    }

    public static function xyz51zyxByColumn($y1, $column)
    {
        $a1=array();
	$a1ults=xyz39zyx::xyz49zyx($y1);
        $i=0;
	while($a3s=mysqli_fetch_array($a1ults))
	{
		$a1[$i]=$a3s[$column];
                $i++;
	}
	return $a1;
    }

    public static function xyz53zyx($y1)
    {
	$link=mysqli_connect(SQL_IP, SQL_USER, SQL_PWD,SQL_DATABASE) or die(xyz39zyx::xyz54zyx($link));
        if(DEBUG_SQL=="yes") xyz19zyx::xyz20zyx ($y1);
	$a1ults=mysqli_multi_query($link,$y1) or die(xyz39zyx::xyz55zyx($link,$y1));
	mysqli_close($link);
	return $a1ults;
    }

    public static function xyz54zyx($lnk)
    {
        die (mysqli_error($lnk));
    }

    public static function xyz55zyx($lnk,$y1)
    {
        $msg=mysqli_error($lnk);
        if(DEBUG_SQL=="yes")
        {
            $msg.=" - ".$y1;
        }
        die ($msg);
    }
 

    public static function xyz56zyx($str)
    {
        if(!get_magic_quotes_gpc())
		{
			$str = addslashes($str);
		}
		return $str;
    }

    public static function xyz57zyx($a1ults)
    {
       $a3=mysqli_fetch_array($a1ults);
       return $a3;
    }

    public static function xyz58zyx($a1ults)
    {
        return mysqli_num_fields($a1ults);
    }

     public static function xyz59zyx($a1ults)
    {
        return mysqli_num_rows($a1ults);
    }

    public static function xyz60zyx($str)
    {
        if(!get_magic_quotes_gpc())
		{
			$str = addslashes($str);
		}
		return $str;
    }

    public function xyz61zyx()
    {
       mysqli_close($this->link);
    }
}


?>