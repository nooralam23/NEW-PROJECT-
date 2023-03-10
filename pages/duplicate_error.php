
<?php

 if(isset($_SESSION['duplicate'])){
    echo '<script>$(document).ready(function (){duplicate();});</script>';
    unset($_SESSION['duplicate']);
    }
echo '<div class="alert alert-danger alert-autocloseable-duplicate" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Duplicate record !
</div>'; ?>


<?php if(isset($_SESSION['excess'])){
    echo '<script>$(document).ready(function (){excess();});</script>';
    unset($_SESSION['excess']);
    }
echo '<div class="alert alert-excess alert-autocloseable-excess" style="background:#fcf8e3; position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Total Percentage is more than 100%. Criteria not save !
</div>'; ?>


<?php if(isset($_SESSION['invalidpass'])){
    echo '<script>$(document).ready(function (){invalidpass();});</script>';
    unset($_SESSION['invalidpass']);
    }
echo '<div class="alert alert-invalidpass alert-autocloseable-invalidpass" style="background:#f2dede; position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Password not matched !
</div>'; ?>


<?php 
echo '<div class="alert alert-warning alert-autocloseable-noselected" style="background:#f2dede; position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
     Please select item/s first !
</div>'; ?>