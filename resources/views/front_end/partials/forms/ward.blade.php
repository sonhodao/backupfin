@if (!empty($show))
<option value=""></option>
@else
<option value="">{{ __('Xã/Phường') }}</option>
@endif
@if(!empty($districtId))
    @php
    $wards = \App\Models\Ward::where('district_id','=',$districtId)->get();
    @endphp
    @foreach ($wards as $item)
    <option value="{{ $item->id }}" @if(!empty($wardId) && $item->id == $wardId) selected @endif>{{ $item->name }}</option>
    @endforeach
@endif
