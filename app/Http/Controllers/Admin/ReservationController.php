<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Carbon;

use App\Models\MenuSelection;

class ReservationController extends Controller
{
    public function index()
    {
        $categories = MenuSelection::all();
        $allReservations = Reservation::all();
        $events = [];

        foreach ($allReservations as $reservation) {
            $event = [
                'id' => $reservation->id,
                'title' => $reservation->celebrant_name,
                'start' => Carbon::parse($reservation->event_date . ' ' . $reservation->event_time)->format('Y-m-d H:i:s'),

                'name' => $reservation->user->name,
                'email' => $reservation->user->email,
                'contact_number' => $reservation->user->contact_number,
                'event_date' => Carbon::parse($reservation->event_date)->format('Y-m-d'),
                'event_time' => Carbon::parse($reservation->event_time)->format('H:i:s'),
                'venue_address' => $reservation->venue_address,

                'celebrant_name' => $reservation->celebrant_name,
                'celebrant_age' => $reservation->celebrant_age,
                'celebrant_gender' => $reservation->celebrant_gender,
                'event_theme' => $reservation->event_theme,
                'call_status' => $reservation->call_status,
                'reservation_status' => $reservation->reservation_status,

                'beef_menu' => $reservation->getMenuName('beefMenu'),
                'pork_menu' => $reservation->getMenuName('porkMenu'),
                'chicken_menu' => $reservation->getMenuName('chickenMenu'),
                'fish_menu' => $reservation->getMenuName('fishMenu'),
                'seafood_menu' => $reservation->getMenuName('seafoodMenu'),
                'vegetable_menu' => $reservation->getMenuName('vegetableMenu'),
                'pasta_menu' => $reservation->getMenuName('pastaMenu'),
                'dessert_menu' => $reservation->getMenuName('dessertMenu'),
                'drink_menu' => $reservation->getMenuName('drinkMenu'),

                'choice' => optional($reservation->reservationSelection)->choice,
                'service_category' => optional($reservation->premades)->servicePackage
                    ? $reservation->premades->servicePackage->serviceSelection->services_category
                    : null,
                'category_name' => optional($reservation->reservationSelection)->categoryName,
                'premade_pax' => optional($reservation->premades)->servicePackage
                    ? $reservation->premades->servicePackage->pax
                    : null,
                'customize_pax' => optional($reservation->reservationCustomize)->price
                    ? number_format(floor($reservation->reservationCustomize->price / 350))
                    : null,
                'premade_price' => optional($reservation->premades)->servicePackage
                ? $reservation->premades->servicePackage->price
                : null,
                'customize_price' => optional($reservation->reservationCustomize)->price
                ? $reservation->reservationCustomize->price
                : null,
                'premade_package' => optional($reservation->premades)->servicePackage
                    ? $reservation->premades->servicePackage->name
                    : null,

            ];

            $events[] = $event;
        }

        return view('admin.reservation.index',compact('categories', 'events'));
    }
}
