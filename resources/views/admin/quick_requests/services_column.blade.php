@php
    $ids = collect($entry->service_ids ?? []);
    $services = \App\Models\Service::query()->whereIn('id', $ids)->get();
@endphp
<ul style="padding-left: 18px; margin: 0;">
    @forelse($services as $svc)
        <li>{{ $svc->name }}</li>
    @empty
        <li>None selected</li>
    @endforelse
</ul>
