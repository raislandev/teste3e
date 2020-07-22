
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="input-text form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{ old('name') ?? ($register->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong >{{ $errors->first('name') }}</strong>
                <br>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea name="description" id="description" class="input-text form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"  rows="3">{{ old('description') ?? ($register->description ?? '') }}</textarea>
        @if ($errors->has('description'))
            <span  class="invalid-feedback" role="alert">
                <strong >{{ $errors->first('description') }}</strong>
                <br>
            </span>
        @endif
    </div>


    
