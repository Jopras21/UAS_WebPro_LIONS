<h1>Our Members</h1>
    <div class="card-container">
        @foreach ($members as $member)
            <div class="card">
                <img src="{{ $member['image'] }}" alt="Photo of {{ $member['name'] }}">
                <div class="content">
                    <h3>{{ $member['name'] }}</h3>
                    <p>{{ $member['role'] }}</p>
                </div>
            </div>
        @endforeach
    </div>