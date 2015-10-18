<?php

class xyz3zyx
{
    public static function xyz4zyx()
    {
        $y2 = "select asg.*, q.quiz_name from assignments asg left join quizzes q on q.id=asg.quiz_id order by asg.added_date desc";
        return $y2;
    }

    public static function xyz4zyxById($id)
    {
        $y2 = "select * from assignments asg left join quizzes q on q.id=asg.quiz_id where asg.id=$id";
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz6zyx($id)
    {
        //$y2 = "delete from assignment_users where assignment_id=$id ;";
        //$y2 = "delete from quizzes where parent_id<>0 and id in (select quiz_id from assignments where id=$id) ;";
        $y2 = " delete from assignments where id=$id";
        xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz7zyx($stat,$id)
    {
        $y2 = "update assignments set status=$stat where id=$id";
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz8zyx($user_id)
    {
        $y2="select a.id as asg_id,a.*,".
	" q.* ,ifnull(ua.status,0) as user_quiz_status ".
        " from assignments a ".
        " left join quizzes q on a.quiz_id = q.id ".
        " left join user_quizzes ua on ua.assignment_id =a.id and ua.user_id=".$user_id.
        " where a.status = 1 and a.id in  (".
        " select assignment_id from assignment_users where user_id = ".$user_id.
        ") order by a.added_date desc";
       // echo $y2;
        return $y2;
    }

    public static function xyz9zyx($user_id, $asg_id)
    {
        $y2="select a.id as asg_id,a.*,".
	" q.* ,ifnull(ua.status,0) as user_quiz_status , ua.id as user_quiz_id ,ua.added_date as uq_added_date".
        " from assignments a ".
        " left join quizzes q on a.quiz_id = q.id ".
        " left join user_quizzes ua on ua.assignment_id =a.id and ua.user_id=".$user_id.
        " where a.status = 1 and  a.id in  (".
        " select assignment_id from assignment_users where user_id = ".$user_id.
        ") and a.id=".$asg_id." order by a.added_date desc";
        //echo $y2;
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz10zyx($user_id,$mode)
    {
        $y2 ="select uq.*,q.quiz_name,asg.quiz_type,asg.results_mode,asg.show_results ,".
        " (case show_results when 1 then asg.pass_score  else '' end) pass_score,".
        " (CASE show_results when 0 then 'Not enabled' ELSE (case success when 1 then 'Yes' else 'No' end) end) is_success ,".
        " (CASE show_results when 1 then (case results_mode when 1 THEN pass_score_point else pass_score_perc end) else '' end) total_point".
        " from user_quizzes uq left join assignments asg on asg.id=uq.assignment_id ".
        " left join quizzes q on q.id=asg.quiz_id ".
        " where asg.quiz_type=$mode and uq.user_id=$user_id order by uq.added_date desc";
        return $y2;
        //return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz11zyx($asg_id)
    {
        $y2="select c.cat_name, q.quiz_name,a.*".
        " from assignments a ".
        " left join quizzes q on a.quiz_id=q.id ".
        " left join cats c on c.id=q.cat_id ".
        " where a.id=$asg_id ";        
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz12zyx($asg_id,$user_type)
    {
      $table_name = "users";
      if($user_type=="2") $table_name="v_imported_users";
      
      $y2 = "select asg.id,u.user_id,Name,".
                "Surname, ".
                "UserName, ".
                "ifnull(ua.status,0) as status_id, ".
                "(case ifnull(ua.status,0) ".
                "when 0 then 'Not started' when 1 then 'Started' when 2 then 'Finished' ".
                "when 3 then 'Time ended' when 4 then 'Manually stopped' ".
                "    end ) as status_name, ".
                "ua.pass_score_point, ".
                "ua.pass_score_perc, ".
                "(CASE show_results when 2 then 'Not enabled' ELSE (case success when 1 then 'Yes' else 'No' end) end) is_success, ".
                "(CASE show_results when 1 then (case results_mode when 1 THEN pass_score_point else pass_score_perc end) else '' end) total_point, ".
                "ua.id as user_quiz_id ".
            "from assignment_users u	 ".
            "left join $table_name lu on lu.UserID = u.user_id ".
            "left join user_quizzes ua on ua.user_id = lu.UserID and ua.assignment_id = u.assignment_id ".
            "left join assignments asg on asg.id=u.assignment_id ".
            "where u.assignment_id=$asg_id and u.user_type=$user_type  " ;
      
        return $y2;
    }

     public static function xyz13zyx($user_quiz_id,$status)
     {
        $quiz_res = xyz39zyx::xyz49zyx("CALL p_quiz_results(\"$user_quiz_id\");");
        $a3 = xyz39zyx::xyz57zyx($quiz_res);


        $y1 = xyz62zyx::xyz69zyx("user_quizzes",
                                          array("success"=>$a3['quiz_success'],
                                                "status"=>$status,
                                                "finish_date"=>xyz96zyx::xyz97zyx(),
                                                "pass_score_point"=>$a3['total_point'],
                                                "pass_score_perc"=>$a3['total_perc'],
                                                ),
                                          array("id"=>$user_quiz_id));
        xyz39zyx::xyz49zyx($y1);

        return $a3;
    }

}
?>
