@props([
    'message' => 'No data found.',
])

<tr>

    <td colspan="100" class="text-center py-5 text-muted">

        <i class="bi bi-inbox fs-1 d-block mb-3"></i>

        {{ $message }}

    </td>

</tr>