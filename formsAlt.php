<?php
  class BtrpsForm
  {
    private $fields = [];
    private $submitText = "Send";
    private static $k = 0;
    public function __construct($sText = "Send") {
      $this->submitText = $sText;
    }
    public function addField($name, $label, $type = "text", $val = NULL, $placeholder = NULL, $required = false, $autocomplete = true)
    {
      $this->fields[] = (object) ['name' => $name, 'label' => $label, 'type' => $type, 'val' => $val, 'placeholder' => $placeholder, 'required' => $required, 'autocomplete' => $autocomplete];
      return true;
    }
    public function __toString()
    {
      $r = '<form method="POST" role="form">';
      foreach($this->fields as $k => $v)
      {
        $n = $v->name;
        $l = $v->label;
        $t = $v->type;  
        $val = $v->val;
        $p = $v->placeholder;
        $req = $v->required;
        $autocomplete = $v->autocomplete;
        $r.= '
          <div class="form-group row">
            <label for="input' . self::$k . '" class="control-label col-2"' . (in_array($t, ["radio", "select"]) ? NULL : ' style="cursor: pointer"') . '>' . $l . '</label>';
        if(in_array($t, ["radio", "select"]))
        {
          if(!is_array($val))
            die("Error: Values in radio or select control must be array!");
          if($t=="radio")
          {
            $isFirst = true;
            foreach($val as $k2 => $v2)
            {
              if($isFirst)
              {
                $r.= '
                  <div class="radio col-10"><label><input type="radio" name="' . $n . '" value="' . $k2 . '" checked> ' . $v2 . '</label></div><div>';
                $isFirst = false;
              } else
              {
                $r.= '
                  <div class="radio offset-2 col-10"><label><input type="radio" name="' . $n . '" value="' . $k2 . '"> ' . $v2 . '</label></div></div>';
                if($k==count((array) $this->fields)-1)
                {
                   $r.= '
                <div class="form-group row">
                  <div class="col-xs-12 offset-2 col-10">
                    <input type="submit" value="' . $this->submitText . '" class="btn btn-secondary">
                  </div>
                </div>';
                };
              };
            };
          } else
          {
            $r.= '<select name="' . $n . '" class="form-control">';
            foreach($val as $k2 => $v2)
            {
              $r.= '
                <option value="' . $k2 . '">' . $v2 . '</option>
              ';
            };
            $r.= "</select></div>";
            if($k==count((array) $this->fields)-1)
            {
              $r.= '</div>
                <div class="form-group row">
                  <div class="col-xs-12 offset-2 col-10">
                    <input type="submit" value="' . $this->submitText . '" class="btn btn-secondary">
                  </div>
                </div>';
            }
          };
        } else
        {
          $r.= '
            <input type="' . $t . '" name="' . $n . '" value="' . $val . '" placeholder="' . $p . '" autocomplete="' . ($autocomplete ? "on" : "off") . '" class="form-control col-10" id="input' . self::$k . '"' . (self::$k==0 ? ' autofocus' : NULL) . ($req ? ' required' : NULL) . '>
          </div>
            ';
        };
        if($k==count((array) $this->fields)-1)
        {
          $r.= '
          <div class="form-group row">
            <div class="col-xs-12 offset-2 col-10">
              <input type="submit" value="' . $this->submitText . '" class="btn btn-secondary">
            </div>
          </div>';
        }
        self::$k++;
      };
      return $r . "\n</form>\n";
    }
    public function get()
    {
      $r = '<form method="GET" role="form">';
      foreach($this->fields as $k => $v)
      {
        $n = $v->name;
        $l = $v->label;
        $t = $v->type;
        $val = $v->val;
        $p = $v->placeholder;
        $req = $v->required;
        $r.= '
          <div class="form-group row">
            <label for="input' . self::$k . '" class="control-label col-2"' . (in_array($t, ["radio", "select"]) ? NULL : ' style="cursor: pointer"') . '>' . $l . '</label>';
        if(in_array($t, ["radio", "select"]))
        {
          if(!is_array($val))
            die("Error: Values in radio or select control must be array!");
          if($t=="radio")
          {
            $isFirst = true;
            foreach($val as $k2 => $v2)
            {
              if($isFirst)
              {
                $r.= '
                  <div class="radio col-10"><label><input type="radio" name="' . $n . '" value="' . $k2 . '" checked> ' . $v2 . '</label></div><div>';
                $isFirst = false;
              } else
              {
                $r.= '
                  <div class="radio offset-2 col-10"><label><input type="radio" name="' . $n . '" value="' . $k2 . '"> ' . $v2 . '</label></div></div>';
                if($k==count((array) $this->fields)-1)
                {
                   $r.= '
                <div class="form-group row">
                  <div class="col-xs-12 offset-2 col-10">
                    <input type="submit" value="' . $this->submitText . '" class="btn btn-secondary">
                  </div>
                </div>';
                };
              };
            };
          } else
          {
            $r.= '<select name="' . $n . '" class="form-control">';
            foreach($val as $k2 => $v2)
            {
              $r.= '
                <option value="' . $k2 . '">' . $v2 . '</option>
              ';
            };
            $r.= "</select></div>";
            if($k==count((array) $this->fields)-1)
            {
              $r.= '</div>
                <div class="form-group row">
                  <div class="col-xs-12 offset-2 col-10">
                    <input type="submit" value="' . $this->submitText . '" class="btn btn-secondary">
                  </div>
                </div>';
            }
          };
        } else
        {
          $r.= '
            <input type="' . $t . '" name="' . $n . '" value="' . $val . '" placeholder="' . $p . '" autocomplete="' . ($autocomplete ? "on" : "off") . '" class="form-control col-10" id="input' . self::$k . '"' . (self::$k==0 ? ' autofocus' : NULL) . ($req ? ' required' : NULL) . '>
          </div>
            ';
        };
        if($k==count((array) $this->fields)-1)
        {
          $r.= '
          <div class="form-group row">
            <div class="col-xs-12 offset-2 col-10">
              <input type="submit" value="' . $this->submitText . '" class="btn btn-secondary">
            </div>
          </div>';
        }
        self::$k++;
      };
      return $r . "\n</form>\n";
    }
  };
?>