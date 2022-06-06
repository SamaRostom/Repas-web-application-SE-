<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
class Checkout extends view
{
  public function output()
  {
    $title = $this->model->title;
    $checkout = URLROOT . 'users/checkout';
    $carlurl = URLROOT . 'users/cart';
    require APPROOT . '/views/inc/header.php';
    ?>
   <div class='col-10 col-md-8 col-lg-6 container p-4 my-5 mx-auto'>
		<h1 class='display-6 mb-3 text-center'>Checkout</h1>

        <div class="alert alert-info">
            <strong>Note!</strong> if you want to update your info
        </div>

		Username: <input type= 'text' class='form-control' name= 'Username'  value='<?php echo $_SESSION['Username']; ?>'>

        Address: <input type= 'text'  class='form-control' name= 'Address' value="<?php echo $_SESSION['Address']; ?>">

		Phone Number: <input type= 'text'  class='form-control' name= 'Phone_Number' value="<?php echo $_SESSION['Phone_Number']; ?>">

		Backup Number: <input type= 'text'  class='form-control' name= 'Backup Number' value="<?php echo $_SESSION['Backup_Number']; ?>">



        <br><br>
        <table class="table">
            <tr>
                <td>Total Price</td>
                <td><?php echo $_SESSION['Total_Price']; ?> </td>
            </tr>
        </table>        

		<div style='text-align:center'><input type='submit' class='btn btn-primary px-5 mt-4' name='submit' value='Checkout'>
		</form>
		</div>
    <?php
  }
 
}
?>
</body>
</html>
