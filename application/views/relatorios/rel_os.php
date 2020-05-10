<div class="row-fluid" style="margin-top: 0">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Relatórios Rápidos</h5>
            </div>
            <div class="widget-content">
                <ul class="site-stats">
                    <li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/osRapid"><i class="fas fa-diagnoses"></i> <small>Todas as OS</small></a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="span8">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Relatórios Customizáveis</h5>
            </div>
            <div class="widget-content">
                <div class="span12 well">
                    <form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/osCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Data de:</label>
                                <input type="date" name="dataInicial" class="span12" />
                            </div>
                            <div class="span6">
                                <label for="">até:</label>
                                <input type="date" name="dataFinal" class="span12" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="">Cliente:</label>
                                <input type="text" id="cliente" class="span12" />
                                <input type="hidden" name="cliente" id="clienteHide" />
                            </div>
                            <div class="span6">
                                <label for="">Responsável:</label>
                                <input type="text" id="tecnico" class="span12" />
                                <input type="hidden" name="responsavel" id="responsavelHide" />
                            </div>
                        </div>
                        <div class="span12 well" style="margin-left: 0">
                            <div class="span6">
                                <label for="">Status:</label>
                                <select name="status" id="" class="span12">
                                    <option value=""></option>
				<option value="Orçamento">Orçamento</option>
				<option value="Orçamento Concluido">Orçamento Concluido</option>
				<option value="Orçamento Aprovado">Orçamento Aprovado</option>
				<option value="Aguardando Peças">Aguardando Peças</option>
				<option value="Em Andamento">Em Andamento</option>
                <option value="Serviço Concluido">Serviço Concluido</option>
				<option value="Sem Reparo">Sem Reparo</option>
				<option value="Reparo Não Autorizado">Reparo Não Autorizado</option>
				<option value="Contato sem Sucesso">Contato sem Sucesso</option>
				<option value="Pronto-Despachar">Pronto-Despachar</option>
				<option value="Entregue - A Receber">Entregue - A Receber</option>
				<option value="Entregue - Finalizado">Entregue - Finalizado</option>
				<option value="Garantia">Garantia</option>
				<option value="Abandonado">Abandonado</option>
                                </select>
                            </div>
                        </div>
                        <div class="span12" style="margin-left: 0; text-align: center">
                            <input type="reset" class="btn" value="Limpar" />
                            <button class="btn btn-inverse"><i class="fas fa-print"></i> Imprimir</button>
                        </div>
                    </form>
                </div>
                .
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".money").maskMoney();
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function(event, ui) {
                $("#clienteHide").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function(event, ui) {
                $("#responsavelHide").val(ui.item.id);
            }
        });
    });
</script>