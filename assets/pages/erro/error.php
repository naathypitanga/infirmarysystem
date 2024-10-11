
<?php
require('../../php/util.php');


require_once('../../php/login/validNotLogged.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Erro de Permissão</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
    <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>

<body>

  <!---------MENU LATERAL DESKTOP---------->

  <?php include('../sidebar/sidebar.php'); ?>

  <!---------NAVBAR---------->

  <?php include('../header/header.php'); ?>

  <!---------PARTE INTERNA DA TELA---------->

  <div class="container d-flex mx-auto">
    <div class="container_erro p-0 mx-auto">

                <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
                    <div>
                          <h1>Erro!</h1>
                    </div>
                </div>
                
                  <hr class="linha_erro mx-auto">

                <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
                    <div>
                          <h3 class="text-center">Você não tem permissão para acessar essa página!</h3>
                    </div>
                </div>

                <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
                                  
                        <svg width="382" height="218" viewBox="0 0 382 218" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g filter="url(#filter0_d_889_290)">
                        <rect x="4" width="374" height="210" fill="url(#pattern0)" shape-rendering="crispEdges"/>
                        </g>
                        <defs>
                        <filter id="filter0_d_889_290" x="0" y="0" width="382" height="218" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_889_290"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_889_290" result="shape"/>
                        </filter>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_889_290" transform="translate(0 -0.000892857) scale(0.00078125 0.00139137)"/>
                        </pattern>
                        <image id="image0_889_290" width="1280" height="720" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABQAAAALQAQMAAAD1s08VAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAZQTFRFAAAA////pdmf3QAAAAJ0Uk5TAP9bkSK1AAAH+UlEQVR4nO3dQY6jSBBG4bK8YMkR8ih5NDgaR+EIs6xFa5jBLpcNZCSYRcTv1nuLkVos5hPVOMJuynx9EREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREdGBrtM0RBuq5Wn6E22o9f8JnKY+WlGpnYH/RCsqdTNQ+Gd8mW5FM+yud+AQ7TBr70Ddv4T5DvyOdph1d+C/0Q6zadK+Sq4PYB8tMWoewDFaYtQ+gKqXcXoAVS/j/ACqDrvuAVR9nZl+i5aUu3wQsI+2FLs+gUO0pVjzBI7RlmLtBwE1R0l6AjVHiTwwP4Gas657AjVnnTxweinaUuryUcA+WlPo+gocojWF5IHNK3CM1hRqPwqouC2kV6DiMJYH5leg4rbQfRRQcVuYFkVrCqkDL0tgH+3ZdF0Ch2jPJnlgswSO0Z5N8sB2CdTbFtISqDeM5YF5CdQbxt2HAfW2hWlVtGeTOvCyBvbRolXXjwMO0aJVzRo4RotWyQPbNVBtW0hroNowlgfmNVBtGMsDuzVQbVtY++SGsTpwsyuoDWN54GZXUNsWNqNYbRjLAze7gtq2kD4QqLUt5C1QaxjLA7sH6zn0tLaFh6p/DhVJ4A3V/Z5MnR5n7XblpufZlOkBHOc/NILAx64wbP4g0uKkLU6nSM3iwu30gG0JqDSM28XwyHrA9PIqs/6TRMtztjyfEskDl9ft8pqWSB64nB2PURJKWnT5BbbzX8QHsI92/fYE5vna0AM+Rd38V+/pVan5HODt2tBbZ9oyUGcYywNTGaizLeTfV+bnfyelYSwP7MpAnWEsD5zKQJlt4WIB+2jZT/LAqwUcomU/yQMbCzhGy35qLaDKMJYHJguosi3IA7MFVNkWOguoMozlgZMFFNkWLh8M7KNtt642cIi23ZIHNjZwjLbdam2gxjCWByYbqDGM5YHZBmpsC50N1BjG8sDJBmoMY3XgpQbso3Vfi3sbt8AhWvf1AcCmBhyjdV8fAGxrQIVtIdWACsNYHphrQIVtoasBFYaxPHCqARWGsTrwUgf20b7F70EUgEO0Tx/Y1IFjtE8f2NaB8dtCqgPjh7E8MNeB8duCPLCrA+O3hakOjB/G6sDLHrAPBl4/HjgEA5s94AiwXrsHjN4W0h4wehjLA/MeMHoYywO7PWD0tjDtAaOHsTrwsg/sAda67gOHUGCzDxwB1mr3gbHbgjww7QNjt4W8D4wdxvLAbh8Yuy1M+8DYYawOvBwB9gDtrkeAQyCwOQIcAdq1R4CRw1gemI4AI7eFfAQYOYzlgd0RYOS2IA+cjgADt4X19zYawB6g1fqLJQ3gANBq/cWSBnAMA66/WNIAxg1jeWA6BozbFvIxYNwwlgd2x4Bxw1geOB0Dhm0Lm+94toA9wHKbL6G2gAPAcpsvobaAYxBw8yXUFjBqGMsD01Fg1LYgD8xHgVHbQncUGDWM5YFrhwmM2haOA/sQ3/aBFWLA7QMrTOAAsNT2gRUmcAwBbh9YYQJjhrE8MB0HxgxjeWA+DozZFrrjwJhhLA/cMGxgzLagDiw83MoG9gHAwsOtbOAAcFvh4VY2cAS4rfD0LRsYsS2kd4ARw7gA7O/AwgtQBDC/A4zYFt4CRgzjTh24VawfHPAawE0lxerhFUu7dyXF6vEfy0MawL1DjhVG8eoRNKVDAJ8VdoXVY5BKhxxL7wH9h3EJ+L17yLFcUPzZPRQMXD4OLhhYUvwAC0cCtoWSYvlIwmUawGE+Uhok/sDyaRrnQ6XXaf9toQxcPFi0cHIdK/8cF49mjQWWf44zo0x3H8YGsPimOARYmrfVvLeFt4HewzipA/O7QO9hLA/s3gV6bwvv+tyHsTqwPIqr9QBfMwZurcEVaI3iSiPA194exd7bgjwwvQ/03Rayxfi3s474DmMTaM8YX6B1nr7tn77vtmABx8orkCvQQvSVKejpsxCV98W+w9gC3i6ELAC0doXbi7H1Ij44Aq0LYdw9GAwc5oPW6fUEWj/Ffj5o/QX1HMYW8H5UAJjKhMqH6JPvtpDPAD2HsQGs/DuJM7D+Q0zV8xsMzH8kgGXBfJ3OV3L9GvfIfqW7/twXUKwPB47ziBnNOeMHtIfZ7aaK6iAMBQ7z9fFdOeyVfYqydd/M/QR7ZW98VaDfMLYv025+uYsHpjrQusj9tgUbOP+3/o7FpawO7M4B/YaxPNAA7AHdtgUTsAfsAd4z/w1iDzgAvGd+ArgHHJ2A5kf8e0CvYSwPTDawqy0LbtvCHtC8iMKBOwur27aQPxiYam+a3ICdBdh52+m2zlSA1Tfu8cCdjz4UgNUPj9yA1v9/5+O3yW1jrQHndIH1j4AFgPUP0XWA5vFwYP0fchSA/Xy4cl9XOHCYD1fu6woHjvPhym1T4cDbTp+EgdVbAhSA1ZsqFIDV21IkgGP91sJ4YOXWKA1g5V27CLAewHvdWV/4exKAfwswnwWGfzajAkx/LTD8A0wV4Ikb+e+Ff8qvAjzxyyT3Rifgid8XujcAvHfiV8Lu9U7A0wuhl08f2J3z+d1Ukc8B/e6bSeeAfrdGnRwlfjeXnRwloxvw5Cv14AY8+Trj5zv3OuN5o3c6A/T8bYhTl7Hn75OcukoGR+Cpq8TTp//ru/LfEkBEREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREQk33/s+leFWfxpOQAAAABJRU5ErkJggg=="/>
                        </defs>
                        </svg>

                </div>

                <hr class="linha_erro mx-auto">

                <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
                    <div>
                          <h3 class="text-center">Se o problema persistir, entre em contato com o administrador.</h3>
                    </div>
                </div>

                <hr class="linha_erro mx-auto">

                <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
                    <div>
                          <h5 class="text-center">Senac Saúde 2022 &copy;</h5>
                    </div>
                </div>
                <br>



      
    </div>
  </div>

</body>

</html>