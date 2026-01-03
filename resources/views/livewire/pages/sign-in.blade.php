<div>
    <form wire:submit.prevent="authenticate" class="space-y-3">
        @csrf
        <x-form.input type="email" name="email" placeholder="Your email" label="Email Address" />
        <x-form.input type="password" name="password" placeholder="••••••••" label="Password" />

        <x-ui.submit-button target="authenticate">
            Sign in
        </x-ui.submit-button>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
        Don't have an account?
        <a wire:navigate.hover href="/sign-up" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign Up</a>
    </p>

    @if (session('status'))
        <x-toaster theme="{{ session('status')['theme'] }}">{{ session('status')['message'] }}</x-toaster>
    @endif
</div>
