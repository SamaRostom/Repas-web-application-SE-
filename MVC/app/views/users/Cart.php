<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    body {background-color: #f5f6f7;}
  </style>  
</head>
<body>
<?php
class Cart extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    $text = <<<EOT
    <br>
    <div style="clear: both"></div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
            <tr>
                <th width="10%">Meal Code</th>
                <th width="25%">Meal Name</th>
                <th width="25%">Meal Price</th>
                <th width="25%">Remove Meal</th>
            </tr>

            <tr>
                <td colspan="2" align="right"><b>Total</b></td>
                <th width="15%" align="left"><?php echo number_format(100, 2); ?> L.E </th>
                <th width="15%">   <a href="CheckOut.php"> <input type="button" class="btn btn-dark" name="submit" value="Checkout"></th>
            </tr>

            </table>
        </div>
    </div>
EOT;
    echo $text;
    // $this->printForm();
    // require APPROOT . '/views/inc/footer.php';
  }

}
?>
</body>
</html>
