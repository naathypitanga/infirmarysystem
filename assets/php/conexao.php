<?php
    $dadosConexao = [
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db" => "dbpienf"
    ];
    $conexao = mysqli_connect($dadosConexao["host"], $dadosConexao["user"], $dadosConexao["pass"], $dadosConexao["db"]);
?>