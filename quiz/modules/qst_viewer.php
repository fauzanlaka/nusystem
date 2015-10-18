<?php


    class qst_viewer
    {
        var $b1 = "";
        var $show_next = true;
        var $show_prev = true;
        var $page_name = "";
        var $show_finish = false;
        var $show_correct_answers = false;

        var $read_only_text = "";

        var $user_quiz_id=-1;
        var $control_unq;

        public function qst_viewer($page)
        {
            $this->page_name = $page;
        }

        private function BuildButtons($template,$a3)
        {
            $buttons_html = "<tr><td>";
            if($this->show_prev==true)
            {
                $prev_js = "javascript:PrevQst('".$this->page_name."',$a3[question_type_id],$a3[prev_priority])";
                $buttons_html .= "<input type=button onclick=".$prev_js." style='width:110px' value='< Previous'>&nbsp;";
            }
            if($this->show_next==true)
            {
                $next_js = "javascript:NextQst('".$this->page_name."',$a3[question_type_id],$a3[next_priority],$a3[id],0)";
                $buttons_html .= "<input type=button onclick=".$next_js." style='width:110px' value='Next >'>";
            }
            if($this->show_finish==true)
            {
                $finish_js = "javascript:NextQst('".$this->page_name."',$a3[question_type_id],$a3[next_priority],$a3[id],1)";
                $buttons_html .="<input onclick=".$finish_js." type=button style='width:110px' value='Finish'>";
            }
            $buttons_html .= "</td></tr>";
            $template = str_replace("[buttons]", $buttons_html, $template);
            return $template;
        }

        public function BuildQuestion($a3)
        {         
            if($this->user_quiz_id>-1)
            {
                $ans_results = xyz71zyx::xyz77zyx2($a3['id'],$this->user_quiz_id);
            }
            else
            {
                $ans_results = xyz71zyx::xyz77zyx($a3['id']);
            }

            $template = qst_viewer::ReadTemplate();
            $template = str_replace("[question_text]", $a3['question_text'], $template);
            $template = str_replace("[footer_text]", $a3['footer_text'], $template);
            $template = str_replace("[header_text]", $a3['header_text'], $template);
            $template = str_replace("[group_name]", $a3['group_name'], $template);

            $answers_html = $this->BuildAnswers($ans_results, $a3['question_type_id']);
            $template = str_replace("[answers]", $answers_html, $template);
            $template = $this->BuildButtons($template,$a3);

            $hiddens = "<input type=hidden name=hdnPriority id=hdnPriority value=".$a3['priority']."><input type=hidden name=hdnNextPriority id=hdnNextPriority value=".$a3['next_priority'].">";
            $template = str_replace("[hiddens]", $hiddens, $template);

            $this->html =  $template;

            return $a3;

        }
        
        public function BuildQuestionWithQuery($y1)
        {
             $a3s = xyz39zyx::xyz49zyx($y1);
             $a3=xyz39zyx::xyz57zyx($a3s);
             $this->BuildQuestion($a3);
        }

        public function BuildQuestionWithResultset($a1ultset)
        {
            $this->BuildQuestion($a1ultset);
        }

        public function BuildAnswers($ans_results,$question_type)
        {
             $answers_html="";
             $tabs = "&nbsp;&nbsp;&nbsp;";
             while($a3=xyz39zyx::xyz57zyx($ans_results))
             {
                  $control_unq = $this->control_unq;  
                  $correct_answer = "";
                  $answers_val="";
                  switch($question_type) {
                  case 0:                      
                      if($this->show_correct_answers==true && $a3['correct_answer']=="1") $correct_answer = "<font color=red>$tabs (correct answer)</font>";
                      if($this->user_quiz_id>-1 && $a3['user_answer_id']!="") $answers_val = "checked";
                      $answers_html.= "<tr><td ><input ".$answers_val." type=checkbox id=chkAns ".$this->read_only_text." name=chkAns value='".$a3['a_id']."'></td><td style=\"width:80%\" class=desc_text_bg>".$a3['answer_text']."$correct_answer</td></tr>";
                  break;
                  case 1:
                      if($this->show_correct_answers==true && $a3['correct_answer']=="1") $correct_answer = "<font color=red>$tabs (correct answer)</font>";
                      if($this->user_quiz_id>-1 && $a3['user_answer_id']!="") $answers_val = "checked";
                      $answers_html.=  "<tr><td><input ".$answers_val." type=radio id=rdAns$control_unq ".$this->read_only_text." name=rdAns$control_unq value='".$a3['a_id']."'></td><td style=\"width:80%\" class=desc_text_bg>".$a3['answer_text']."$correct_answer</td></tr>";
                  break;
                  case 3:
                      if($this->show_correct_answers==true) $correct_answer = "<br><font color=red>correct answer : ".$a3['correct_answer_text']."</font>";
                      if($this->user_quiz_id>-1 && $a3['user_answer_text']!="") $answers_val = $a3['user_answer_text'];
                      $answers_html.=  "<tr><td class=desc_text_bg><textarea style='width:350px;height:100px' id=txtFree ".$this->read_only_text." name=txtFree value='".$a3['a_id']."'>".$answers_val."</textarea>$correct_answer".
                                       "<input type=hidden name=txtFreeId id=txtFreeId value='".$a3['a_id']."'></td></tr>";
                  break;
                  case 4:
                      if($this->show_correct_answers==true) $correct_answer = "$tabs<font color=red>correct answer : ".$a3['correct_answer_text']."</font>";
                      if($this->user_quiz_id>-1 && $a3['user_answer_text']!="") $answers_val = $a3['user_answer_text'];
                      $answers_html.=  "<tr><td class=desc_text_bg>".$a3['answer_text']."</td><td class=desc_text_bg><input type=text onkeypress='return onlyNumbers();' id=txtMultiAns ".$this->read_only_text." name=txtMultiAns value='".$answers_val."' >".
                                       "<input type=hidden id=txtMultiAnsId name=txtMultiAnsId value='".$a3['a_id']."' >$correct_answer</td></tr>";
                  break;
                        }
             }
             return $answers_html;
        }


        public static function ReadTemplate()
        {
            $file = file_get_contents('tmps/question_template.xml', true);
            return $file;
        }

        public function SetReadOnly()
        {
            $this->read_only_text="disabled";
        }

        public function GetPriority()
         {
             $priority = 1;
             if(isset($_POST['hdnPriority']))
             {
                 $priority = intval($_POST['hdnPriority']);
             }
             return $priority;
         }

        public function GetNextPriority()
         {
             $priority = 1;
             if(isset($_POST['next_priority']))
             {
                 $priority = $_POST['next_priority'];
             }
             return $priority;
         }

         public function GetPrevPriority()
         {
             $priority = 1;
             if(isset($_POST['prev_priority']))
             {
                 $priority = $_POST['prev_priority'];
             }
             return $priority;
         }
        
    }

?>
