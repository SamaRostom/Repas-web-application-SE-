<!DOCTYPE html>
<html>
<body>
<?php
class About extends view
{

  public function output()
  {
    $title = $this->model->title;
    $data = $this->model->data;

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
  <div class="container">
   <div class="row">
    <div class="column-66">
    <h1 style=" font-size:40px; color:#2a718e;">$title</h1>
    </div>
   </div>
  </div>

  <div class="container">
  <div class="row">
    <div class="column-66">
    <h1 style=" font-size:40px; color:#2a718e;">$data</h1>
    </div>
  </div>
</div>
EOT;
    echo $text;
    // require APPROOT . '/views/inc/footer.php';
  }
}
?>
</body>
</html>
