<div class="card border-0 shadow-sm rounded-4 mb-4">


<div class="card-body">


<h5 class="fw-bold mb-4">

Products

</h5>


<div class="table-responsive">


<table class="table align-middle">


<thead>

<tr>

<th>
Product
</th>

<th>
Qty
</th>

<th>
Price
</th>

<th>
Subtotal
</th>

</tr>

</thead>


<tbody>


@foreach($transaction->details as $detail)


<tr>


<td>

{{ $detail->product->name }}

</td>


<td>

{{ $detail->qty }}

</td>


<td>

Rp {{ number_format(
    $detail->price
) }}

</td>


<td>

Rp {{ number_format(
    $detail->subtotal
) }}

</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>


</div>