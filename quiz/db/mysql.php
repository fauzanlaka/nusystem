<?

class xyz22zyx
{

    var $link;


    function xyz23zyx($y2ip,$y2user,$y2password)
    {
       return $this->link=mysql_connect($y2ip,$y2user,$y2password) or die($this->xyz38zyx());
    }

	function xyz23zyx_()
    {
       return $this->link=mysql_connect(SQL_IP,SQL_USER,SQL_PWD) or die($this->xyz38zyx());
    }

	function xyz25zyx($y2ip,$y2user,$y2password)
    {
       return $this->link=mysql_pconnect($y2ip,$y2user,$y2password) or die($this->xyz38zyx());
    }

	function xyz25zyx_()
    {
       return $this->link=mysql_connect(SQL_IP,SQL_USER,SQL_PWD) or die($this->xyz38zyx());
    }
    
    function xyz27zyx($y2database)
    {
       return mysql_select_db($y2database, $this->link) or die($this->xyz38zyx());
    }

    function xyz27zyx_()
    {
       return mysql_select_db(SQL_DATABASE, $this->link) or die($this->xyz38zyx());
    }
    
    function xyz29zyx($y1)
    {	   	   	
       $a1ults=mysql_query($y1, $this->link) or die($this->xyz38zyx());
       return $a1ults;
    }

	function xyz30zyx($y1)
	{
		$link=mysql_connect(SQL_IP, SQL_USER, SQL_PWD) or die($this->xyz38zyx());
		mysql_select_db(SQL_DATABASE, $link);
		$a1ults=mysql_query($y1,$link) or die($this->xyz38zyx());
		mysql_close($link);
		return $a1ults;		
	}
 
    function xyz31zyx($a1ults)
    {
       return mysql_num_rows($a1ults);
    }
    
    function xyz32zyx($a1ults)
    {
       $a3=mysql_fetch_array($a1ults);
       return $a3;
    }

	function xyz33zyx($y1)
	{
		$a1ults=mysql_query($y1, $this->link) or die($this->xyz38zyx());

		while($a3s=mysql_fetch_array($a1ults))
		{
			$a1[]=$a3s;
		}

		return $a1;
	}

	function xyz33zyx2($y1,$lang)
	{
		$a1ults=mysql_query($y1, $this->link) or die($this->xyz38zyx());

		while($a3s=mysql_fetch_array($a1ults))
		{
			$a1[$a3s['keym']]=$a3s[$lang];
		}

		return $a1;
	}

	function xyz35zyx($y2, $from)
    {
		if(PAGE_SIZE!=-1)
		{
			$count=PAGE_SIZE;
		    $y2.=" LIMIT $from, $count ";
		}
        return $this->xyz29zyx($y2);
    }

	function xyz36zyx()
	{
		return mysql_insert_id($this->link);
	}
    
    function xyz37zyx()
    {
       mysql_close($this->link);
    }
    
    function xyz38zyx()
    {
       die(mysql_error());
    }

}

?>
