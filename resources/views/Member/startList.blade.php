<x-app-layout>
<x-slot name="header">
<h1 class="display-1">Ta fram startlista
<img src="/Images/Logo.jpg" width="500" height="200" alt="Logotyp: Sveriges flagga (gult kors på blå botten) med texten Parasport/Västergötland i stora gula bokstäver.">
</h1>
</x-slot>
<div class="container">
<p class="lead">
För vilken idrott vill du ta fram en startlista?
</p>
<form action="{{ route('member.show') }}" method="get">
@csrf
<div class="form-group">
<label for="selectedSport">Välj idrott:</label>
<select class="form-control" name="selectedSport">
@foreach($allSports as $sport)
<option value="{{ $sport->id }}">{{ $sport->name }}</option>
@endforeach
</select>
</div>
<button type="submit" class="btn btn-primary">Ta fram startlista</button>

</form>
</div>
</x-app-layout>