@php
    $url = route('invoice.pdf', $entry->id);
@endphp
<a href="{{ $url }}" class="btn btn-sm btn-link" target="_blank" title="Download PDF">
    <i class="la la-file-pdf-o"></i> PDF
</a>
