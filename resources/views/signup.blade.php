<x-auth-layout :isSignInPage="false">
    <form method="POST" action="/sign-up" class="space-y-3">
        @csrf
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div>
                <input id="email" type="text" name="email" autocomplete="email" required value="{{ old('email') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 h-4 mt-1">
                @error('email')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div>
                <input id="name" type="text" name="name" autocomplete="name" required
                    value="{{ old('name') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 h-4 mt-1">
                @error('name')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
            <div>
                <input id="username" type="text" name="username" required value="{{ old('username') }}"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 h-4 mt-1">
                @error('username')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div>
                <input id="password" type="password" name="password" autocomplete="off" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 h-4 mt-1">
                @error('password')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <label for="confirm-password" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
            <div>
                <input id="confirm-password" type="password" name="confirm-password" autocomplete="off" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            <p class="text-xs text-red-600 h-4 mt-1">
                @error('confirm-password')
                    {{ $message }}
                @enderror
            </p>
        </div>

        <div>
            <button type="submit"
                class="cursor-pointer flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
        </div>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
        Already have an account?
        <a href="/sign-in" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign In</a>
    </p>
</x-auth-layout>
