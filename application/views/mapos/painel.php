<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/dist/excanvas.min.js"></script><![endif]-->

<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.donutRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.css" />

<!--Action boxes-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) : ?>
                <li class="bg_lb">
                    <a href="<?= base_url() ?>index.php/clientes"> <i class="fas fa-users" style="font-size:36px"></i>
                        <div>Clientes <span class="badge badge-light">F1</span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) : ?>
                <li class="bg_jj">
                    <a href="<?= base_url() ?>index.php/produtos"> <i class="fas fa-shopping-bag" style="font-size:36px"></i>
                        <div>Produtos <span class="badge badge-light">F2</span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) : ?>
                <li class="bg_lg">
                    <a href="<?= base_url() ?>index.php/servicos"> <i class="fas fa-wrench" style="font-size:36px"></i>
                        <div>Serviços <span class="badge badge-light">F3</span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
                <li class="bg_lo">
                    <a href="<?= base_url() ?>index.php/os"> <i class="fas fa-diagnoses" style="font-size:36px"></i>
                        <div>OS <span class="badge badge-light">F4</span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) : ?>
                <li class="bg_ls">
                    <a href="<?= base_url() ?>index.php/vendas"><i class="fas fa-cash-register" style="font-size:36px"></i>
                        <div>Vendas <span class="badge badge-light">F6</span></div>
                    </a>
                </li>
            <?php endif ?>

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vGarantia')) : ?>
                <li class="bg_ly">
                    <a href="<?= base_url() ?>index.php/garantias"><i class="fas fa-book" style="font-size:36px"></i>
                        <div>Termo Garantia <span class="badge badge-light">F7</span></div>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</div>
<p><!--End-Action boxes-->

<div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Orçamentos</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens1 != null) : ?>
                            <?php foreach ($ordens1 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
									</td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhuma OS em Orçamento.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Orçamentos Concluidos</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens2 != null) : ?>
                            <?php foreach ($ordens2 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhum Orçamento Concluido.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Orçamentso Aprovados</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens3 != null) : ?>
                            <?php foreach ($ordens3 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhum Orçamento Aprovado.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
    
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Aguardando Peças</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens5 != null) : ?>
                            <?php foreach ($ordens5 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhuma OS Aguardando Peças.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Em Andamento</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens4 != null) : ?>
                            <?php foreach ($ordens4 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhuma OS Em Andamento.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
    
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Serviços Concluidos</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens6 != null) : ?>
                            <?php foreach ($ordens6 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Todos os Serviços Cocluidos.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Entregue - A Receber</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="100">N° OS</th>
                            <th width="100">Data de Entrada</th>
                            <th width="550">Cliente</th>
                            <th width="150">Contato</th>
                            <th width="200">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ordens7 != null) : ?>
                            <?php foreach ($ordens7 as $o) : ?>
                                <tr>
                                    <td>
                                        <?= $o->idOs ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($o->dataInicial)) ?>
                                    </td>

                                    <td><?= $o->nomeCliente ?></td>

                                    <td><?= $o->telefone ?></td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Visualizar OS" class="btn tip-top" href="<?= base_url() ?>index.php/os/visualizar/<?= $o->idOs ?>" class="btn"><i class="fas fa-eye"></i> </a>
										<?php endif ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) : ?>
<a title="Editar OS" class="btn btn-info tip-top" href="<?= base_url() ?>index.php/os/editar/<?= $o->idOs ?>" class="btn"><i class="fas fa-edit"></i> </a>
										<?php endif ?>
                                    	<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                                $zapnumber = preg_replace("/[^0-9]/", "", $o->telefone);
echo '<a class="btn btn-success tip-top" style="margin-right: 1%" title="Enviar Por WhatsApp" id="enviarWhatsApp" target="_blank" href="https://web.whatsapp.com/send?phone=55' . $zapnumber . '&text=Prezado(a)%20*' . $o->nomeCliente . '*.%0d%0a%0d%0aSua%20*O.S%20' . $o->idOs . '*%20referente%20ao%20equipamento%20*' . strip_tags($o->descricaoProduto) . '*%20foi%20atualizada%20para%20*' . $o->status . '*.%0d%0a '. $configuration['whats_app1'] .'%0d%0a%0d%0aAtenciosamente,%20' . $configuration['whats_app2'] . '%20-%20' . $configuration['whats_app3'] . '"><i class="fab fa-whatsapp"></i></a>';} ?>
										<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) : ?>
<a title="Imprimir OS" class="btn btn-inverse tip-top" href="<?= base_url() ?>index.php/os/imprimir/<?= $o->idOs ?>" class="btn"><i class="fas fa-print"></i> </a>
										<?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhuma OS Entregue - A Receber.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>


<div class="row-fluid" style="margin-top: 0">

    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                <h5>Produtos Com Estoque Mínimo</h5>
            </div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Cod. Item</th>
                            <th>Produto</th>
                            <th>Preço de Venda</th>
                            <th>Estoque</th>
                            <th>Estoque Mínimo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($produtos != null) : ?>
                            <?php foreach ($produtos as $p) : ?>
                                <tr>
                                    <td>
                                        <?= $p->idProdutos ?>
                                    </td>
                                    <td>
                                        <?= $p->descricao ?>
                                    </td>
                                    <td>R$
                                        <?= $p->precoVenda ?>
                                    </td>
                                    <td>
                                        <?= $p->estoque ?>
                                    </td>
                                    <td>
                                        <?= $p->estoqueMinimo ?>
                                    </td>
                                    <td>
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) : ?>
                          <a title="Editar Produto" href="<?= base_url() ?>index.php/produtos/editar/<?= $p->idProdutos ?>" class="btn btn-info">
                                                <i class="fas fa-edit"></i></a>
                                                
                          <a title="Atualizar Estoque" href="#atualizar-estoque" role="button" data-toggle="modal" produto="<?= $p->idProdutos?>" estoque="<?=$p->estoque?>" class="btn btn-primary" ><i class="fas fa-plus-square"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhum produto com estoque baixo.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php if ($estatisticas_financeiro != null) {
    if ($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null) {  ?>
  
  <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) : ?>
</p>
<div class="row-fluid" style="margin-top: 0">

    <div class="span4">

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="fas fa-hand-holding-usd"></i></span>
                            <h5>Estatísticas financeiras - Realizado</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="chart-financeiro" style=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="span4">

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="fas fa-hand-holding-usd"></i></span>
                            <h5>Estatísticas financeiras - Pendente</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="chart-financeiro2" style=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="span4">

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="fas fa-cash-register"></i></span>
                            <h5>Total em caixa / Previsto</h5>
                        </div>
                        <div class="widget-content">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div id="chart-financeiro-caixa" style=""></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif ?>

<?php  }
} ?>


<?php if ($os != null && $this->permission->checkPermission($this->session->userdata('permissao'), 'rOs')) { ?>
	<div class="span12" style="margin-left: 0">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><i class="fas fa-diagnoses"></i></span>
                <h5>Estatísticas de OS</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <div id="chart-os" ></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Estatísticas do Sistema</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                            <li class="bg_lh"><i class="fas fa-users"></i> <strong>
                                    <?= $this->db->count_all('clientes'); ?></strong> <small>Clientes</small></li>
                            <li class="bg_lh"><i class="fas fa-shopping-bag"></i> <strong>
                                    <?= $this->db->count_all('produtos'); ?></strong> <small>Produtos </small></li>
                            <li class="bg_lh"><i class="fas fa-diagnoses"></i> <strong>
                                    <?= $this->db->count_all('os'); ?></strong> <small>Ordens de Serviço</small></li>
                            <li class="bg_lh"><i class="fas fa-wrench"></i> <strong>
                                    <?= $this->db->count_all('servicos'); ?></strong> <small>Serviços</small></li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($os != null && $this->permission->checkPermission($this->session->userdata('permissao'), 'rOs')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var data = [
			<?php foreach ($os as $o) {
                        echo "['" . $o->status . "', " . $o->total . "],";
                    } ?>

            ];
            var plot1 = jQuery.jqplot('chart-os', [data], {
                seriesDefaults: {
                    // Make this a pie chart.
                    renderer: jQuery.jqplot.PieRenderer,
                    rendererOptions: {
                        // Put data labels on the pie slices.
                        // By default, labels show the percentage of the slice.
                        showDataLabels: true
                    }
                },
                legend: {
                    show: true,
                    location: 'e'
                }
            });

        });
    </script>

<?php
} ?>



<?php if (isset($estatisticas_financeiro) && $estatisticas_financeiro != null && $this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) {
    if ($estatisticas_financeiro->total_receita != null || $estatisticas_financeiro->total_despesa != null || $estatisticas_financeiro->total_receita_pendente != null || $estatisticas_financeiro->total_despesa_pendente != null) {
        ?>
        <script type="text/javascript">
            $(document).ready(function() {

                var data2 = [
                    ['Total Receitas', <?php echo ($estatisticas_financeiro->total_receita != null) ?  $estatisticas_financeiro->total_receita : '0.00'; ?>],
                    ['Total Despesas', <?php echo ($estatisticas_financeiro->total_despesa != null) ?  $estatisticas_financeiro->total_despesa : '0.00'; ?>]
                ];
                var plot2 = jQuery.jqplot('chart-financeiro', [data2], {

                    seriesColors: ["#9ACD32", "#FF8C00", "#EAA228", "#579575", "#839557", "#958c12", "#953579", "#4b5de4", "#d8b83f", "#ff5800", "#0085cc"],
                    seriesDefaults: {
                        // Make this a pie chart.
                        renderer: jQuery.jqplot.PieRenderer,
                        rendererOptions: {
                            // Put data labels on the pie slices.
                            // By default, labels show the percentage of the slice.
                            dataLabels: 'value',
                            showDataLabels: true
                        }
                    },
                    legend: {
                        show: true,
                        location: 'e'
                    }
                });


                var data3 = [
                    ['Total Receitas', <?php echo ($estatisticas_financeiro->total_receita_pendente != null) ?  $estatisticas_financeiro->total_receita_pendente : '0.00'; ?>],
                    ['Total Despesas', <?php echo ($estatisticas_financeiro->total_despesa_pendente != null) ?  $estatisticas_financeiro->total_despesa_pendente : '0.00'; ?>]
                ];
                var plot3 = jQuery.jqplot('chart-financeiro2', [data3], {

                        seriesColors: ["#90EE90", "#FF0000", "#EAA228", "#579575", "#839557", "#958c12", "#953579", "#4b5de4", "#d8b83f", "#ff5800", "#0085cc"],
                        seriesDefaults: {
                            // Make this a pie chart.
                            renderer: jQuery.jqplot.PieRenderer,
                            rendererOptions: {
                                // Put data labels on the pie slices.
                                // By default, labels show the percentage of the slice.
                                dataLabels: 'value',
                                showDataLabels: true
                            }
                        },
                        legend: {
                            show: true,
                            location: 'e'
                        }
                    }

                );


                var data4 = [
                    ['Total em Caixa', <?php echo ($estatisticas_financeiro->total_receita - $estatisticas_financeiro->total_despesa); ?>],
                    ['Total a Entrar', <?php echo ($estatisticas_financeiro->total_receita_pendente - $estatisticas_financeiro->total_despesa_pendente); ?>]
                ];
                var plot4 = jQuery.jqplot('chart-financeiro-caixa', [data4], {

                        seriesColors: ["#839557", "#d8b83f", "#d8b83f", "#ff5800", "#0085cc"],
                        seriesDefaults: {
                            // Make this a pie chart.
                            renderer: jQuery.jqplot.PieRenderer,
                            rendererOptions: {
                                // Put data labels on the pie slices.
                                // By default, labels show the percentage of the slice.
                                dataLabels: 'value',
                                showDataLabels: true
                            }
                        },
                        legend: {
                            show: true,
                            location: 'e'
                        }
                    }

                );


            });
        </script>

<?php
    }
} ?>

<!-- Modal Estoque -->
<div id="atualizar-estoque" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/produtos/atualizar_estoque" method="post" id="formEstoque">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel"><i class="fas fa-plus-square"></i> Atualizar Estoque</h5>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label for="estoqueAtual" class="control-label">Estoque Atual</label>
                <div class="controls">
                    <input id="estoqueAtual" type="text" name="estoqueAtual" value="" readonly />
                </div>
            </div>

            <div class="control-group">
                <label for="estoque" class="control-label">Adicionar Produtos<span class="required">*</span></label>
                <div class="controls">
                    <input type="hidden" id="idProduto" class="idProduto" name="id" value=""/>
                    <input id="estoque" type="text" name="estoque" value=""/>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<!-- Modal Estoque-->
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', 'a', function (event) {
            var produto = $(this).attr('produto');
            var estoque = $(this).attr('estoque');
            $('.idProduto').val(produto);
            $('#estoqueAtual').val(estoque);
        });

        $('#formEstoque').validate({
            rules: {
                estoque: {
                    required: true,
                    number: true
                }
            },
            messages: {
                estoque: {
                    required: 'Campo Requerido.',
                    number: 'Informe um número válido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>