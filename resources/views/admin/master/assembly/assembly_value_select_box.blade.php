<option selected disabled>Select Assembly</option>
@foreach ($assemblys as $assembly)
<option value="{{ $assembly->id }}">{{ $assembly->code }}--{{ $assembly->name_e }}</option>	 
@endforeach