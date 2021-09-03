<x-app-layout>
<x-slot name="header">
<h1 class="display-1">Anmäl deltagare
<img src="/Images/Logo.jpg" width="500" height="200" alt="Logotyp: Sveriges flagga (gult kors på blå botten) med texten Parasport/Västergötland i stora gula bokstäver.">

</h1>

</x-slot>
<div class="container">
@if($errors->any())
<div class="alert alert-danger" role="alert">
Något har blivit fel.
<br>
Kolla igenom alla fält så att allt är ifyllt på rätt sätt.
</div>
@endif
<form action="{{ route('member.create') }}" method="get">
@csrf
<p class="info">
Alla fält är obligatoriska.
</p>
<div class="form-group">
<label for="school">Skola:</label>
<input type="text" class="form-control" autocomplete="off" name="school" value="{{ old('school') }}" aria-required="true">
@error('school')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<div class="form-group">
<label for="city">Ort:</label>
<input type="text" class="form-control" autocomplete="off" name="city" value="{{ old('city') }}" aria-required="true">
@error('city')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<div class="form-group">
<label for="contactName">Kontaktpersonens namn:</label>
<input type="text" class="form-control" autocomplete="off" name="contactName" value="{{ old('contactName') }}" aria-required="true">
@error('contactName')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<div class="form-group">
<label for="contactPhone">Kontaktpersonens telefonnummer:</label>
<input type="text" class="form-control" autocomplete="off" name="contactPhone" value="{{ old('contactPhone') }}" aria-required="true">
@error('contactPhone')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<div class="form-group">
<label for="contactEmail">Kontaktpersonens E-post:</label>
<input type="text" class="form-control" autocomplete="off" name="contactEmail" value="{{ old('contactEmail') }}" aria-required="true">
@error('contactEmail')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<div class="form-group">
<label for="numberOfMembers">Hur många deltagare vill du anmäla?</label>
<input type="text" class="form-control" autocomplete="off" name="numberOfMembers" value="{{ old('numberOfMembers') }}" aria-required="true">
@error('numberOfMembers')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<button type="submit" class="btn btn-primary">Påbörja anmälningar</button>

</form>
</div>

</x-app-layout>