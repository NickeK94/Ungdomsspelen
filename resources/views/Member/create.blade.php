<x-app-layout>
<x-slot name="header">
        <h1 class="display-1">Anmäl deltagare
        <img src="/Images/Logo.jpg" width="500" height="200" alt="Logotyp: Sveriges flagga (gult kors på blå botten) med texten Parasport/Västergötland i stora gula bokstäver.">
        </h1>
      </x-slot>
<div class="container">
@if($errors->any())
<div class="alert alert-danger" role="alert">
Du tycks ha glömt att fylla i ett eller flera namn. Kolla en extra gång!
<br>
Tänk även på att du måste kryssa i minst en gren för varje deltagare.
</div>
@endif
<form action="{{ route('member.store') }}" method="post">
@csrf
@for($i = 1; $i <= $numberOfMembers; $i++)
<h3 class="display-3">Person {{ $i }}</h3>
<input type="hidden" name="member[{{ $i }}][school]" value="{{ $school }}">
<input type="hidden" name="member[{{ $i }}][city]" value="{{ $city }}">
<input type="hidden" name="member[{{ $i }}][contactName]" value="{{ $contactName }}">
<input type="hidden" name="member[{{ $i }}][contactPhone]" value="{{ $contactPhone }}">
<input type="hidden" name="member[{{ $i }}][contactEmail]" value="{{ $contactEmail }}">
<div class="form-group">
<label for="member[{{ $i }}][name]">Deltagarens namn:</label>
<input type="text" class="form-control" autocomplete="off" value="{{ old('member['.$i.'][name]') }}" name="member[{{ $i }}][name]">
</div>
<div class="form-group">
<label for="member[{{ $i }}][gender]">Kön:</label>
<select class="form-control" name="member[{{ $i }}][gender]">
<option>Pojke</option>
<option>Flicka</option>
<option>Annat</option>

</select>
</div>
<div class="form-group">
<label for="member[{{ $i }}][stadium]">Stadium:</label>
<select class="form-control" name="member[{{ $i }}][stadium]">
<option>Mellanstadiet</option>
<option>Högstadiet</option>
<option>Gymnasiet</option>

</select>
</div>
<div class="form-group">
<label for="member[{{ $i }}][class]">Deltagarens tävlingsklass:</label>
<select class="form-control" name="member[{{ $i }}][class]">
<option>IF</option>
<option>SO</option>
<option>R1</option>
<option>R2</option>
<option>R3</option>
<option>R4</option>
<option>RR1 (Race-running 60 meter)</option>
<option>RR2 (Racerunning 100 meter)</option>
<option>S1</option>
<option>S2</option>
<option>S3</option>
<option>S4</option>

</select>
</div>
<div class="form-group form-check">
<p class="info">
Nedan väljer du vilka grenar deltagaren skall tävla i.
</p>
<ul class="list-group">
@foreach ($sports as $sport)
<li class="list-group-item">
<input type="checkbox" class="form-check-input" name="member[{{ $i }}][memberSports][]" value="{{ $sport->id }}">
<label for="member[{{ $i }}][memberSports]" class="form-check-label">{{ $sport->name }}</label>
</li>
@endforeach
</ul>
</div>
<div class="form-group">
<label for="member[{{ $i }}][photo]">Kan deltagaren fotograferas?</label>
<select class="form-control" name="member[{{ $i }}][photo]">
<option>Ja</option>
<option>Nej</option>
</select>
</div>
@endfor
<div class="alert alert-danger">
VIKTIGT!
Innan du trycker på knappen för att anmäla, kolla igenom alla fält noggrant så att uppgifterna stämmer!
</div>
<button type="submit" class="btn btn-primary">Anmäl alla deltagare</button>
</form> 
</div>

</x-app-layout>