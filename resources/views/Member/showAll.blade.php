<x-app-layout>
<x-slot name="header">
<h1 class="display-1">Startlista
<img src="/Images/Logo.jpg" width="500" height="200" alt="Logotyp: Sveriges flagga (gult kors på blå botten) med texten Parasport/Västergötland i stora gula bokstäver.">
</h1>
</x-slot>
<div class="container">
@if($listMembers->count() > 0)
<table class="table">
<thead>
<tr>
<th scope="col">Startnummer</th>
<th scope="col">Namn</th>
<th scope="col">Skola</th>
<th scope="col">Foto</th>

</tr>
</thead>
<tbody>
@foreach($listMembers as $member)
<tr>
<th scope="row">{{ $member->id }}</th>
<td>{{ $member->name }}</td>
<td>{{ $member->school }}</td>
@if($member->photo == "Ja")
<td>Kan fotograferas</td>
@else
<td>Kan ej fotograferas</td>
@endif
</tr>
@endforeach
</tbody>
</table>
@else
<p class="info">
Inga deltagare kunde hittas som tävlar i vald gren.
</p>
@endif
</div>
</x-app-layout>