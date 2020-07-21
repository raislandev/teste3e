@if ($msg)
  @php
    if($status == "error"){
        $status = "danger";
    }elseif($status == "notification"){
        $status = "warning";
    }elseif($status == "success"){
        $status = "success";
    }

  @endphp
 
  <div class="alert alert-{{ $status }} alert-dismissible fade show"  role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ $msg }}
   
  </div>
@endif