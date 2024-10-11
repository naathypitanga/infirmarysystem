<?php

$url = $_SERVER['REQUEST_URI'];


if(strpos($url, '/pages/atendConsultas/')){
  $consultaClass = "triagem_historico--azul";
}else{
  $consultaClass = "triagem_historico--branco";
};

if(strpos($url, 'drgdfrgdvrg')){
  $listaClass = "triagem_historico--azul";
}else{
  $listaClass = "triagem_historico--branco";
};

if(strpos($url, 'drgxcfgdr')){
  $fichaClass = "triagem_historico--azul";
}else{
  $fichaClass = "triagem_historico--branco";
};