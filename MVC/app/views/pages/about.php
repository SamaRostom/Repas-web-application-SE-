<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/aboutus.css">
</head>
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
    <h1 style="font-size:40px; color:#003B73; text-aligin: center;">$title</h1>
    </div>
    <div class="column">
        <img src="../images/aboutus.png">
    </div>
   </div>
  </div>

  <div class="container">
  <div class="row">
    <div class="column-66">
    <h1 style=" font-size:40px; color:#60A3D9;">$data</h1>
    </div>
  </div>
</div>
EOT;
    echo $text;
  }
}
?>
</body>
</html>
