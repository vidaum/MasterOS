<!DOCTYPE html>
<html>

<head>
    <title>MAPOS</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
</head>

<body style="background-color: transparent">

    <div class="container-fluid">

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
					
                    <div class="widget-title">
                        <h4 style="text-align: center">Produtos</h4>
                    </div>
                    <div class="widget-content nopadding">

                        <table width="1100" class="table table-bordered">
                      <thead>
                          <tr>
                              <th width="690" style="font-size: 15px">Nome</th>
                              <th width="70" style="font-size: 15px">UN</th>
                              <th width="130" style="font-size: 15px">Preço Compra</th>
                              <th width="120" style="font-size: 15px">Preço Venda</th>
                              <th width="90" style="font-size: 15px">Estoque</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($produtos as $p) {
                              echo '<tr>';
                              echo '<td>' . $p->descricao. '</td>';
                              echo '<td>' . $p->unidade . '</td>';
                              echo '<td>' . $p->precoCompra . '</td>' ;
                              echo '<td>' . $p->precoVenda . '</td>' ;
                              echo '<td>' . $p->estoque. '</td>';
                              echo '</tr>';
                          }
                          ?>
                      </tbody>
                  </table>

                    </div>

                </div>
                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">Data do Relatório: <?php echo date('d/m/Y'); ?>
                </h5>
            </div>
        </div>
    </div>
</body>

</html>
