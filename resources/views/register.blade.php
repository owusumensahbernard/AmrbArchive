<x-layout>


    <section class="px-3 py-4">


        <main class="max-w-lg mx-auto mt-1 bg-gray-300 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Create Account</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="first_name">
                        FirstName
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="first_name" id="first_name" required value="{{ old('first_name') }}">
                    @error('first_name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="last_name">
                        LastName
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="last_name" id="last_name" required value="{{ old('first_name') }}">
                    @error('last_name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" required value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required value="{{ old('password') }}">
                    @error('password')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>


                <div style="text-align: center;">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">

                        Register
                    </button>
                </div>

            </form>
        </main>
    </section>

</x-layout>
