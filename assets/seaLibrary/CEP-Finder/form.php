<?php include('find.php');?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php
  
  function cepInput(){
    $cep =  'name="cep" type="text" id="cep" value="" size="10" maxlength="9"
    onblur="pesquisacep(this.value);"';
    return $cep;
  }

  function ruaInput(){
    $rua =  'name="rua" type="text" id="rua" size="60"';
    return $rua;
  }

  function bairroInput(){
    $bairro =  'name="bairro" type="text" id="bairro" size="40"';
    return $bairro;
  }

  function cidadeInput(){
    $bairro =  'name="cidade" type="text" id="cidade" size="40"';
    return $bairro;
  }

  function ufInput(){
    $uf =  'name="uf" type="text" id="uf" size="2"';
    return $uf;
  }
  /* FORMULÁRIO EXEMPLO
  precisa conter todas as informações, caso não queria que apareça alguma basta colocar type="hidden"

     <form method="post" action=".">
        <label>Cep:
        <input <?php echo cepInput().cepMask()?>/></label><br />
        <label>Rua:
        <input <?php echo ruaInput()?>></label><br />
        <label >Número <input type="number"></label><br>
        <label>Bairro:
        <input <?php echo bairroInput();?> /></label><br />
        <label>Cidade:
        <input <?php echo cidadeInput();?> /></label><br />
        <label>Estado:
        <input <?php echo ufInput()?> /></label><br />
        <input name="ibge" type="hidden" id="ibge" size="8" /></label><br />
      </form>
      
      */