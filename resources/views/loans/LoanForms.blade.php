
<x-layout>

    <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">

           <a href="/loan">Back</a>
        </button>
    </div>


    <section class="px-3 py-4">


        <main class="max-w-lg mx-auto mt-1 bg-gray-300 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Please fill Loan Forms</h1>
            <form method="POST" action="{{route('LoanForms')}}" enctype="multipart/form-data" class="mt-10">
                @csrf
{{--                <input class="form-check-input" type="hidden" name="user_id" id="_id" value="{{ Auth::id() }}">--}}
{{--                <input class="form-check-input" type="hidden" name="department_id" id="department_id" value="{{ Auth::department_id() }}">--}}





                <div class="mb-6" >
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="Customer_Name" >
                        Name of Customer
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" id="Customer_name" name="Customer_Name" required value="{{ old('Customer_Name') }}">
                    @error('Customer_Name')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6" >
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="Customer_Number">
                        Customer Number
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" id="Customer_number" name="Customer_Number" required value="{{ old('Customer_Number') }}">
                                @error('Customer_Number')
                                <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                                @enderror
                </div>






                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="branch">
                        Branch
                    </label>

                    <select class="border border-gray-400 p-2 w-full" name="branch" id="branch" ">
                        <option selected disabled> Select Branch</option>
                        @foreach($Agency as $row)

                            <option value="{{ $row->id }}"> {{$row->name}} </option>
                        @endforeach
                    </select>

                    @error('branch')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>




                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="image">
                        Upload Image
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="file" id="image" name="image" required>
                    @error('image')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>




                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">

                        Submit
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
