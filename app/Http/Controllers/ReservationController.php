<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showNonValidReservations()
    {
        $nonValidReservations = Reservation::where('status', 'non valid')->get();
        return view('organisation.reservation', ['reservations' => $nonValidReservations]);
    }

    public function confirmReservation($reserveId)
    {
        // Trouver la réservation par son ID
        $reservation = Reservation::findOrFail($reserveId);
        
        // Mettre à jour le statut de validation de la réservation
        $reservation->update(['status' => 'valid']);
        
        // Mettre à jour le nombre de places disponibles dans la table des événements
        $event = Event::findOrFail($reservation->event_id);
        $event->available_places -= 1;
        $event->save();
        
        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Réservation confirmée avec succès.');
    }
    
    
}
