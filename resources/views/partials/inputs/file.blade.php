
<?php
    $value = isset($value) ? $value : [];
    $label = isset($label) ? $label : $name;
    $hideLabel = isset($hideLabel) ? $hideLabel : false;
    $class = isset($class) ? $class : '';
    $isSmall = isset($isSmall) ? $isSmall : '';
    $errorKey = isset($errorKey) ? $errorKey : $name;
    $hideErrorMessage = isset($hideErrorMessage) ? $hideErrorMessage : false;
    $multiple = isset($multiple) && $multiple ? 'multiple' : '';
    if($multiple) $name .= "[]";
    $images = is_array($value) ? $value : [$value];
?>

<div class="form-group {{ $errors->has($errorKey) ? 'has-error' : '' }}">
    @if(!$hideLabel)
        <label class="control-label" for="{{ $name }}">{{ $label }}</label>
    @endif

    <input type="file" class="form-control" name="{{ $name }}" {{ $multiple }}>

    @if($errors->has($errorKey) && !$hideErrorMessage)
        <span class="help-block">{{ $errors->first($errorKey) }}</span>
    @endif

    <div gallery>
    @foreach($images as $image)
        <a href="{{ $image }}" title="Banana">
            <img src="{{ Image::url($image, ['thumbnail']) }}">
        </a>
    @endforeach
    </div>
</div>