<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>

    html{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .mt-5{
        margin-top: 3rem;
    }

    .mr-10{
        padding-right: 8rem;
    }

    h1{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        text-align: center;
    }

    .text-left{
        text-align: left;
    }

    .text-right{
        text-align: right;
    }

    .contenido-header .company, .client{
    width: 50%;
    display: inline;
    }

    .contenido-header .company{
        float: left;
    }

    .text-uppercase{
        text-transform: uppercase;
        font-weight: bold;
    }

    table{
        width: 100%;
    }

    thead td{
        font-weight: bold;
    }

    tr{
        width: 100%;
    }
    tr td{
        width: 25%;
    }

    .table-2{
    }

    </style>
</head>
<body class="">
    <div class="">
        <h1 class="text-center">DeCasa Outlet</h1>
        <header class="contenido-header">
            <div class="company">
                <p class="text-uppercase">Factura No. <b>{{$invoice->id}}</b></p>
                <p>Fecha: <b id="datenow">{{$invoice->fecha}}</b></p>
                <p>Vencimiento: <b id="datevenc">{{$invoice->fecha}}</b></p>
                <p>Vendedor: <b id="datevenc">{{$invoice->user->name}}</b></p>
            </div>
            <div class="client">
                <p>Cliente: {{ $invoice->client->name }}</p>
                <p>Rut:  {{ $invoice->client->nit }} </p>
                <p>Teléfono:  {{ $invoice->client->phone }} </p>
            </div>
        </header>

                <table class="table mt-5">
                    <thead>
                        <tr class="row">
                            <td class="text-center">Cantidad</td>
                            <td class="text-center">Detalle</td> 
                            <td class="text-right">Precio unitario</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail as $det)
                        <tr class="row"> 
                        <td class="text-right mr-10">{{$det->counts}}</td>
                        <td class="text-left">{{$det->product->name}}</td> 
                        <td class="text-right">$ {{$det->product->price}}</td>
                        <td class="text-right">$ {{$det->prices}}</td>    
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                <table class="mt-5 table-2">
                    <tbody class="">
                        <tr class="">
                            <td class=""></td>
                            <td class=""></td> 
                            <td class="text-right">Subtotal</td>
                        <td class="text-right">$ {{$invoice->total}}</td>
                        </tr>
                        <tr class="">
                            <td class=""></td>
                            <td class=""></td> 
                            <td class="text-right">Total a pagar</td>
                            <td class="text-right"><b>$ {{$invoice->total}}</b></td>
                        </tr>
                    </tbody>
                </table>


    </div>
</body>
</html>