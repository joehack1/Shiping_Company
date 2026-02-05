@extends(backpack_view('blank'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">System Logs</div>
                <div class="card-body">
                    <p><strong>Log file:</strong> {{ $log_path }}</p>

                    @if (! $log_exists)
                        <div class="alert alert-warning">Log file not found. Generate logs by running the app or checking configuration.</div>
                    @else
                        <pre style="max-height: 520px; overflow: auto; background: #0b1424; color: #eaf4ff; padding: 16px; border-radius: 8px;">{{ $log_content }}</pre>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
