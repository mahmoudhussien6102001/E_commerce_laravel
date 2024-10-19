@if(session('fields_are_required'))
<div class="alert alert-danger text-center" style="font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
    {{ session('fields_are_required') }}
</div>

@elseif(session('old_pass_req_not_matching_db'))
<div class="alert alert-danger text-center" style="font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
    {{ session('old_pass_req_not_matching_db') }}
</div>


@elseif(session('confirm_not_matching_new'))
<div class="alert alert-danger text-center" style="font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
    {{ session('confirm_not_matching_new') }}
</div>


@elseif(session('new_pass_req_is_matching_old'))
<div class="alert alert-danger text-center" style="font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
    {{ session('new_pass_req_is_matching_old') }}
</div>

@elseif(session('new_pass_must_8_more_char'))
<div class="alert alert-danger text-center" style="font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
    {{ session('new_pass_must_8_more_char') }}
</div>
@endif
