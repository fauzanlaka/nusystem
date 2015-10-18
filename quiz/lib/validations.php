<?php

class xyz103zyx {

    var $is_valid = true;
    var $_event;
    var $controls;
    var $modes;
    var $errmsgs;
    var $errors;
    var $c3ues;

    var $i = 0;

    public function xyz104zyx($event)
    {
        $this->_event = $event;
    }

    public function xyz105zyx($control_to_validate, $c3idation_mode, $errmsg, $c3ue_to_compare)
    {
        $this->values[$this->i] = $c3ue_to_compare;
        $this->controls[$this->i] = $control_to_validate;
        $this->modes[$this->i] = $c3idation_mode;
        $this->errmsgs[$this->i] = $errmsg;
        $this->i++;
    }

    public function xyz106zyx()
    {        
        if(isset($_POST[$this->_event]))
        {
            $this->is_valid = true;            
            for($i=0;$i<count($this->controls);$i++)
            {
                switch ($this->modes[$i])
                {
                    case "empty":                        
                        if(strlen(trim($_POST[$this->controls[$i]]))==0)
                        {
                           $this->errors[$this->controls[$i]] = $this->errmsgs[$i];
                           $this->is_valid = false;
                        }
                        break ;
                    case "numeric":
                        if(!is_numeric(trim($_POST[$this->controls[$i]])))
                        {
                            $this->errors[$this->controls[$i]] = $this->errmsgs[$i];
                            $this->is_valid = false;
                        }
                        break;
                    case "notequal":
                        if(trim($_POST[$this->controls[$i]])==$this->values[$i])
                        {
                            $this->errors[$this->controls[$i]] = $this->errmsgs[$i];
                            $this->is_valid = false;
                        }
                        break;

                }
            }
        }
    }

    public function xyz107zyx()
    {
        $this->xyz106zyx();
        return $this->is_valid;
    }

    public function xyz108zyx()
    {
        $text = "";        
        foreach($this->errors as $key=>$c3ue)
        {
            $text.=$c3ue."\n";
        }
        return $text;
    }

    public function xyz109zyx()
    {
        $js = "<script language=javascript>";
        $controls="";
        $modes="";
        $errmsgs="";
        $c3ues="";
        for($i=0;$i<count($this->controls);$i++)
        {
            $controls.=",'".$this->controls[$i]."'";
            $modes.=",'".$this->modes[$i]."'";
            $errmsgs.=",'".$this->errmsgs[$i]."'";
            $c3ues.=",'".$this->values[$i]."'";
        }
        $js.="var controls = new Array(".substr($controls,1).");";
        $js.="var modes = new Array(".substr($modes,1).");";
        $js.="var errmsgs = new Array(".substr($errmsgs,1).");";
        $js.="var values = new Array(".substr($c3ues,1).");";
        $js.="</script>";
        return $js;
    }

}
?>
