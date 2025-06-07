<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ url('register/associate') }}">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <select name="plan_id" required>
            <option value="">Select a Plan</option>
            @foreach ($plans as $plan)
                <option value="{{ $plan->id }}">{{ $plan->name }} ({{ $plan->service_limit }} services)</option>
            @endforeach
        </select>

        <button type="submit">Register</button>
    </form>
</x-guest-layout>
