<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuSelection;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{

    public function showReservationStatus($status)
    {
        $categories = MenuSelection::all();
        $reservation_categories = Reservation::all();
        
        if ($status === 'all') {
            $allReservations = Reservation::all();
        } else if ($status === 'pending' or $status === 'approved') {
            $allReservations = ($status === 'pending') ? Reservation::where('reservation_status', 'pending')->get() : Reservation::where('reservation_status', 'approve')->get();
        } else if ($status === 'incoming' ){
            $allReservations = Reservation::where('event_date', '>=', Carbon::today())->get();
        } else if ($status === 'history') {
            $allReservations = Reservation::where('event_date', '<', Carbon::today())->get();
        } else {
            return abort(404);
        }
    
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
    
        $menus = [];
        $menus['beef'] = MenuSelection::where('menu_category', 'beef')->first()->menus;
        $menus['pork'] = MenuSelection::where('menu_category', 'pork')->first()->menus;
        $menus['chicken'] = MenuSelection::where('menu_category', 'chicken')->first()->menus;
        $menus['fish'] = MenuSelection::where('menu_category', 'fish')->first()->menus;
        $menus['seafood'] = MenuSelection::where('menu_category', 'seafood')->first()->menus;
        $menus['pasta'] = MenuSelection::where('menu_category', 'pasta')->first()->menus;
        $menus['vegetable'] = MenuSelection::where('menu_category', 'vegetables')->first()->menus;
        $menus['dessert'] = MenuSelection::where('menu_category', 'desserts')->first()->menus;
        $menus['drink'] = MenuSelection::where('menu_category', 'drinks')->first()->menus;
    
        return view('admin.reservation.index', compact('categories', 'events', 'menus', 'reservation_categories', 'status'));
    }



    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservations = Reservation::findOrFail($id);

        $request->validate([

            'celebrant_name' => 'required|string',
            'celebrant_age' => 'required|numeric|min:0',
            'event_theme' => 'required|string',
            'celebrant_gender' => 'required|in:Male,Female',
            'event_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->addDays(7)->toDateString(),
                Rule::unique('reservations')->ignore($request->route('reservation'), 'id')
                    ->where(function ($query) use ($request) {
                        return $query->where('event_date', '!=', $request->input('event_date'));
                    }),
            ],
            'event_time' => 'required',
            'venue_address' => 'required|string',
            'pork_menu' => 'exists:menus,id',
            'beef_menu' => 'exists:menus,id',
            'chicken_menu' => 'exists:menus,id',
            'fish_menu' => 'exists:menus,id',
            'seafood_menu' => 'required|exists:menus,id',
            'vegetable_menu' => 'required|exists:menus,id',
            'dessert_menu' => 'required|exists:menus,id',
            'drink_menu' => 'required|exists:menus,id',
            'pasta_menu' => 'required|exists:menus,id',

        ]);

        $reservations->update([
            'celebrant_name' => $request->input('celebrant_name'),
            'celebrant_age' => $request->input('celebrant_age'),
            'event_theme' => $request->input('event_theme'),
            'celebrant_gender' => $request->input('celebrant_gender'),
            'event_date' => $request->input('event_date'),
            'event_time' => $request->input('event_time'),
            'venue_address' => $request->input('venue_address'),
            'pork_menu_id' => $request->input('pork_menu'),
            'beef_menu_id' => $request->input('beef_menu'),
            'chicken_menu_id' => $request->input('chicken_menu'),
            'fish_menu_id' => $request->input('fish_menu'),
            'seafood_menu_id' => $request->input('seafood_menu'),
            'veggies_menu_id' => $request->input('vegetable_menu'),
            'dessert_menu_id' => $request->input('dessert_menu'),
            'drink_menu_id' => $request->input('drink_menu'),
            'pasta_menu_id' => $request->input('pasta_menu'),

        ]);

        $reservations->selections()->update([
            'categoryName' => $request->input('categoryName'),
            'choice' => 'customize',
        ]);

        $reservations->reservationCustomize()->update([
            'pax' => $request->input('pax'),
            'price' => $request->input('price'),
        ]);

        return redirect()->back()->with('success', 'Reservation details updated successfully!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Delete the menu item
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully!');
    }
}
