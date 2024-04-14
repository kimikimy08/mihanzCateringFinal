<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ReservationApprovedMail;
use App\Mail\ReservationDeclinedMail;
use App\Models\CallStatus;
use App\Models\MenuSelection;
use App\Models\AdditionalSelection;
use App\Models\Reservation;
use App\Models\ReservationSelection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
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
            $allReservations = ($status === 'pending') ? Reservation::where('reservation_status', 'pending')->get() : Reservation::where('reservation_status', 'approved')->get();
        } else if ($status === 'incoming') {
            $allReservations = Reservation::where('event_date', '>=', Carbon::today())->get();
        } else if ($status === 'history') {
            $allReservations = Reservation::where('event_date', '<', Carbon::today())->orWhere('reservation_status', 'decline')->get();
        } else {
            return abort(404);
        }

        $events = [];
        foreach ($allReservations as $reservation) {
            $event = [
                'id' => $reservation->id,
                'title' => $reservation->celebrant_name,
                'start' => Carbon::parse($reservation->event_date . ' ' . $reservation->event_time)->format('Y-m-d H:i:s'),

                'name' => $reservation->user->first_name . ' ' . $reservation->user->last_name,
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
                'allergies' => $reservation->allergies,
                'special' => $reservation->special,
                'other' => $reservation->other,

                'beef_menu' => $reservation->getMenuName('beefMenu'),
                'pork_menu' => $reservation->getMenuName('porkMenu'),
                'chicken_menu' => $reservation->getMenuName('chickenMenu'),
                'fish_menu' => $reservation->getMenuName('fishMenu'),
                'seafood_menu' => $reservation->getMenuName('seafoodMenu'),
                'vegetable_menu' => $reservation->getMenuName('vegetableMenu'),
                'pasta_menu' => $reservation->getMenuName('pastaMenu'),
                'dessert_menu' => $reservation->getMenuName('dessertMenu'),
                'drink_menu' => $reservation->getMenuName('drinkMenu'),

                'pe_menu' => $reservation->getAdditionalName('peMenu'),
                'pe_price' => $reservation->getAdditionalPrice('peMenu'),

                'pb_menu' => $reservation->getAdditionalName('pbMenu'),
                'pb_price' => $reservation->getAdditionalPrice('pbMenu'),

                'cf_menu' => $reservation->getAdditionalName('cfMenu'),
                'cf_price' => $reservation->getAdditionalPrice('cfMenu'),

                'fp_menu' => $reservation->getAdditionalName('fpMenu'),
                'fp_price' => $reservation->getAdditionalPrice('fpMenu'),

                'ct_menu' => $reservation->getAdditionalName('ctMenu'),
                'ct_price' => $reservation->getAdditionalPrice('ctMenu'),

                'f_menu' => $reservation->getAdditionalName('fMenu'),
                'f_price' => $reservation->getAdditionalPrice('fMenu'),

                'choice' => optional($reservation->reservationSelection)->choice,
                'service_category' => optional($reservation->premades)->servicePackage
                ? $reservation->premades->servicePackage->serviceSelection->services_category
                : null,
                'category_name' => optional($reservation->reservationSelection)->categoryName,
                'premade_pax' => optional($reservation->premades)->servicePackage
                ? $reservation->premades->servicePackage->pax
                : null,
                'customize_pax' => optional($reservation->reservationCustomize)->price
                ? number_format($reservation->reservationCustomize->pax)
                : null,
                'customize_option' => optional($reservation->reservationCustomize)->option
                ? $reservation->reservationCustomize->option
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
        $menus['beef'] = MenuSelection::where('menu_category', 'beef')->first()->menus()->where('status', 'active')->get();
$menus['pork'] = MenuSelection::where('menu_category', 'pork')->first()->menus()->where('status', 'active')->get();
$menus['chicken'] = MenuSelection::where('menu_category', 'chicken')->first()->menus()->where('status', 'active')->get();
$menus['fish'] = MenuSelection::where('menu_category', 'fish')->first()->menus()->where('status', 'active')->get();
$menus['seafood'] = MenuSelection::where('menu_category', 'seafood')->first()->menus()->where('status', 'active')->get();
$menus['pasta'] = MenuSelection::where('menu_category', 'pasta')->first()->menus()->where('status', 'active')->get();
$menus['vegetable'] = MenuSelection::where('menu_category', 'vegetables')->first()->menus()->where('status', 'active')->get();
$menus['dessert'] = MenuSelection::where('menu_category', 'desserts')->first()->menus()->where('status', 'active')->get();
$menus['drink'] = MenuSelection::where('menu_category', 'drinks')->first()->menus()->where('status', 'active')->get();

$additionals = [];
$additionals['pe'] = AdditionalSelection::where('additional_category', 'Party Entertainers')->first()->additionals()->get();
$additionals['pb'] = AdditionalSelection::where('additional_category', 'Photo booth')->first()->additionals()->get();
$additionals['cf'] = AdditionalSelection::where('additional_category', 'Chocolate Fountain')->first()->additionals()->get();
$additionals['fp'] = AdditionalSelection::where('additional_category', 'Face Painting Booth')->first()->additionals()->get();
$additionals['ct'] = AdditionalSelection::where('additional_category', 'Cupcake tower booth ')->first()->additionals()->get();
$additionals['f'] = AdditionalSelection::where('additional_category', 'Assorted Fruits Booth')->first()->additionals()->get();





        return view('admin.reservation.index', compact('categories', 'events', 'menus', 'reservation_categories', 'status', 'additionals'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $user = $reservation->user;
        $reservationSelection = ReservationSelection::where('reservation_id', $id)->first();

        $request->validate([
            'celebrant_name' => 'required|string',
            'celebrant_age' => 'required|numeric|min:0',
            'event_theme' => 'required|string',
            'celebrant_gender' => 'required|in:Male,Female',
            'event_date' => [
                'required',
                'date',
                Rule::unique('reservations')->ignore($request->route('reservation'), 'id')
                    ->where(function ($query) use ($request) {
                        return $query->where('event_date', '!=', $request->input('event_date'));
                    }),
            ],
            'event_time' => 'required',
            'venue_address' => 'required|string',
            'pork_menu' => 'nullable|required_without:beef_menu|exists:menus,id',
    'beef_menu' => 'nullable|required_without:pork_menu|exists:menus,id',
            'chicken_menu' => 'nullable|required_without_all:fish_menu|exists:menus,id',
            'fish_menu' => 'nullable|required_without_all:chicken_menu|exists:menus,id',
            'seafood_menu' => 'required|exists:menus,id',
            'vegetable_menu' => 'required|exists:menus,id',
            'dessert_menu' => 'required|exists:menus,id',
            'drink_menu' => 'required|exists:menus,id',
            'pasta_menu' => 'required|exists:menus,id',
            'reservation_status' => 'required',

            'pe_menu' => 'nullable|exists:additionals,id',
            'pb_menu' => 'nullable|exists:additionals,id',
            'cf_menu' => 'nullable|exists:additionals,id',
            'fp_menu' => 'nullable|exists:additionals,id',
            'ct_menu' => 'nullable|exists:additionals,id',
            'f_menu' => 'nullable|exists:additionals,id',

            'allergies' => 'nullable',
            'special' => 'nullable',
            'other' => 'nullable',
        ]);

        $reservation->update([
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
            'reservation_status' => $request->input('reservation_status'),

            'pe_menu_id' => $request->input('pe_menu'),
            'pb_menu_id' => $request->input('pb_menu'),
            'cf_menu_id' => $request->input('cf_menu'),
            'fp_menu_id' => $request->input('fp_menu'),
            'ct_menu_id' => $request->input('ct_menu'),
            'f_menu_id' => $request->input('f_menu'),

            'allergies' => $request->input('allergies'),
            'special' => $request->input('special'),
            'other' => $request->input('other'),
            'total_amount' => 0
        ]);

        // Check if 'reservation_status' was changed
        if ($reservation->wasChanged('reservation_status')) {
            // Send notification based on the new status
            $newStatus = $reservation->reservation_status;

            if ($newStatus === 'Approved') {
                // Send approval email
                Mail::to($user->email)->send(new ReservationApprovedMail($user, $reservation));
            } else if ($newStatus === 'Decline') {
                Mail::to($user->email)->send(new ReservationDeclinedMail($user, $reservation));
            }
        } else {
            // Log if the reservation status is not updated
            info('Reservation status not updated.');
        }

        if ($reservationSelection) {
            $choice = $reservationSelection->choice;

            if ($choice === 'customize') {
                $reservation->reservationCustomize()->update([
                    'pax' => $request->input('premade_pax'),
                    'price' => $request->input('premade_price'),
                ]);
            } elseif ($choice === 'premade') {
                $reservation->selections()->update([
                    'categoryName' => $request->input('categoryName'),
                ]);
            }

            
        } else {
            // Handle the case when no reservation selection is found
        }

        return redirect()->back()->with('success', 'Reservation details updated successfully!');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Delete the menu item
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully!');
    }

    public function indexCallStatus($id)
    {
        $status = 'all';
        $categories = MenuSelection::all();
        $reservation = Reservation::findOrFail($id);
        $callStatuses = $reservation->callStatus()->orderBy('call_status_date', 'desc')->get();

        return view('admin.reservation.call.index', compact('reservation', 'callStatuses', 'status', 'categories'));
    }

    public function addCallStatus($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.add_call_status', compact('reservation'));
    }

    public function storeCallStatus(Request $request, $id)
    {
        $request->validate([
            'call_status_date' => 'required|date',
            'call_status_time' => 'required|date_format:H:i',
            'call_status' => 'required|in:Waiting,Contacted,Approved,Canceled',
            'call_remarks' => 'nullable|string',
        ]);

        // The $id parameter is already the reservation_id
        $reservation = Reservation::findOrFail($id);

        $call = new CallStatus([
            'call_status_date' => $request->input('call_status_date'),
            'call_status_time' => $request->input('call_status_time'),
            'call_status' => $request->input('call_status'),
            'call_remarks' => $request->input('call_remarks'),
        ]);

        $reservation->callStatus()->save($call);

        return redirect()->route('call-status.index', $id)->with('success', 'Call status added successfully.');
    }
}
