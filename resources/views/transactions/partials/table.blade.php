<x-ui.card>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>Invoice</th>

<th>Cashier</th>

<th>Total</th>

<th>Status</th>

<th>Date</th>

<th width="120">Action</th>

</tr>

</thead>

<tbody>

@forelse($transactions as $transaction)

<tr>

<td>

{{ $transaction->invoice_number }}

</td>

<td>

{{ $transaction->user->name }}

</td>

<td>

Rp {{ number_format($transaction->grand_total) }}

</td>

<td>

<span class="badge
@if($transaction->status == 'paid')
bg-success
@elseif($transaction->status == 'pending')
bg-warning text-dark
@else
bg-danger
@endif">

{{ ucfirst($transaction->status) }}

</span>

</td>

<td>

{{ $transaction->created_at->format('d M Y') }}

</td>

<td>

<a
href="{{ route('transactions.show',$transaction->id) }}"
class="btn btn-dark btn-sm">

Detail

</a>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center">

No Transactions

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-3">

{{ $transactions->links() }}

</div>

</x-ui.card>