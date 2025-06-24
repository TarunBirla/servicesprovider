@extends('admin.layout.main')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
     data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <div class="body-wrapper">
        <div class="body-wrapper-inner">
            <div class="container-fluid mt-4">

                <h2 class="mb-4">User & Associate Suggestions</h2>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($suggestions as $suggestion)
                            <tr id="suggestion-{{ $suggestion->id }}">
                                <td>{{ $suggestion->id }}</td>
                                <td>{{ $suggestion->name }}</td>
                                <td>{{ $suggestion->email }}</td>
                                <td>{{ $suggestion->subject }}</td>
                                <td>{{ Str::limit($suggestion->message, 50) }}</td>
                                <td>
                                    <select class="form-select status-selector" data-id="{{ $suggestion->id }}">
                                        <option value="Pending" @if($suggestion->status == 'Pending') selected @endif>Pending</option>
                                        <option value="Reviewed" @if($suggestion->status == 'Reviewed') selected @endif>Reviewed</option>
                                        <option value="Resolved" @if($suggestion->status == 'Resolved') selected @endif>Resolved</option>
                                    </select>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6">No suggestions found.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $suggestions->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectors = document.querySelectorAll('.status-selector');
    selectors.forEach(select => {
        select.addEventListener('change', async (e) => {
            const id = e.target.dataset.id;
            const status = e.target.value;

            try {
                const response = await fetch(`/suggestions/${id}/update-status`, {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ status })
                });

                const data = await response.json();
                if (data.success) {
                    e.target.classList.remove('is-invalid');
                    e.target.classList.add('is-valid');
                } else {
                    alert('Error updating status.');
                }
            } catch (error) {
                console.error(error);
                alert('Error occurred.');
            }
        });
    });
});
</script>
@endsection
