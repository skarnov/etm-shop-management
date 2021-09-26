<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=250,height=560');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
<div id="divToPrint" >
    <div style="width: 250px; height: 800px; font-size: 10px; margin-left: 2px; font-family: 'Times New Roman', Times, serif; font-weight: bold;">
        <div id="logo"><img src="<?php echo base_url() ?>img/print.jpg" width="223" height="80" alt="lop"></div>
        <table style="border-collapse: collapse; width: 250px; font-size: 12px; font-family: Arial, Helvetica, sans-serif;">
            <tr>
                <td colspan="2" >Fatura No: </td>
                <td width="43"><b><?php echo $print_info->repair_id; ?></b></td>
                <td width="122">Data : <?php echo $print_info->receive_date; ?></td>
            </tr>
            <tr>
                <td colspan="2" >Coust. Nome:</td>
                <td colspan="2"><?php echo $print_info->customer_name; ?>&nbsp;&nbsp;&nbsp; CID: <?php echo $print_info->customer_input_id; ?> </td>
            </tr>
            <tr>
                <td colspan="2">Contaco: </td>
                <td colspan="2"><?php echo $print_info->customer_mobile; ?></td>
            </tr>
        </table>
        <table style="border-collapse: collapse; border: 1px solid black; width: 250px; font-size: 12px; font-family: Arial, Helvetica, sans-serif;">
            <tr class="alt">
                <td width="93" align="right" style="border: 1px solid black;">Modelo:</td>
                <td width="145" style="border: 1px solid black;"><?php echo $print_info->item_name; ?></td>
            </tr>
            <tr>
                <td align="right" style="border: 1px solid black;">Modelo No: </td>
                <td style="border: 1px solid black;">&nbsp;&nbsp;<?php echo $print_info->model_no; ?></td>
            </tr>
            <tr>
                <td align="right" style="border: 1px solid black;">IME No:</td>
                <td style="border: 1px solid black;"><?php echo $print_info->imei; ?></td>
            </tr>
            <tr>
                <td align="right" style="border: 1px solid black;">Problema:</td>
                <td style="border: 1px solid black;"><?php echo $print_info->problem; ?></td>
            </tr>
            <tr>
                <td align="right" style="border: 1px solid black;">Extra. Problem:</td>
                <td style="border: 1px solid black;"><?php echo $print_info->extra_problem; ?></td>
            </tr>
            <tr>
                <td align="right" style="border: 1px solid black;">&nbsp;</td>
                <td style="border: 1px solid black;">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" style="border: 1px solid black;"><strong>Valor Total:</strong></td>
              <td style="border: 1px solid black;"><strong><?php echo $print_info->net_amount; ?> &nbsp;&nbsp;Euros</strong></td>
            </tr>
            <tr>
              <td align="right" style="border: 1px solid black;">Advance :</td>
              <td style="border: 1px solid black;"><?php echo $print_info->paid_amount; ?></td>
            </tr>
            <tr>
              <td align="right" style="border: 1px solid black;">Valor do. saldo: </td>
              <td style="border: 1px solid black;"><?php echo $print_info->repair_due; ?></td>
            </tr>
            <tr>
              <td align="right" style="border: 1px solid black;">Battariya:</td>
              <td style="border: 1px solid black;"><?php echo $print_info->battery_provide; ?></td>
            </tr>
            <tr>
              <td align="right" style="border: 1px solid black;">Data do gerntiya :</td>
              <td style="border: 1px solid black;">30 Dias</td>
            </tr>
            <tr>
              <td align="right" style="border: 1px solid black;">Leventer data :</td>
              <td style="border: 1px solid black;"><?php echo $print_info->delivery_date; ?></td>
            </tr>
        </table>
        <td height="55" id="divToPrint2">&nbsp;</td>
        <td align="center" valign="bottom"><h5 dir="ltr" data-fulltext="" data-placeholder="Tradução" id="tw-target-text">assinatura</h5></td>
        <input type="hidden" name="id" value="<?php echo $print_info->repair_id; ?>" />
        <table width="236" border="0">
            <tr>
                <td width="230" style="font-size: 10px; font-family: Arial, Helvetica, sans-serif;">Euro Telemoveis so se responsabiliza pelos telemoveis e computadores para arranjos no prazo de 30 dias, passando o prazo e responsabilidade do cliente.
                    A partir da data que o cliente e informado que pode fazer o levantamento do equipamento 
                    Na loja, a Euro Telemoveis avisa que sera acrescentada uma taxa (1 Euro) por cada dia que o equipamento fique na loja para alem da data de levantamento.
                </td>
            </tr>
        </table>
        <table width="260" border="0">
            <tr>
                <td width="112" height="73"><input type="button"  value="Print" class="btn btn-info" onClick="PrintDiv();" /></td>
                <td width="138"><a href="<?php echo base_url(); ?>evis_shop/add_repair"><input type="button" value="Back" class="btn btn-info" /></td>
            </tr>
        </table>
        <p>&nbsp;</p>
    </div>
</div>