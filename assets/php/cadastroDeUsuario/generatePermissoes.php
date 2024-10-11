<?php

    $mascaras = [
        'cadEst' => 'Permissão para cadastro de produtos',
        'pagLog' => 'Acesso à página de Log de usuário',
        'histUn' => 'Acesso ao histórico da unidade',
        'triaCons' => 'Acesso à triagem de consultas',
        'atendCons' => 'Acesso ao atendimento de consultas',
        'recp' => 'Acesso à página de recepção',
        'gerGrup' => 'Acesso ao gerenciamento de grupos',
        'cadUser' => 'Acesso ao cadastro de usuário',
        'movEst' => 'Permissão para movimentar o estoque',
        'estUB' => 'Acesso ao estoque da UBS',
        'estG' => 'Acesso ao estoque geral',
        'estUP' => 'Acesso ao estoque da UPA'
    ];

    $sqlPerm = "SELECT * FROM tbl_cargo";
    $queryPerm = mysqli_query($conexao, $sqlPerm);

    while($row = mysqli_fetch_assoc($queryPerm)){ 
        if ($row['ID_cargo'] != '5e4aff8c-298f-11ed-b6b3-94de80f1abb1') {
            ?>
                <button type="button" class="botao_collapse--collapsible"><?php echo $row['descricao']?></button>
                <div class="botao_collapse--content">
                    <p>Permissões:</p>
                    <ul>
                        <?php 
                            $permissoes = explode(',',$row['permissoes']);
                            for($i=count($permissoes)-1;$i > 0; $i--){
                                echo "<li>".$mascaras[$permissoes[$i]]."</li>";
                            }
                        ?>
                    </ul>
        
                    <div class="mt-2 mb-5 d-flex gap-2 botao_mobile botao_desktop">
                        <a data-bs-toggle="modal" data-bs-target="#modal<?php echo($row['ID_cargo'])?>" class="px-8 pt-2 pb-2 text-decoration-none botao_submit" data-toggle="tooltip" data-placement="top" title="Remover Grupo de Serviço">
                            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Remover
                        </a>
        
                        <div class="modal fade" tabindex="-1" id="modal<?php echo($row['ID_cargo'])?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark">Atenção</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff;"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <p>Você realmente deseja excluir o grupo de serviço: <b><?php echo($row['descricao'])?></b>?</p>
                                    </div>
                                    <div class="modal-footer text-dark">
                                        <a href="../../php/cadastroDeUsuario/desativarGrupo.php?id=<?php echo($row['ID_cargo'])?>" class="px-8 pt-2 pb-2 text-decoration-none botao_submit" data-toggle="tooltip" data-placement="top" title="Remover Grupo de Serviço">
                                            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Remover
                                        </a>
                                        <button type="button" class="px-8 pt-2 pb-2 botao_submit" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="./gerenciamento-editar.php?id=<?php echo($row['ID_cargo'])?>">
                            <button class="px-8 pt-2 pb-2 botao_submit" data-toggle="tooltip" data-placement="top" title="Editar Grupo de Serviço">
                                <img src="../../icones/botao-editar.svg" alt="botao-editar.svg">Editar
                            </button>
                        </a>
                    </div>
                </div>            
            <?php
        }
        ?>        
    <?php } ?>