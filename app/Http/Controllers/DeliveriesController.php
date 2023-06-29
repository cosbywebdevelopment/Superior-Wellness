<?php

namespace App\Http\Controllers;

use App\Models\contacts\Contacts;
use Illuminate\Http\Request;

class DeliveriesController extends Controller
{
    public function index(){
        // find 3 random businesses and their address
        $numbers = range(1, 5);
        shuffle($numbers);
        $result = array_slice($numbers, 0, 3);
        $first = Contacts::findOrFail($result[0]);
        $second = Contacts::findOrFail($result[1]);
        $third = Contacts::findOrFail($result[2]);

        return view('deliveries.index', compact('first', 'second', 'third'));
    }
}
