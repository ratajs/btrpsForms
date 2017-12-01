<?php
  class BtrpsForm
  {
    private $fields = [];
    private $submitText = "Send";
    private static $k = 0;
    public function __construct($sText = "Send") {
      $this->submitText = $sText;
    }
    public function addField($name, $label, $type = "text", $val = NULL, $icon = "user", $placeholder = NULL, $required = false, $autocomplete = true)
    {
      $this->fields[] = (object) ['name' => $name, 'label' => $label, 'type' => $type, 'val' => $val, 'icon' => $icon, 'placeholder' => $placeholder, 'required' => $required];
      return true;
    }
    public function __toString()
    {
      $r = '<form method="POST" class="form-horizotal">';
      foreach($this->fields as $k => $v)
      {
        $n = $v->name;
        $l = $v->label;
        $t = $v->type;
        $val = $v->val;
        $i = $v->icon;
        $p = $v->placeholder;
        $req = $v->required;
        $r.= '
          <div class="form-group row">
            <label for="input' . self::$k . '" class="control-label col-sm-2"' . (in_array($t, ["radio", "select"]) ? NULL : ' style="cursor: pointer"') . '>' . $l . '</label>';
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
                  <div class="radio col-sm-10"><label><input type="radio" name="' . $n . '" value="' . $k2 . '" checked> ' . $v2 . '</label></div>';
                $isFirst = false;
              } else
              {
                $r.= '
                  <div class="radio col-sm-offset-2 col-sm-10"><label><input type="radio" name="' . $n . '" value="' . $k2 . '"> ' . $v2 . '</label></div>';
                if($k==count((array) $this->fields)-1)
                {
                  $r.= '
                    <input type="submit" value="' . $this->submitText . '" class="btn btn-default">
                  ';
                };
              };
            };
          } else
          {
            $r.= '<div class="input-group"><span class="input-group-addon glyphicon glyphicon-' . $i . '" style="top: 0"></span><select name="' . $n . '" class="form-control">';
            foreach($val as $k2 => $v2)
            {
              $r.= '
                <option value="' . $k2 . '">' . $v2 . '</option>
              ';
            };
            $r.= "</select>";
            if($k==count((array) $this->fields)-1)
            {
              $r.= '<span class="input-group-btn">
                      <input type="submit" value="' . $this->submitText . '" class="btn btn-default">
                    </span>';
            }
            $r.= "</div>";
          };
        } else
        {
          $r.= '
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-' . $i . '" onClick="$(\'#input' . self::$k . '\').focus()" style="top: 0; cursor: pointer;"></span>
              <input type="' . $t . '" name="' . $n . '" value="' . $val . '" placeholder="' . $p . '" autocomplete="' . $autocomplete ? "on" : "off" . '" class="form-control col-sm-10" id="input' . self::$k . '"' . (self::$k==0 ? ' autofocus' : NULL) . ($req ? ' required' : NULL) . '>
            ';
        };
        if($k==count((array) $this->fields)-1)
        {
          $r.= '<span class="input-group-btn">
                  <input type="submit" value="' . $this->submitText . '" class="btn btn-default">
                </span>';
        }
        $r.= "</div></div>";
        self::$k++;
      };
      return $r . "</form>";
    }
  };
?>