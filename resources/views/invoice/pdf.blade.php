<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body style="font-family:sans-serif;">
<table width="100%" cellspacing="6" cellpadding="6">
    <tr>
        <td>
            <p>
                <span style="font-weight:bold">Tamburini Nicola</span><br />
                via Vittorio Veneto, 98<br />
                50050 Cerreto Guidi (FI)<br />
                Tel. 331 3935540<br />
                Partita IVA 06268950489</p>
        </td>
        <td align="right">
            <h4>Fattura Commerciale</h4>
            <p>
                Fattura n. {{$fattura->numero}}<br />
                Del: {{$fattura->data->format('d-m-Y')}}
            </p>
        </td>
    </tr>
</table>
<br />
<table width="100%" >
    <tr valign="top" >
        <td  style="border:1px solid #ccc; padding-left:10px" width="200" >
            <h4>Modalit&agrave; di pagamento:</h4>
            <p>{{$fattura->pagamento}}</p>
            <p>Banca Intesa<br />Codice IBAN:<br />IT40R0306937839100000005395</p>
        </td>
        <td width="50">&nbsp;</td>
        <td style="border:1px solid #ccc; padding-left:10px; background-color:#f7f7f7" width="200">
            <p>
                Spett.le<br /><br />
                <span style="font-weight:bold">{{ $fattura->customer->ragione_sociale }}</span><br />
                {{ $fattura->customer->indirizzo }}<br />
                P.iva: {{ $fattura->customer->p_iva }}<br />
            </p>
        </td>
    </tr>
</table>
<br />
<div>
    <table width="100%" cellspacing="0" cellpadding="0" style="font-size:14px">
        <tr style="">
            <th style="border:1px solid #ccc;background-color:#f7f7f7">Descrizione</th>
            <th style="border:1px solid #ccc;background-color:#f7f7f7">Q.t&agrave;</th>
            <th style="border:1px solid #ccc;background-color:#f7f7f7">Importo</th>
            <!-- <th style="border:1px solid #ccc;background-color:#f7f7f7">Iva</th> -->
            <th style="border:1px solid #ccc;background-color:#f7f7f7">Imposta</th>
            <th style="border:1px solid #ccc;background-color:#f7f7f7">Totale</th>
        </tr>
       @foreach($fattura->invoiceItems as $item)
        <tr>
            <td style="border-bottom:1px solid #ccc; padding:5px 0px;">{{ $item->work->name }}</td>
            <td align="center" style="border-bottom:1px solid #ccc;">1</td>
            <td align="right" style="border-bottom:1px solid #ccc;">@money($item->imponibile)</td>
            <!-- <td align="right" style="border-bottom:1px solid #ccc;">22%</td> -->
            <td align="right" style="border-bottom:1px solid #ccc;">@money($item->imposta)</td>
            <td align="right" style="border-bottom:1px solid #ccc;">@money($item->totale)</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="5">
                <br><br>
                Operazione effettuata ai sensi dell’articolo 1, commi da 54 a 89, della Legge n. 190/2014 così come modificato dalla Legge numero 208/2015 e dalla Legge 145/2018.<br>
                Il compenso non è soggetto alla ritenuta alla fonte a titolo d’acconto ai sensi dell’articolo 1 comma 67 della Legge numero 190/2014.<br>
                Imposta di bollo da 2 euro assolta sull’originale per importi maggiori di 77,47 euro

            </td>
        </tr>
    </table>
</div>
<br />
<table width="100%">
    <tr>
        <td align="right" style="border:1px solid #ccc;background-color:#f7f7f7;padding:4px;">Totale Importo:</td>
        <td align="right" style="border:1px solid #ccc;background-color:#f7f7f7;padding:4px;width:100px;">@money($fattura->imponibile)</td>
    </tr>
<!-- <tr>
  			<td align="right" style="border:1px solid #ccc;background-color:#f7f7f7;padding:4px;">Totale Imposta: </td>
  			<td align="right" style="border:1px solid #ccc;background-color:#f7f7f7;padding:4px;width:100px;">@money($fattura->imposta)</td>
  		</tr> -->
    <tr>
        <td align="right" style="border:1px solid #000;background-color:#ccc;padding:10px;"><h4>TOTALE FATTURA:</h4></td>
        <td align="right" style="border:1px solid #000;background-color:#ccc;padding:10px;width:100px;"><h4>@money($fattura->totale)</h4></td>
    </tr>

</table>
</body>
</html>