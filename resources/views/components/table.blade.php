<div class="table-responsive">
  <table class="table">
      <thead>
      <tr>
        @foreach($columnList as $key => $value)
          <th>{{$value}}</th>
        @endforeach 
          <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      @foreach($list as $key => $value)
          <tr>
          @foreach($columnList as $key2 => $value2)
            
            <td>{{ $value->{$key2} }}</td>
                
          @endforeach  
            <td>
              <a href="{{route($routerName.'.show',$value->id)}}"><i style="color:black" class="material-icons">Visualizar</i></a>
              <a href="{{route($routerName.'.edit',$value->id)}}"><i style="color:#fe892a" class="material-icons">Editar</i></a>
              <a href="{{route($routerName.'.show',[$value->id,'delete=1'])}}"><i  style="color:red" class="material-icons">Delete</i></a>
            
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>


