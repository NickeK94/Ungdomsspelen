<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use App\Models\Member;
use App\Models\Sport;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\PDF;
class MemberController extends Controller
{
public function choose()
{
    return view('Member.choose');
}
    public function create(Request $request)
    {
$request->validate([
    'school' => 'required',
    'city' => 'required',
    'contactName' => 'required',
    'contactPhone' => 'required',
    'contactEmail' => 'required|email',
    'numberOfMembers' => 'required|numeric'
  
]);
        $school = $request->school;
        $city = $request->city;
        $contactName = $request->contactName;
$contactPhone = $request->contactPhone;
$contactEmail = $request->contactEmail;
$numberOfMembers = $request->numberOfMembers;

        $sports = Sport::all();
        return view('Member.create', ['school' => $school, 'city' => $city, 'contactName' => $contactName, 'contactPhone' => $contactPhone, 'contactEmail' => $contactEmail, 'numberOfMembers' => $numberOfMembers], compact('sports'));
    }
    public function store(Request $request)
    {
$request->validate([
    'member.*.name' => 'required',
    'member.*.memberSports' => 'required'

    
]);
        foreach($request->member as $member)
    {
        $newMember = new Member([
        'name' => $member['name'],
        'gender' => $member['gender'],
        'school' => $member['school'],
        'stadium' => $member['stadium'],
        'city' => $member['city'],
        'contactName' => $member['contactName'],
        'contactPhone' => $member['contactPhone'],
        'contactEmail' => $member['contactEmail'],
        'class' => $member['class'],
        'photo' => $member['photo']
            
        ]);
        $newMember->save();
    
foreach($member['memberSports'] as $sport)        
{     
$newMember->sports()->attach($sport);
}        
    }
return redirect('/');
    }
    public function startList()
    {
        $allSports = Sport::all();
        return view('Member.startList', compact('allSports'));
        
    }
    public function showAll(Request $request)
    {
        $selectedSport = $request->selectedSport;
        $listMembers = Sport::find($selectedSport)->members;
        if($request->has('download'))
        {
$pdf = PDF::loadView('member.showAllAsPdf', $listMembers->toArray());
 return $pdf->download('Startlist.pdf');
        }
 
        return view('Member.showAll', compact('listMembers'));
    
    }

    
}
