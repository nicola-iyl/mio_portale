<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="robots" content="noindex" />
    <title>Ore Lavoro {{$work->name}}</title>
    <link href="/css/pdf.css" rel="stylesheet">
    <style>



    </style>
</head>
<body style="text-align: center;width:100%;font-family:sans-serif;">
<div style="width:100%;padding:20px">
    <table id="tb_wrapper" style="width:100%" cellpadding="2" cellspacing="2">
        <tr>
            <td style="text-align: center">
            </td>
        </tr>
        <tr>
            <th id="testata">
                <h3 style="margin-bottom: 30px">Ore lavoro per <br>{{ $work->name }}</h3>
            </th>
        </tr>

        <tr>
            <td>
                <table width="100%" cellpadding="2" cellspacing="0" style="font-size: 12px;">
                    <tr>
                        <th style="text-align: left">Data</th>
                        <th style="text-align: left">Descrizione</th>
                        <th>Q.tà</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($hours as $item)
                        <tr>
                            <td style="border-bottom:1px solid #ddd;padding-bottom: 6px;padding-top: 6px;">
                                {{($item->data != '') ? $item->data->format('d/m/Y') : ''}}
                            </td>
                            <td style="border-bottom:1px solid #ddd;padding-bottom: 6px;padding-top: 6px;">
                                {{$item->desc}}
                            </td>
                            <td style="border-bottom:1px solid #ddd;padding-bottom: 6px;padding-top: 6px;">
                                {{$item->qty}}
                            </td>
                            <td style="border-bottom:1px solid #ddd;padding-bottom: 6px;padding-top: 6px;">
                            </td>
                            <td style="text-align: right;border-bottom:1px solid #ddd;padding-bottom: 6px;padding-top: 6px;">
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 20px;">TOTALE ORE : {{$work->oreLavorate()}}</td>
        </tr>


    </table>
</div>

</body>
</html>