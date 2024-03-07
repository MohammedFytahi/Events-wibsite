<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
  public function index(){
    return view('admin.dashboard');
  }
  public function events(Request $request)
  {
      $events = Event::paginate(10); 
      $categories=Category::all();
      return view('admin.events', compact('events','categories'));
  }
 

public function getUsersExceptAdmin()
{
    // Query all users except those with the role "admin"
    $users = User::where('role', '!=', 'admin')->get();

    // Pass the users data to the view
    return view('admin.dashboard')->with('users', $users);
}
public function blockUser($userId)
{
    $user = User::findOrFail($userId);
    $user->status = 'blocked';
    $user->save();

    return redirect()->back()->with('success', 'User blocked successfully');
}

public function unblockUser($userId)
{
    $user = User::findOrFail($userId);
    $user->status = 'active';
    $user->save();

    return redirect()->back()->with('success', 'User unblocked successfully');
}
public function confirmEvent($eventId)
{
    // Trouver l'événement par son ID
    $event = Event::findOrFail($eventId);

    // Mettre à jour le statut de validation de l'événement
    $event->update(['validated' => 1]);

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Événement confirmé avec succès.');
}

}
