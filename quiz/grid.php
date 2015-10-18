<?php
    
    class grid
    {
        var $id_column = "id";
        var $page_name = "";
        var $grid_control_name ="div_grid";

        var $table = "<table border=1 class=tblGrid>";
        var $edit = true;
        var $edit_attr="";        
        var $delete = true;
        var $edit_text = "Edit";
        var $edit_link ="";
        var $delete_text = "Delete";
        var $checkbox = false;

        var $add_links = false;
        var $links ;
        var $id_links ;
        var $id_link_key="id";
        var $id_link_checks;
        var $commands;

        var $process_id = 0;

        var $message = 'Are you sure ?';

        var $_columns ;
        var $_headers;
        var $identity = "";
        var $z1_ids=array();

        var $process_command_override = "";
        var $edit_attr_override = "";
        var $edit_link_override = "";
        var $process_html_command="";
        var $empty_data_text="No records found";


        public function SetEdit($c3ue)
        {
            $edit = $c3ue;
        }

        public function SetDelete($c3ue)
        {
            $delete = $c3ue;
        }

        public function grid($headers, $b3, $page)
        {
            $this->_columns = $b3;
            $this->_headers = $headers;
            $this->page_name= $page;
            $this->table.="<tr class=c_list_head>";
            foreach($headers as $header)
            {
                $this->table.="<td>&nbsp;".$header."</td>";
            }
            $this->table.="</tr>";
        }

        public function DrowTable($y1)
        {            
          //  xyz39zyx::xyz40zyx();
            $a3s = xyz39zyx::xyz49zyx($y1);
            $found = false;
            //$r_count=xyz39zyx::xyz58zyx($a3s);
            while($a3=xyz39zyx::xyz57zyx($a3s))
            {                
                $this->table.="<tr class=c_list_item>";
                $this->AddCheckbox($a3);
                foreach($this->_columns as $key=>$c3ue)
                {
                    $this->table.="<td>&nbsp;".trim(strip_tags($this->FormatColumn($c3ue,$a3[$key])))."&nbsp;</td>";
                }
                $this->AddLinks();
                $this->AddIdLinks($a3);
                $this->ProcessCommands($a3);
                $this->ProcessHTML($a3);
                $this->ProcessEdit($a3);
                $this->ProcessDelete($a3);
               $this->table.="</tr>";
               $found = true;
            }

            if(!$found)
            {
                $this->table.="<tr><td class=empty_data colspan=".count($this->_headers).">&nbsp;".$this->empty_data_text."</td></tr>";
            }

            $this->table.="</table>";
            $this->DrowJs();
          //  xyz39zyx::xyz61zyx();

        }

        private function FormatColumn($format , $a1ults)
        {
            if($format=="short date")
            {                
                $a1ults = date('F d, Y ', strtotime($a1ults));
            }
            return $a1ults;
        }

        public function IsClickedBtnDelete()
        {
            if(isset($_POST["hdnEventMode"]) && $_POST["hdnEventMode"]=="delete")
            {
                $this->process_id=intval($_POST["hdnEventArgs"]);
                return true;
            }
            return false;
        }

        public function IsClickedBtnEdit()
        {
            if(isset($_POST["hdnEventMode"]) && $_POST["hdnEventMode"]=="edit")
            {
                $this->process_id=intval($_POST["hdnEventArgs"]);
                return true;
            }
            return false;
        }

        public function IsClickedBtn($btn)
        {
            if(isset($_POST["hdnEventMode"]) && $_POST["hdnEventMode"]==$btn)
            {
                $this->process_id=intval($_POST["hdnEventArgs"]);
                return true;
            }
            return false;
        }

        public function DrowJs()
        {
            $this->table.="<input type=hidden id=hdnEventArgs /><input type=hidden id=hdnEventMode />";
        }

        private function ProcessEdit($a3)
        {
            if(!$this->edit) return ;

            $edit_attr= $this->edit_attr;
            $edit_attr_override = $this->edit_attr_override;
            $edit_link_override = $this->edit_link_override;

            if($edit_attr_override!="")
            {
                $edit_attr=$edit_attr_override($a3);
            }

            $edit_link = "<a $edit_attr href='".$this->edit_link."&id=".$a3[$this->id_column]."'>$this->edit_text</a>";

            if($edit_link_override!="")
            {                 
                $edit_link=$edit_link_override($a3);
            }            

            $this->table.="<td>&nbsp;$edit_link</td>";

        }

        public static function EditCommandTemplate($a3,$z2)
        {
            $b1 = "&nbsp;<a href='".$z2->edit_link."&id=".$a3[$z2->id_column]."'>$z2->edit_text</a>";
            return $b1;
        }

        private function ProcessDelete($a3)
        {
            if(!$this->delete) return ;

            $id = $this->id_column;
            $this->table.="<td>&nbsp;<a href='javascript:jsProcessDelete(\"$this->message\",$a3[$id], \"$this->page_name\", \"$this->grid_control_name\" )'>$this->delete_text</a></td>";

        }

        public static function ProcessCommandTemplate($a3,$c3ue,$key,$z2)
        {
            $b1 = "<td>&nbsp;<a href='javascript:jsProcessCommand(".$a3[$z2->id_column].", \"$z2->page_name\", \"$z2->grid_control_name\", \"$c3ue\" )'>$key</a></td>";
            return $b1;
        }

        private function ProcessHTML($a3)
        {
            if($this->process_html_command=="") return ;

            $process_html_command = $this->process_html_command;
            $this->table.=$process_html_command($a3);

        }
      
        private function ProcessCommands($a3)
        {
            if(count($this->commands)==0) return ;

            $process_command_override = $this->process_command_override;
            //$process_command_override();

            $id = $this->id_column;
            foreach($this->commands as $key=>$c3ue)
            {
                 if($process_command_override!="")
                 {
                     $this->table.=$process_command_override($a3);
                 }
                 else
                 {
                     $this->table.="<td><a href='javascript:jsProcessCommand($a3[$id], \"$this->page_name\", \"$this->grid_control_name\", \"$c3ue\" )'>$key</a></td>";
                 }
            }
        }

        private function AddCheckbox($a3)
        {
            if(!$this->checkbox) return ;

            $checked = "";
            if(in_array($a3[$this->id_column], $this->selected_ids, true))
            {
                $checked="checked";
            }

            $identity =$this->identity;
            $this->table.="<td><input $checked type=checkbox name=chkgrd".$identity."[] value=".$a3[$this->id_column]." /></td>";
        }
        
        private function AddLinks()
        {
            if(count($this->links)==0) return ;

            foreach($this->links as $key=>$c3ue)
            {
                 $this->table.="<td>&nbsp;<a href='$c3ue'>$key</a></td>";
            }
        }

        private function AddIdLinks($a3)
        {
            if(count($this->id_links)==0) return ;
            if($a3[$this->id_column]=="")
            {
                    $this->table.="<td>&nbsp;</td>";
                    return;
            }

            foreach($this->id_links as $key=>$c3ue)
            {
                 $this->table.="<td>&nbsp;<a href='$c3ue&".$this->id_link_key."=".$a3[$this->id_column]."'>$key</a></td>";
            }
        }

    }

?>