<?php 


$myCoins = ["BTC", "XRP", "LTC", "SHIB", "BCH", "DOGE"];
$objectArray = (object)array();

foreach($myCoins as $coin) {
  $url='https://bitpay.com/api/rates/' . $coin;
  $json=json_decode( file_get_contents( $url ) );
  $value = 0;
  foreach( $json as $obj ){
    if( $obj->code=='EUR' )$value=$obj->rate;
  }

  $objectArray->$coin = $value;
}


// $url='https://bitpay.com/api/rates/XRP';
// $json=json_decode( file_get_contents( $url ) );

// $dollar=$btc=0;

// foreach( $json as $obj ){
//     if( $obj->code=='EUR' )$btc=$obj->rate;
// }

// echo "1 bitcoin=\$" . $btc . "USD<br />";
// $dollar=1 / $btc;



 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <title></title>
  <style type="text/css">
  </style>
</head>
<body>

  <div class="row text-center">
    
 <?php foreach ($objectArray as $key => $value): $i = 1?>
      <div class="col-md-4"> <?= $key ?> prijs van <?=  $value ?> euro </div>
  <?php endforeach ?>
  

  </div>


<script type="text/javascript">

</script>
 
  
</body>
</html>