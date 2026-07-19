<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Sales Report</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
        }

        h2,h3{
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table,
        th,
        td{
            border:1px solid #000;
        }

        th,
        td{
            padding:8px;
        }

    </style>

</head>

<body>

<h2>Laravel POS Banyu</h2>

<h3>Sales Report</h3>

@if(request('start_date'))

<p>

Period :

{{ request('start_date') }}

-

{{ request('end_date') }}

</p>

@endif


<table>

<thead>

<tr>

<th>Invoice</th>

<th>Cashier</th>

<th>Total</th>

<th>Status</th>

<th>Date</th>

</tr>

</thead>

<tbody>

@foreach($transactions as $transaction)

<tr>

<td>{{ $transaction->invoice_number }}</td>

<td>{{ $transaction->user->name }}</td>

<td>Rp {{ number_format($transaction->grand_total) }}</td>

<td>{{ ucfirst($transaction->status) }}</td>

<td>{{ $transaction->created_at->format('d M Y') }}</td>

</tr>

@endforeach

</tbody>

</table>

<br>

<strong>

Total Revenue :

Rp {{ number_format($summary['total_revenue']) }}

</strong>

</body>

</html>