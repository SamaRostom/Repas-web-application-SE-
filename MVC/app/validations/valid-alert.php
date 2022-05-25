<?php 
class valid{
    public static function isEmpty($value) {
        $x="
        <script>
            alert('$value');
        </script>";
        return $x;   
      }
}

?>