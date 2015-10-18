<?php

class xyz62zyx {

    public static function xyz63zyx($table, $b3,$where_clause,$order_by)
    {
        $b3_select ="";
        for($i=0;$i<count($b3);$i++)
        {
            $b3_select.=",".$b3[$i];
        }        

        if(count($b3)==0)
        {
            $b3_select="*";
        }
        else
        {
            $b3_select=substr($b3_select,1);
        }

        $where = "";
        foreach($where_clause as $key=>$c3ue)
        {
            $where.="AND $key='".$c3ue."'";
        }
        if(strlen($where)>0)
        {
            $where = " where ".substr($where , 3);
        }
        
        if($order_by!="")
        {
            $order_by = "order by $order_by";
        }

        $y2 = "select $b3_select from $table $where $order_by";
        return $y2;
    }

    public static function xyz64zyx($table, $b3,$where_clause,$order_by)
    {        
        $y2 = xyz62zyx::xyz63zyx($table, $b3,$where_clause,$order_by);        
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz65zyx($table,$b3)
    {
        $b3_str="";
        $c3ues_str="";
        foreach($b3 as $key=>$c3ue)
        {
            $b3_str.=",$key";
            $c3ues_str.=",'".xyz39zyx::xyz56zyx($c3ue)."'";
        }
        $b3_str=substr($b3_str,1);
        $c3ues_str=substr($c3ues_str,1);
        $y2 = "insert into $table ($b3_str) values($c3ues_str)";
        return $y2;
    }

    public static function xyz66zyx($table,$b3)
    {
        $y2 = xyz62zyx::xyz65zyx($table, $b3);
        xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz67zyx($table,$b3)
    {
        $where = "";
        foreach($b3 as $key=>$c3ue)
        {
            $where.="AND $key='".xyz39zyx::xyz56zyx($c3ue)."'";
        }
        $where = substr($where , 3);
        if($where!="")
        {
            $y2 = "delete from $table where $where";
            //xyz39zyx::xyz49zyx($y2);
        }
        return $y2;
    }

    public static function xyz68zyx($table,$b3)
    {
        $y2 = xyz62zyx::xyz67zyx($table, $b3);
        xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz69zyx($table,$b3,$where_clause)
    {

        $update_str = "";
        foreach($b3 as $key=>$c3ue)
        {
            $update_str .= ", $key='".xyz39zyx::xyz56zyx($c3ue)."'";
        }
        $update_str=substr($update_str,1);

        $where = "";
        foreach($where_clause as $key=>$c3ue)
        {
            $where.="AND $key='".xyz39zyx::xyz56zyx($c3ue)."'";
        }
        $where = substr($where , 3);
        if($where!="")
        {
            $y2 = "update $table set $update_str where $where";            
        }
        return $y2;
    }

    public static function xyz70zyx($table,$b3,$where_clause)
    {
        $y2 = xyz62zyx::xyz69zyx($table, $b3, $where_clause);
        xyz39zyx::xyz49zyx($y2);
    }

}
?>
