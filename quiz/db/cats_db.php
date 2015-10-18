<?php

class xyz14zyx
{
    public static function xyz15zyx()
    {
        $y2 = "select * from cats";
        return $y2;
    }

    public static function xyz16zyx($id)
    {
        $y2 = "delete from cats where id=$id";        
        xyz39zyx::xyz49zyx($y2);
    }

     public static function xyz17zyx($name)
    {
        $name = xyz39zyx::xyz56zyx($name);
        $y2 = "insert into cats(cat_name) values('$name')";
        xyz39zyx::xyz49zyx($y2);
    }

      public static function xyz18zyx($name,$id)
    {
        $name = xyz39zyx::xyz56zyx($name);
        $id = xyz39zyx::xyz56zyx($id);
        $y2 = "update cats set cat_name='$name' where id='$id'";        
        xyz39zyx::xyz49zyx($y2);
    }
}

?>