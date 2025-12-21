<x-auth-layout :isSignInPage="true">
    <form action="/sign-in" method="POST" class="space-y-3">
        @csrf
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div>
                <input id="email" type="text" name="email" autocomplete="email" required value="{{ old('email') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 mt-1 h-4">
                @error('email')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                        password?</a>
                </div>
            </div>
            <div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 h-4">
                @error('password')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <button type="submit"
                class="flex cursor-pointer w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                in</button>
        </div>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
        Don't have an account?
        <a href="/sign-up" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign Up</a>
    </p>

</x-auth-layout>

@if (session('status'))
    <x-toaster theme="{{ session('status')['theme'] }}">{{ session('status')['message'] }}</x-toaster>
@endif
