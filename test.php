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
<svg width="100%" height="100%" id="svg" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><style>
          .path-0{
            animation:pathAnim-0 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
          }
          @keyframes pathAnim-0{
            0%{
              d: path("M 0,600 C 0,600 0,200 0,200 C 139.06666666666666,214 278.1333333333333,228 462,238 C 645.8666666666667,248 874.5333333333333,254 1045,247 C 1215.4666666666667,240 1327.7333333333333,220 1440,200 C 1440,200 1440,600 1440,600 Z");
            }
            25%{
              d: path("M 0,600 C 0,600 0,200 0,200 C 173.46666666666664,203.73333333333335 346.9333333333333,207.46666666666667 488,213 C 629.0666666666667,218.53333333333333 737.7333333333333,225.86666666666667 891,224 C 1044.2666666666667,222.13333333333333 1242.1333333333332,211.06666666666666 1440,200 C 1440,200 1440,600 1440,600 Z");
            }
            50%{
              d: path("M 0,600 C 0,600 0,200 0,200 C 167.46666666666664,226.4 334.9333333333333,252.8 499,255 C 663.0666666666667,257.2 823.7333333333333,235.20000000000002 980,222 C 1136.2666666666667,208.79999999999998 1288.1333333333332,204.39999999999998 1440,200 C 1440,200 1440,600 1440,600 Z");
            }
            75%{
              d: path("M 0,600 C 0,600 0,200 0,200 C 145.46666666666664,212.8 290.9333333333333,225.60000000000002 470,241 C 649.0666666666667,256.4 861.7333333333333,274.4 1029,268 C 1196.2666666666667,261.6 1318.1333333333332,230.8 1440,200 C 1440,200 1440,600 1440,600 Z");
            }
            100%{
              d: path("M 0,600 C 0,600 0,200 0,200 C 139.06666666666666,214 278.1333333333333,228 462,238 C 645.8666666666667,248 874.5333333333333,254 1045,247 C 1215.4666666666667,240 1327.7333333333333,220 1440,200 C 1440,200 1440,600 1440,600 Z");
            }
          }</style><defs><linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" stop-color="#002bdc88"></stop><stop offset="95%" stop-color="#32ded488"></stop></linearGradient></defs><path d="M 0,600 C 0,600 0,200 0,200 C 139.06666666666666,214 278.1333333333333,228 462,238 C 645.8666666666667,248 874.5333333333333,254 1045,247 C 1215.4666666666667,240 1327.7333333333333,220 1440,200 C 1440,200 1440,600 1440,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0"></path><style>
          .path-1{
            animation:pathAnim-1 1s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
          }
          @keyframes pathAnim-1{
            0%{
              d: path("M 0,600 C 0,600 0,400 0,400 C 174.40000000000003,400.5333333333333 348.80000000000007,401.06666666666666 490,383 C 631.1999999999999,364.93333333333334 739.2,328.26666666666665 892,328 C 1044.8,327.73333333333335 1242.4,363.8666666666667 1440,400 C 1440,400 1440,600 1440,600 Z");
            }
            25%{
              d: path("M 0,600 C 0,600 0,400 0,400 C 153.86666666666667,393.73333333333335 307.73333333333335,387.4666666666667 458,403 C 608.2666666666667,418.5333333333333 754.9333333333334,455.8666666666666 918,459 C 1081.0666666666666,462.1333333333334 1260.5333333333333,431.0666666666667 1440,400 C 1440,400 1440,600 1440,600 Z");
            }
            50%{
              d: path("M 0,600 C 0,600 0,400 0,400 C 177.19999999999993,439.06666666666666 354.39999999999986,478.1333333333333 492,468 C 629.6000000000001,457.8666666666667 727.6000000000001,398.5333333333333 879,379 C 1030.3999999999999,359.4666666666667 1235.1999999999998,379.73333333333335 1440,400 C 1440,400 1440,600 1440,600 Z");
            }
            75%{
              d: path("M 0,600 C 0,600 0,400 0,400 C 147.19999999999993,374.26666666666665 294.39999999999986,348.5333333333333 449,338 C 603.6000000000001,327.4666666666667 765.6000000000001,332.1333333333334 932,345 C 1098.3999999999999,357.8666666666666 1269.1999999999998,378.9333333333333 1440,400 C 1440,400 1440,600 1440,600 Z");
            }
            100%{
              d: path("M 0,600 C 0,600 0,400 0,400 C 174.40000000000003,400.5333333333333 348.80000000000007,401.06666666666666 490,383 C 631.1999999999999,364.93333333333334 739.2,328.26666666666665 892,328 C 1044.8,327.73333333333335 1242.4,363.8666666666667 1440,400 C 1440,400 1440,600 1440,600 Z");
            }
          }</style><defs><linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%"><stop offset="5%" stop-color="#002bdcff"></stop><stop offset="95%" stop-color="#32ded4ff"></stop></linearGradient></defs><path d="M 0,600 C 0,600 0,400 0,400 C 174.40000000000003,400.5333333333333 348.80000000000007,401.06666666666666 490,383 C 631.1999999999999,364.93333333333334 739.2,328.26666666666665 892,328 C 1044.8,327.73333333333335 1242.4,363.8666666666667 1440,400 C 1440,400 1440,600 1440,600 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-1"></path></svg>

  <div class="row text-center">
    
 <?php foreach ($objectArray as $key => $value): $i = 1?>
      <div class="col-md-4"> <?= $key ?> prijs van <?=  $value ?> euro </div>
  <?php endforeach ?>
  

  </div>


<script type="text/javascript">

</script>
 
  
</body>
</html>