<?php
    $value = isset($value) ? $value : '';
    $options = isset($options) ? $options : [];
    $label = isset($label) ? $label : $name;
    $hideLabel = isset($hideLabel) ? $hideLabel : false;
    $class = isset($class) ? $class : '';
    $isSmall = isset($isSmall) ? $isSmall : '';
    $errorKey = isset($errorKey) ? $errorKey : $name;
    $hideErrorMessage = isset($hideErrorMessage) ? $hideErrorMessage : false;
    $placeholder = isset($placeholder) ? $placeholder : '';
    $optionsPrefix = isset($optionsPrefix) ? $optionsPrefix . '.' : '';
?>

<div class="form-group {{ $errors->has($errorKey) ? 'has-error' : '' }}">
    @if(!$hideLabel)
        <label class="control-label" for="{{ $name }}">{{ $label }}</label>
    @endif

        <select class="form-control {{ $isSmall ? 'input-sm' : '' }} {{ $class or '' }}" value="{{ old($errorKey, $value) }}" name="{{ $name }}" id="{{ $name }}">
            <option>{{ $placeholder }}</option>


            @foreach($options as $option)
                <option value='{{ $option }}'>{{trans($optionsPrefix . $option) }}</option>
            @endforeach

        </select>


    @if($errors->has($errorKey) && !$hideErrorMessage)
        <span class="help-block">{{ $errors->first($errorKey) }}</span>
    @endif
</div>