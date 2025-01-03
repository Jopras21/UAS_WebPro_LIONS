<div class="badge">
    Pending Members: {{ count($pendingMembers) }}
</div>

@foreach($pendingMembers as $member)
    <div>{{ $member->name }} - {{ $member->email }}</div>
    <form action="{{ route('admin.approve_or_delete_member', ['id' => $member->id, 'action' => 'approve']) }}" method="POST">
        @csrf
        <button type="submit">Approve</button>
    </form>
    <form action="{{ route('admin.approve_or_delete_member', ['id' => $member->id, 'action' => 'delete']) }}" method="POST">
        @csrf
        <button type="submit">Delete</button>
    </form>
@endforeach