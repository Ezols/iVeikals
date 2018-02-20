<?php
    $value = isset($value) ? $value : '';
    $label = isset($label) ? $label : $name;
    $hideLabel = isset($hideLabel) ? $hideLabel : false;
    $class = isset($class) ? $class : '';
    $isSmall = isset($isSmall) ? $isSmall : '';
    $errorKey = isset($errorKey) ? $errorKey : $name;
    $hideErrorMessage = isset($hideErrorMessage) ? $hideErrorMessage : false;
    $placeholder = isset($placeholder) ? $placeholder : '';
?>

<div class="form-group {{ $errors->has($errorKey) ? 'has-error' : '' }}">
    @if(!$hideLabel)
        <label class="control-label" for="{{ $name }}">{{ $label }}</label>
    @endif

    <textarea richtext name="{{ $name }}" id="{{ $name }}" class="form-control {{ $isSmall ? 'input-sm' : '' }} {{ $class or '' }}" placeholder="{{ $placeholder }}">{{ old($errorKey, $value) }}</textarea>

    @if($errors->has($errorKey) && !$hideErrorMessage)
        <span class="help-block">{{ $errors->first($errorKey) }}</span>
    @endif
</div>