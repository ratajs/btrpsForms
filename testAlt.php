<?php
  include "./forms.php";
  $form = new BtrpsForm("Send it!");
  $form->addField("fieldName", "Field", "email", NULL, "E-mail", true);
  $form->addField("fieldName2", "Radio", "radio", ['key1' => "Value1", 'key2' => "Value2"], "Radio");
  $form->addField("fieldName3", "Select", "select", ['key1' => "Value1", 'key2' => "Value2"], "Select");
  $form->addField("fieldName4", "Second field", "datetime-local", NULL, "Time");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <title>BtrpsForm class test</title>
  </head>
  <body>
    <?=$form ?>
  </body>
</html>
