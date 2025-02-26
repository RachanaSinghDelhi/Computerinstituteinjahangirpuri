
<div>
    <h2 class="py-4">Forgot Password</h2>
    @if (session('status'))
        <p class="text-success">{{ session('status') }}</p>
    @endif
    <form wire:submit.prevent="sendResetLink">
        <input type="email" wire:model="email" placeholder="Enter your email" required>
        <button type="submit">Send Reset Link</button>
    </form>
</div>
