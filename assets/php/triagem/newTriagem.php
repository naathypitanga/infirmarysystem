<?php require('../../php/util.php');

$triagem = [
  $_POST['id'],
  $_POST['nomeProf'],
  $_POST['pressao1'],
  $_POST['pressao2'],
  $_POST['posicaoPA'],
  $_POST['peso'],
  $_POST['altura'],
  $_POST['pulsacaoArterial'],
  $_POST['freqRespiratoria'],
  $_POST['cintura'],
  $_POST['quadril'],
  $_POST['perimetroCefalico'],
  $_POST['glicemiaCapilar'],
  $_POST['momentoColeta'],
  $_POST['saturacao'],
  $_POST['temperatura'],
  $_POST['hdl'],
  $_POST['triglicerideos'],
  $_POST['ldl'],
  $_POST['hemoglobina'],
  $_POST['tipoSanguineo'],
  $_POST['rh'],
  $_POST['cr'],
  $_POST['especialidade'],
  $_POST['justificativa'],
  isset($_POST['diarreia']) ? $_POST['diarreia'] : '0',
  isset($_POST['dorToracica']) ? $_POST['dorToracica'] : '0',
  $_POST['ign'],
  $_POST['pesoAoNascer'],
  $_POST['priMinuto'],
  $_POST['quiMinuto'],
  $_POST['alimentacaoAlta']

];

$sql = "INSERT INTO tbl_triagem ( 
  id ,id_recepcao, nomeProf ,pressao1 ,pressao2 ,posicaoPA ,peso ,altura ,pulsacaoArterial ,freqRespiratoria, cintura ,quadril ,perimetroCefalico ,glicemiaCapilar ,momentoColeta ,saturacao ,temperatura ,hdl ,triglicerideos ,ldl ,hemoglobina ,tipoSanguineo ,rh ,cr ,especialidade ,justificativa ,diarreia,dorToracica,ign ,pesoAoNascer ,priMinuto ,quiMinuto ,alimentacaoAlta 
  ) VALUES(UUID(),".montarValues($triagem).")";
$SQL_QUERY = mysqli_query ($conexao, $sql);

if (mysqli_affected_rows ($conexao) > 0) {
  generateWarning("Salvo com sucesso!", false);
} else {
  generateWarning("Falha ao salvar");
}
header('location:../../pages/triagem/index.php');
