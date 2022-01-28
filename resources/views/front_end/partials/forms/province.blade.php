@php
    if (empty($provinces)) {
        $provinces = \App\Models\Province::get();
    }
@endphp
@if (!empty($show))
<option value=""></option>
@else
<option value="">{{ __('Tỉnh,Thành phố') }}</option>
@endif
@foreach ($provinces as $item)
<option value="{{ $item->id }}" @if(!empty($provinceId) && $item->id == $provinceId) selected @endif>{{ $item->name }}</option>
@endforeach
