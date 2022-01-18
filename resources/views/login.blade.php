<x-layout>

<br/>
    <main class="max-w-lg mx-auto mt-1 bg-gray-300 p-6 rounded-xl">

        <h1 class="text-center font-bold text-xl">Log In</h1>
        <form method="POST" action="/" class="mt-10">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    email
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

                <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                @error('password')
                <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>


            <div style="text-align: center;">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">

                    Log in
                </button>
            </div>



        </form>

    </main>

{{--     <div style="text-align: center; margin-top: 10px;">--}}
{{--         Or &nbsp;--}}
{{--        <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">--}}

{{--           <a href="/register">Create account</a>--}}
{{--        </button>--}}
{{--     </div>--}}
    </section>


</x-layout>
