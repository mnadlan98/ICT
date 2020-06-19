<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/fontAwesome.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/templatemo-main.css">
        <link rel="stylesheet" href="http://localhost/ICT-gunung/css/owl-carousel.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT-gunung/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body style="background-image: url(../images/6.jpg); ">
<div class="col-md-12 py-3" style="padding-right:5em;">
  <h5 style="font-weight: bolder; color: black; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Feedback</strong></h5></br></br>
     <?php // form_open(base_url('MainController/register')); ?> 
     <form method="post">
        <p style="margin-bottom:0px;">Tingkat kepuasan selama menjalani ICT Tour</p>
        <div class="form-check form-check-inline" style="margin-left:20px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio1" style="font-size:14px;">1</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio2" style="font-size:14px;">2</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio3" style="font-size:14px;">3</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio4" style="font-size:14px;">4</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio5" style="font-size:14px;">5</label></div>
        </div>
          <div class="form-group" style="margin-top:2.5em;">
            <label>Kritik untuk ICT Tour</label>
            <input type="text-lg" class="form-control" id="kritik" name="kritik">
            
          </div>
          <div class="form-group">
          <label>Kritik untuk ICT Tour</label>
            <input type="text-lg" class="form-control" id="saran" name="saran" >
            
          </div>
          <div class="col-md-12" style="padding-left:75em; margin-bottom:12em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Daftar</button>              
          </div>             
        </form>
  </div>
</body>
</html>