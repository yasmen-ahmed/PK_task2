<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{

    private function array_country_list(){
        return [
            'Afghanistan',
            'Albania',
            'Algeria',
            'Andorra',
            'Angola',
            'Antigua and Barbuda',
            'Argentina',
            'Armenia',
            'Australia',
            'Austria',
            'Azerbaijan',
            'Bahamas',
            'Bahrain',
            'Bangladesh',
            'Barbados',
            'Belarus',
            'Belgium',
            'Belize',
            'Benin',
            'Bhutan',
            'Bolivia',
            'Bosnia and Herzegovina',
            'Botswana',
            'Brazil',
            'Brunei',
            'Bulgaria',
            'Burkina Faso',
            'Burundi',
            'Cambodia',
            'Cameroon',
            'Canada'
        ];
    }


    private function getWeather($country)
    {
        $apiKey = '6ede5ae54d084f21ae6135156243105';
        $url = "http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$country}&aqi=no";

        $response = file_get_contents($url);
        return json_decode($response, true);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
        $query = Client::query();

        if ($request->filled('search')) {
            $query->where('full_name_en', 'like', '%' . $request->search . '%')
                  ->orWhere('full_name_ar', 'like', '%' . $request->search . '%')
                  ->orWhere('mobile', 'like', '%' . $request->search . '%');
        }

        $clients = $query->orderBy($request->get('sort', 'full_name_en'))
                         ->paginate(2);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = $this->array_country_list();
        return view('clients.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->full_name_en = $request->input('full_name_en');
        $client->full_name_ar = $request->input('full_name_ar');
        $client->user_name = $request->input('user_name');
        $client->email = $request->input('email');
        $client->mobile = $request->input('mobile');
        $client->country = $request->input('country');
        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    
    public function show(Client $client)
    {
        $weather = $this->getWeather($client->country);
        return view('clients.show', compact('client', 'weather'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $countries = $this->array_country_list();
        return view('clients.edit',compact('client', 'countries'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        $client->full_name_en = $request->input('full_name_en');
        $client->full_name_ar = $request->input('full_name_ar');
        $client->user_name = $request->input('user_name');
        $client->email = $request->input('email');
        $client->mobile = $request->input('mobile');
        $client->country = $request->input('country');
        $client->save();
        return redirect()->route('clients.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if($client){
            $client->delete();
            return redirect()->route('clients.index');
        

        }
        else {
            abort(404);
        }
    }



}