<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuSelection;
use App\Models\ThemeSelection;
use App\Models\Reservation;
use App\Models\ReservationCustomize;
use App\Models\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function showForm($packageId)
    {
        // Fetch menu selections to populate dropdowns
        $menuSelections = [
            'pork' => Menu::where('menu_selection_id', 1)->where('status', 'active')->get(),
            'chicken' => Menu::where('menu_selection_id', 3)->where('status', 'active')->get(),
            'beef' => Menu::where('menu_selection_id', 2)->where('status', 'active')->get(),
            'fish' => Menu::where('menu_selection_id', 4)->where('status', 'active')->get(),
            'seafood' => Menu::where('menu_selection_id', 5)->where('status', 'active')->get(),
            'pasta' => Menu::where('menu_selection_id', 6)->where('status', 'active')->get(),
            'vegetable' => Menu::where('menu_selection_id', 7)->where('status', 'active')->get(),
            'dessert' => Menu::where('menu_selection_id', 8)->where('status', 'active')->get(),
            'drink' => Menu::where('menu_selection_id', 9)->where('status', 'active')->get(),

        ];

        $specificPackage = ServicePackage::findOrFail($packageId);
        $themeSelections = ThemeSelection::all();

        return view('user.reservations.premade', compact('menuSelections', 'specificPackage', 'themeSelections'));
    }

    public function submitForm(Request $request)
    {

        $request->validate([

            'celebrant_name' => 'required|string',
            'celebrant_age' => 'required|numeric|min:0',
            'event_theme' => 'required|string',
            'celebrant_gender' => 'required|in:Male,Female',
            'event_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->addDays(3)->toDateString(),
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('event_date', $request->input('event_date'));
                })],
            'event_time' => 'required|date_format:H:i',
            'venue_address' => 'required|string',
            'agree_terms' => 'required|boolean',
            'pork_menu' => 'required_without_all:beef_menu|exists:menus,id',
    'beef_menu' => 'required_without_all:pork_menu|exists:menus,id',
            'chicken_menu' => 'required|exists:menus,id',
            'fish_menu' => 'required|exists:menus,id',
            'seafood_menu' => 'required|exists:menus,id',
            'vegetable_menu' => 'required|exists:menus,id',
            'dessert_menu' => 'required|exists:menus,id',
            'drink_menu' => 'required|exists:menus,id',
            'pasta_menu' => 'required|exists:menus,id',
            'agree_terms' => 'required|accepted',
            'additional' => 'array',
            'additional.*' => Rule::in(['PartyEntertainers', 'PhotoBooth', 'Chocolate', 'Painting', 'Cupcake', 'Fruits']),
        ], [
            'pork_menu.required_without_all' => 'The pork menu field is required ',
            'beef_menu.required_without_all' => 'The beef menu field is required ',
            'agree_terms.accepted' => 'Please check the terms and conditions.',
            'agree_terms.required' => 'Please check the terms and conditions.',
        ]);

        $packageId = $request->input('selected_package');
        $additionalServices = implode(',', $request->input('additional'));

        $reservation = Auth::user()->reservations()->create([
            'celebrant_name' => $request->input('celebrant_name'),
            'celebrant_age' => $request->input('celebrant_age'),
            'event_theme' => $request->input('event_theme'),
            'celebrant_gender' => $request->input('celebrant_gender'),
            'event_date' => $request->input('event_date'),
            'event_time' => $request->input('event_time'),
            'venue_address' => $request->input('venue_address'),
            'agree_terms' => $request->input('agree_terms'),
            'pork_menu_id' => $request->input('pork_menu'),
            'beef_menu_id' => $request->input('beef_menu'),
            'chicken_menu_id' => $request->input('chicken_menu'),
            'fish_menu_id' => $request->input('fish_menu'),
            'seafood_menu_id' => $request->input('seafood_menu'),
            'veggies_menu_id' => $request->input('vegetable_menu'),
            'dessert_menu_id' => $request->input('dessert_menu'),
            'drink_menu_id' => $request->input('drink_menu'),
            'pasta_menu_id' => $request->input('pasta_menu'),
            'additional' => $additionalServices,

        ]);

        $reservation->selections()->create([
            'categoryName' => session('categoryName'),
            'choice' => 'premade',
        ]);

        $reservation->premades()->create([
            'package_id' => $packageId,
        ]);

        session()->forget(['categoryName']);

        // Redirect to the summary page
        return redirect()->route('user.reservations.p_summary', $reservation->id);
    }

    public function showSummary($reservationId)
    {
        $reservations = Reservation::with('premades.servicePackage', 'user', 'reservationCustomize', 'reservationSelection')->findOrFail($reservationId);

        return view('user.reservations.p_summary', compact('reservations'));
    }

    public function custom()
    {
        return view('user.reservations.custom_package');
    }

    public function showCustomize()
    {

        return view('user.reservations.customize-form');
    }

    public function showCustomizeStore(Request $request)
    {
        $request->validate([
            'budget' => ['required', 'numeric', 'min:17650', 'max:122500'],
            'pax' => ['required', 'numeric', 'min:50', 'max:350'],

        ]);

        $themeSelections = ThemeSelection::all();
    
        session()->put('budget', $request->input('budget'));
        session()->put('pax', $request->input('pax'));

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

        return view('user.reservations.form', compact('menus', 'themeSelections'));
    }

    public function showCustomizeForm(Request $request)
    {
        $menus = $this->getMenus();
        $pax = session('pax'); // Providing a default value of 0 if 'pax' is not set
    $budget = session('budget'); // Providing a default value of 0 if 'budget' is not set

    $themeSelections = ThemeSelection::all();
    
        return view('user.reservations.form', compact('menus', 'pax', 'budget', 'themeSelections'));
    }

    public function submitCustomizeForm(Request $request)
    {
        $request->validate([

            'celebrant_name' => 'required|string',
            'celebrant_age' => 'required|numeric|min:0',
            'event_theme' => 'required|string',
            'celebrant_gender' => 'required|in:Male,Female',
            'event_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->addDays(4)->toDateString(),
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('event_date', $request->input('event_date'));
                })],
            'event_time' => 'required|date_format:H:i',
            'venue_address' => 'required|string',
            'agree_terms' => 'required|boolean',
            'pork_menu' => 'required_without_all:beef_menu|exists:menus,id',
            'beef_menu' => 'required_without_all:pork_menu|exists:menus,id',
            'chicken_menu' => 'required_without_all:fish_menu|exists:menus,id',
            'fish_menu' => 'required_without_all:chicken_menu|exists:menus,id',
            'seafood_menu' => 'required|exists:menus,id',
            'vegetable_menu' => 'required|exists:menus,id',
            'dessert_menu' => 'required|exists:menus,id',
            'drink_menu' => 'required|exists:menus,id',
            'pasta_menu' => 'required|exists:menus,id',
            'agree_terms' => 'required|accepted',
            'additional' => 'array',
            'additional.*' => Rule::in(['PartyEntertainers', 'PhotoBooth', 'Chocolate', 'Painting', 'Cupcake', 'Fruits']),
        ], [
            'pork_menu.required_without_all' => 'The pork menu field is required ',
            'beef_menu.required_without_all' => 'The beef menu field is required ',
            'chicken_menu.required_without_all' => 'The chicken menu field is required ',
            'fish_menu.required_without_all' => 'The fish menu field is required ',
            'agree_terms.accepted' => 'Please check the terms and conditions.',
            'agree_terms.required' => 'Please check the terms and conditions.',
        ]);

        $additionalServices = implode(' , ', $request->input('additional'));

        $reservation = Auth::user()->reservations()->create([
            'celebrant_name' => $request->input('celebrant_name'),
            'celebrant_age' => $request->input('celebrant_age'),
            'event_theme' => $request->input('event_theme'),
            'celebrant_gender' => $request->input('celebrant_gender'),
            'event_date' => $request->input('event_date'),
            'event_time' => $request->input('event_time'),
            'venue_address' => $request->input('venue_address'),
            'agree_terms' => $request->input('agree_terms'),
            'pork_menu_id' => $request->input('pork_menu'),
            'beef_menu_id' => $request->input('beef_menu'),
            'chicken_menu_id' => $request->input('chicken_menu'),
            'fish_menu_id' => $request->input('fish_menu'),
            'seafood_menu_id' => $request->input('seafood_menu'),
            'veggies_menu_id' => $request->input('vegetable_menu'),
            'dessert_menu_id' => $request->input('dessert_menu'),
            'drink_menu_id' => $request->input('drink_menu'),
            'pasta_menu_id' => $request->input('pasta_menu'),
            'additional' => $additionalServices,
        ]);

        $reservation->selections()->create([
            'categoryName' => session('categoryName'),
            'choice' => 'customize',
        ]);

        $reservationCustomize = new ReservationCustomize([
            'pax' => session('pax'),
            'price' => session('budget'),
        ]);

        $reservation->reservationCustomize()->save($reservationCustomize);

        session()->forget(['budget', 'pax', 'categoryName']);

        // Redirect to the summary page
        return redirect()->route('user.reservations.p_summary', $reservation->id);
    }

    // public function showSummaryCustomize($reservationId)
    // {
    //     $reservations = Reservation::with('user', 'reservationCustomize', 'reservationSelection')->findOrFail($reservationId);

    //     return view('user.reservations.custom_summary', compact('reservations'));
    // }

    private function getMenus()
    {
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

        return $menus;
    }

    public function checkDateAvailability(Request $request)
{
    $selectedDate = $request->input('event_date');
    $existingReservation = Reservation::where('event_date', $selectedDate)->exists();

    return response()->json(['available' => !$existingReservation]);
}

}
