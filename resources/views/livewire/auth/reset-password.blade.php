<div>
    <h2>Reset Password</h2>
    @if (session('status'))
        <p class="text-success">{{ session('status') }}</p>
    @endif
    @if (session('error'))
        <p class="text-danger">{{ session('error') }}</p>
    @endif
    <form wire:submit.prevent="resetPassword">
        <input type="hidden" wire:model="token">
        <input type="email" wire:model="email" placeholder="Email" required>
        <input type="password" wire:model="password" placeholder="New Password" required>
        <input type="password" wire:model="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Reset Password</button>
    </form>
</div>
