<?php

class xyz1zyx {
    
    public static function xyz2zyx($txtLogin,$txtPass,$txtPassImp,$check_pass=true)
    {
        $y1= "select m.*, u.UserID as user_id, u.user_type,u.password, 0 as imported from users u " .
                "left join roles_rights rr on rr.role_id = u.user_type " .
                "left join modules m on m.id= rr.module_id ".
                "where u.UserName='$txtLogin' ";
        if($check_pass==true) $y1.="and Password='$txtPass' ";
        $y1.=" union ";
        $y1.="select m.*, u.UserID as user_id, 2 as user_type,u.password, 1 as imported from v_imported_users u ".
                " left join roles_rights rr on rr.role_id = 2 ".
                " left join modules m on m.id= rr.module_id ".
                " where u.UserName='$txtLogin' ";
        if($check_pass==true) $y1.=" and u.Password='$txtPassImp' order by priority";
        //echo $y1;
        return xyz39zyx::xyz49zyx($y1);
    }

}
?>
