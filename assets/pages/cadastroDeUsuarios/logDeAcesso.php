<?php
    include('../../php/util.php');
    require_once('../../php/login/validNotLogged.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log Do Sistema</title>
        <!-- Stylesheet Bootstrap -->
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <!-- Stylesheet Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
        <!-- Stylesheet Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
            <!-- Stylesheet Manual -->
        <link rel="stylesheet" href="../../css/reset.css">
        <link rel="stylesheet" href="../../css/root.css">
        <link rel="stylesheet" href="../../css/cadastroDeUsuarios.css">
    </head>

    <body>
        <!-- Sidebar -->
        <?php 
            if (isset($_SESSION['unidade']) && $_SESSION['unidade'] != 'CADUSER') {
            include('../sidebar/sidebar.php'); 
            }
        ?>

        <!-- Header -->
        <?php include('../header/header.php'); ?>

        <div class="container d-flex mx-auto" id="homeCadUsuarios">
            <div class="container_geral mx-2 mt-4">
                <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
                    <h2>Log Do Sistema</h2>
                </div>

                <hr class="linha">

                <div class="mt-5 mx-3">

                    <table id="table_cadastro" class="display cell-border nowrap">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Icone</th>
                                <th>Nome</th>
                                <th>Horário</th>
                                <th>Ip</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include('../../php/cadastroDeUsuario/log.php') ?>
                        </tbody>
                    </table>

                </div>

                <div class="d-flex gap-2 pb-3 w-100  mt-3 mb-3 container botao_mobile">
                    <a class="botao_submit px-8 pt-2 pb-2" href="index.php" data-toggle="tooltip" data-placement="top" title="Voltar">
                        <img src="../../icones/retroceder-branco.svg" alt="retroceder-branco.svg"></a>
                </div>
            </div>
            <a id="backToTopButton" href="#homeCadUsuarios">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="20" fill="#6ea8fe"/>
                    <path d="M20 27V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13 20L20 13L27 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
            </a>
        </div>

        <!-- Javascript Datatables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

        <!-- Javascript Manual -->
        <script src="../../js/shered/scrollback.js"></script>
        <script src="../../js/cadastroDeUsuarios/datatable_cadastro.js"></script>

        <style>
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: none;
            color: white !important;
            border: none;
            }
        </style>
    </body>
</html>