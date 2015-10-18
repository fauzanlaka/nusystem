<?php


class xyz71zyx {


    public static function xyz72zyx($quiz_id)
    {
        $y2 = "select q.*, qt.question_type from questions q left join question_types qt on q.question_type_id=qt.id where quiz_id=$quiz_id order by priority";
        return $y2;
    }

    public static function xyz73zyx($priority,$asg_id,$user_id)
    {
        $y2 = "select qs.* , qg.group_name, ".
        "ifnull((select priority from questions qs2 where qs2.priority>qs.priority and qs2.quiz_id=q.id order by priority limit 0,1),-1) next_priority,".
        "(select priority from questions qs3 where qs3.priority<qs.priority and qs3.quiz_id=q.id order by priority desc limit 0,1) prev_priority".
        " from questions qs ".
        " left join quizzes q on q.id=qs.quiz_id ".
        " left join assignments asg on asg.quiz_id=q.id ".
        " inner join assignment_users au on au.assignment_id=asg.id and au.user_id=$user_id ".
        " left join question_groups qg on qg.question_id=qs.id ".
        " where asg.id=$asg_id ".
        " and qs.priority=$priority ";        
        return $y2;
    }

    public static function xyz74zyx($user_quiz_id)
    {
        $y2 = "select qs.* , qg.group_name, ".
        "ifnull((select priority from questions qs2 where qs2.priority>qs.priority and qs2.quiz_id=q.id order by priority limit 0,1),-1) next_priority,".
        "(select priority from questions qs3 where qs3.priority<qs.priority and qs3.quiz_id=q.id order by priority desc limit 0,1) prev_priority".
        " from questions qs ".
        " inner join quizzes q on q.id=qs.quiz_id ".
        " inner join assignments asg on asg.quiz_id=q.id ".
        " left join question_groups qg on qg.question_id=qs.id ".
        " inner join user_quizzes uq on uq.assignment_id=asg.id ".
        " where uq.id=$user_quiz_id order by priority ";
        //echo $y2;
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz75zyx($direction,$question_id)
    {
        $y2 = "CALL move_question(\"$direction\", $question_id);";
        xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz76zyx($question_id)
    {
        $y2 = "delete from answers where group_id in (select id from question_groups where question_id=$question_id)";
        return $y2;
    }

    public static function xyz77zyx($question_id)
    {
        $y2 = "select a.id as a_id,a.*,qg.* from answers a ".
        " left join question_groups qg on a.group_id=qg.id ".
        " where qg.question_id = $question_id ";
        //echo $y2;
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz77zyx2($question_id,$user_quiz_id)
    {
        $y2 = "select a.id as a_id,a.*,qg.*,ua.user_answer_id,ua.user_answer_text from answers a ".
        " left join question_groups qg on a.group_id=qg.id ".
        " left join user_answers ua on ua.answer_id=a.id and ua.user_quiz_id=".$user_quiz_id.
        " where qg.question_id = $question_id ";
        //echo $y2;
        return xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz79zyx($asg_id)
    {
        $y2 = "select q.* from assignments a left join questions q on q.quiz_id=a.quiz_id where a.id=".$asg_id." order by priority";
        return $y2;
    }

    public static function xyz80zyx($question_id)
    {
        $y2 = "delete from question_groups where question_id=$question_id";
        return $y2;
    }

    public static function xyz81zyx($question_id)
    {
        //$y2 = "delete from answers where group_id in (select id from question_groups where question_id=$question_id) ;";
        //$y2.= " delete from question_groups where question_id=$question_id ;";
        $y2=" delete from questions where id=$question_id";
        
        xyz39zyx::xyz49zyx($y2);
    }

    public static function xyz82zyx($quiz_id,$question_id)
    {
        $y2 = "update questions ,(select ifnull(max(priority)+1,1) as priority from questions where quiz_id=$quiz_id) questions2 set questions.priority = questions2.priority where questions.id=$question_id";
        return $y2 ; 
    }

}
?>
