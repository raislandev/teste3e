
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="input-text form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{ old('name') ?? ($register->name ?? '') }}" placeholder="Nome" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong >{{ $errors->first('name') }}</strong>
                <br>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" name="description" id="description" class="input-text form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  value="{{ old('description') ?? ($register->description ?? '') }}" placeholder="Descrição">
        @if ($errors->has('description'))
            <span  class="invalid-feedback" role="alert">
                <strong >{{ $errors->first('description') }}</strong>
                <br>
            </span>
        @endif
    </div>


    
