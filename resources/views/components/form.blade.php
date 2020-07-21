@php
$method = strtolower($method);
$method_input = "";

if($method == "post")
{

}elseif($method == "put"){
   $method = "post";
   $method_input = method_field('PUT');
}elseif($method == "delete"){
   $method = "post";
   $method_input = method_field('DELETE');

}else{
    $method = "get";
}

@endphp

<form class="form-detail" action="{{$action}}" method="{{$method}}">
  @csrf 
  {{$method_input}} 
  {{$slot}} 


</form>  
