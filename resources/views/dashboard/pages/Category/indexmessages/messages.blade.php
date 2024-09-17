{{-- session to handle messages --}}

@if(session()->has('Created_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="width: 50%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); transition: transform 0.3s; animation: scaleUp 1.5s infinite;">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block; animation: bounceIcon 1.5s infinite;"></i>
        <span style="display: inline-block; animation: flashText 2s infinite;">
            {{ session()->get('Created_Category_Sucessfully') }}
        </span>
    </h4>
</div>

<!-- الاستايلات داخل نفس الكود -->
<style>
@keyframes bounceIcon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes flashText {
    0%, 100% { color: white; }
    50% { color: #ffdd57; }
}

@keyframes scaleUp {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}
</style>

@elseif(session()->has('Updated_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="width: 50%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); transition: transform 0.3s; animation: scaleUp 1.5s infinite;">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block; animation: bounceIcon 1.5s infinite;"></i>
        <span style="display: inline-block; animation: flashText 2s infinite;">
            {{ session()->get('Updated_Category_Sucessfully') }}
        </span>
    </h4>
</div>

@elseif(session()->has('error'))
<div class="alert alert-danger text-center mx-auto shadow-lg" style="width: 50%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #dc3545; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); transition: transform 0.3s; animation: scaleUp 1.5s infinite;">
    <h4 class="font-weight-bold">
        <i class="fas fa-exclamation-circle" style="display: inline-block; animation: bounceIcon 1.5s infinite;"></i>
        <span style="display: inline-block; animation: flashText 2s infinite;">
            {{ session()->get('error') }}
        </span>
    </h4>
</div>

@elseif(session()->has('Deleted_Category_Sucessfully'))
<div class="alert alert-success text-center mx-auto shadow-lg" style="width: 50%; margin-top: 3%; border-radius: 15px; padding: 20px; background-color: #28a745; color: white; position: relative; overflow: hidden; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); transition: transform 0.3s; animation: scaleUp 1.5s infinite;">
    <h4 class="font-weight-bold">
        <i class="fas fa-check-circle" style="display: inline-block; animation: bounceIcon 1.5s infinite;"></i>
        <span style="display: inline-block; animation: flashText 2s infinite;">
            {{ session()->get('Deleted_Category_Sucessfully') }}
        </span>
    </h4>
</div>
@endif
