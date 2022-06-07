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
    $checkout = URLROOT . 'users/checkout';
    $carlurl = URLROOT . 'users/cart';
    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    // $text = <<<EOT
    ?>
    <br>
    <div style="clear: both"></div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
            <tr>
                <th width="10%">Meal Code</th>
                <th width="25%">Meal Name</th>
                <th width="25%">Quantity</th>
                <th width="25%">Meal Price</th>
                <th width="25%">Remove Meal</th>
            </tr>
            <?php

            if(!empty($_SESSION["cart"])){
                $total = 0;
                foreach ($_SESSION["cart"] as $key => $value) {
                    
                    ?>
                    <tr>
                        <td><?php echo $value["Meal_ID"]; ?></td>
                        <td><?php echo $value["Meal_Name"]; ?></td>
                        <td><?php echo $value["Quantity"]; ?></td>
                        <!-- <td><?php echo $_SESSION["Quantity"]; ?></td> -->
                        <?php $v=$value["Meal_Price"] * $value["Quantity"];?>
                        <td><?php echo $v; ?> L.E </td>
                        <td><a class="text-decoration-none" href="<?php echo $carlurl; ?>?action=delete&id=<?php echo $value["Meal_ID"]; ?>"><span
                                    class="text-danger">Remove Meal</span></a></td>

                    </tr>     

                    <?php
                    $total = $total +  $v;
                    // $_SESSION['Total_Price']=$total;
                }
                
                $_SESSION['Total_Price']=$total;
                ?>
            <tr>
            <td colspan="3" align="right"><b>Total</b></td>
                <th width="15%" align="left"><?php echo number_format($_SESSION['Total_Price'], 2); ?> L.E </th>
                <th width="15%"><a href="<?php echo $checkout; ?>"> <input type="button" class="btn btn-dark" name="submit" value="Checkout"></th>
            </tr>
            <?php

          }

          ?>
            </table>
        </div>
    </div>
    <?php
// EOT;
//     echo $text;
    // $this->printForm();
    // require APPROOT . '/views/inc/footer.php';
  }
  public function o()
  {
    $title = $this->model->title;
    $checkout = URLROOT . 'users/checkout';
    $carturl = URLROOT . 'users/Cart';
    // $Ent=$this->model->MealsCatgories();

    require APPROOT . '/views/inc/header.php';
    flash('register_success');
    $text = <<<EOT
    <br>
    <div style="clear: both"></div>
        <div class="table-responsive">
        <?php   
          if(count($cart->productsQuantity)>0){
              $item_total = 0;
        ?>
            <table class="table table-hover table-striped table-bordered">
            <tr>
                <th width="10%">Meal Code</th>
                <th width="25%">Meal Name</th>
                <th width="25%">Meal Price</th>
                <th width="25%">Quantity</th>
                <th width="25%">Remove Meal</th>
            </tr>
              <?php	
              foreach ($cart->productsQuantity as $productID => $quantity){  
                $product=new Product($productID);						
                ?>
                <tr>
                  <td><strong><?php echo $product->name; ?></strong></td>
                  <td><?php echo $quantity; ?></td>
                  <td><?php echo "$".$product->price; ?></td>
                  <td>
                    <form method="post" action="$carturl?action=remove&id=<?php echo $product->id; ?>">
                      <input type="submit" value="Remove Item" class="btnAddAction" />
                      <input type='hidden' name='cart' value='<?php echo (json_encode($cart->productsQuantity)); ?>' />
                    </form>
                  </td>
                </tr>
                <?php
                $item_total += ($product->price*$quantity);
              }
              ?>
            <tr>
                <td colspan="3" align="right"><b>Total</b></td>
                <th width="15%" align="left"><?php echo number_format($item_total, 2); ?> L.E </th>
                <th width="15%"><a href="$checkout"> <input type="button" class="btn btn-dark" name="submit" value="Checkout"></th>
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
