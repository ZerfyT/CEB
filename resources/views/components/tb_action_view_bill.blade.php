<a class="btn btn-sm btn-outline-success rounded" href="{{ route('genarate-bill', $bill->id) }}" role="button">
    <i class="bi bi-receipt mx-1"></i>View
</a>

<a class="btn btn-sm btn-outline-success rounded" href="{{ route('download-bill', $bill->id) }}" role="button">
    <i class="bi bi-download mx-1"></i>Download
</a>
