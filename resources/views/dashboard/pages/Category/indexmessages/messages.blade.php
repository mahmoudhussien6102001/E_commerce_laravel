 {{-- session to handle messages --}}

@if(session()->has('Created_Category_Sucessfully'))
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        <strong class="font-weight-bold">{{ session()->get('Created_Category_Sucessfully') }}</strong>
    </div>
@elseif(session()->has('Updated_Category_Sucessfully'))
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        <strong class="font-weight-bold">{{ session()->get('Updated_Category_Sucessfully') }}</strong>
    </div>


    @elseif(session()->has('error'))
    <div class="alert alert-danger text-center mx-auto" style="width: 90%; margin-top: 3%;">
        <strong class="font-weight-bold">{{ session()->get('error') }}</strong>
    </div>

    @elseif(session()->has('Deleted_Category_Sucessfully'))
    <div class="alert alert-success text-center mx-auto" style="width: 90%; margin-top: 3%;">
        <strong class="font-weight-bold">{{ session()->get('Updated_Category_Sucessfully') }}</strong>
    </div>
@endif
