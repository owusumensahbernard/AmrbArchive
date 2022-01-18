<x-layout>

    <br/>


    <h3 style="text-align: center">Welcome to Loan  portal</h3>

    <br/>
    <main class="max-w-lg mx-auto mt-1 p-6 rounded-xl">

        <div class="mb-6">

            <form method="post" action="{{route('loan')}}">

                @csrf


                <label for="Customer_Number">Search for Loan</label>
                <br /><br>

                <input class="border border-gray-400 p-2 w-full" required type="text" id="Customer_Number" name="Customer_Number" placeholder="Enter Customer Number 000XXXXXX">
                <br /><br>

                @error('Customer_Number')
                <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror

                <button type="submit" id="LoanSearchButton"   class="btn btn-warning">Search</button>
            </form>

        </div>


        @if(count($loans)>0)


        <table class="table table-bordered" style="width: 700px; display:none;" id="ImageDisplayTable" >
            <thead>
            <tr>
                <th >No</th>
                <th >Customer Name</th>



                <th>Scanned Loan Image</th>


                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($loans as $key=>$row)
                <tr>
                    <th>{{$key+1}}</th>
                    <td>{{$row->Customer_Name}}</td>


{{--                    <td><img src="asset(storage/app/public/{{ $row->image}})"></td>--}}

                      <td> <img src="<?php echo asset("storage/$row->image")?>" style="width:120px; height: 50px;"></img>  </td>
                    <td>
                        <button type="button" style="margin: auto;" id="ViewImage" class="btn btn-danger">View</button>
                       <button type="button" id="DownloadImage" style="margin: auto;" class="btn btn-success">Download</button>
                    </td>
                </tr>

                <div class="modal fade " id="Imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <img src="<?php echo asset("storage/$row->image")?>"  class="modal-content" style="width:2000px; height: 550px;"></img>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


            @endforeach

            </tbody>
        </table>



        @endif







    </main>

</x-layout>
<script>
    $(document).ready(function() {

        $('#LoanSearchButton').click(

            $('#ImageDisplayTable').show(),

        )


        $('#ViewImage').click(function(){
            $('#Imagemodal').modal('show')
        });

    })
</script>
