<div class="form-group">
    <label for="exampleInputEmail1">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $label }}">

    <span class="text-danger">
        @error($name)
            {{ $message }}
        @enderror
    </span>
    <span>{{$demo}}</span>
</div>
