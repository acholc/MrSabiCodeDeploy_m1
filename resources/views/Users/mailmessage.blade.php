<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <style>
	      .reset_btn{
	          background: #ff9800;
            border: none;
            border: medium none;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
            border-radius: 3px;
            color: #ffffff;
            display: inline-block;
            font-family: 'Quicksand', sans-serif;
            font-size: 19px;
            margin: 0;
            padding: 8px 14px;
            position: relative;
            text-align: center;
            text-transform: capitalize;
            width: auto;
            margin-bottom: 15px;
            text-decoration:none;color:#fff !important;
	      }
	      .rest_mail{
	              background: #fff;
                padding: 15px;
    border: 5px solid #f5f5f5;
             
	      }
	      .rest_mail h3{
	              font-weight: 700;
            font-size: 25px;
            margin: 0;
            padding: 0;
	      }
	      p{font-size: 18px; margin-bottom:15px; margin-top:0;}
	      .thank_sabi img{height:60px;}
	  </style>
</head>
<table>
    <tr><td></td></tr>
   
</table>
<div class="reset-password">
<table class="rest_mail">
    <tr><td><h3>Dear Test</h3>
    <p>if you want to reset your password, then click on the following link,</p>
    </td>
    </tr>
    <tr>
    <td><a href="{!!$bodyMessage!!}" class="reset_btn">Click here to reset your password</a></td>
    </tr>
      <tr><td class="thank_sabi">
          
          <p>Thanks</p>
          <img src="http://sites.indiit.com/MrSabi/dev/UserAssets/images/JUSS-MR-SABI.png"></td></tr>
</table>
</div>

</html>