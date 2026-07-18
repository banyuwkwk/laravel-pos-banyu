<div class="card border-0 shadow-sm rounded-4 mb-4">

<div class="card-body">


<form method="GET"
action="{{ route('reports.sales') }}">


<div class="row g-3">


<div class="col-md-5">

<label class="form-label">
Start Date
</label>

<input 
type="date"
name="start_date"
class="form-control"
value="{{ request('start_date') }}"
>

</div>



<div class="col-md-5">

<label class="form-label">
End Date
</label>

<input 
type="date"
name="end_date"
class="form-control"
value="{{ request('end_date') }}"
>

</div>



<div class="col-md-2 d-flex align-items-end">


<button class="btn btn-dark w-100">

Filter

</button>


</div>


</div>


</form>


</div>

</div>