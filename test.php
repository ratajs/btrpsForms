<?php
  include "./forms.php";
  $form = new BtrpsForm("Odeslat údaje");
  $form->addField("fieldName", "Field", "email", NULL, "flag", "E-mail");
  $form->addField("fieldName2", "Radio", "radio", ['key1' => "Value1", 'key2' => "Value2"], "flag", "Radio");
  $form->addField("fieldName3", "Select", "select", ['key1' => "Value1", 'key2' => "Value2"], "flag", "Select");
  $form->addField("fieldName4", "Second field", "datetime-local", NULL, "flag", "Time");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>BtrpsForm class test</title>
  </head>
  <body>
    <?php
      print $form;
    ?>
  </body>
</html>
