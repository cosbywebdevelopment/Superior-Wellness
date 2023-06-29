<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactsRequest;
use App\Http\Requests\UpdateContactsRequest;
use App\Models\contacts\BusinessAddresses;
use App\Models\contacts\Contacts;
use Illuminate\Routing\Route;
use function PHPUnit\Framework\isNull;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Contacts $contacts)
    {
        $addresses = $contacts->addresses;
        return view('contacts.create', compact('contacts','addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactsRequest $request, Contacts $contacts)
    {
        $request->validated();
        // If validation is successful persist to the DB
        $contacts->addresses()->create($request->all());
        return redirect()->route('contacts.show', ['contacts' => $contacts])->with('status', 'All saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacts $contacts)
    {
        $addresses = $contacts->addresses;
        return view('contacts.show', compact('contacts', 'addresses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacts $contacts)
    {
        $addresses = $contacts->addresses;
        return view('contacts.edit', compact('contacts', 'addresses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactsRequest $request, Contacts $contacts)
    {
        // verify all data and then persist to DB if not redirect->back
        $request->validated();
        // If validation is successful persist to the DB
        $contacts->update($request->all());
        $addresses = $contacts->addresses()->get();
        $ids = $addresses->pluck('id');
        $count = 0;
        foreach ($ids as $value) {
            $data = [
                'address'=>$request->address[$value],
                'billing'=>$request->billing[$value],
                'shipping'=>$request->shipping[$value],
            ];
            // see if there is more than one shipping address
            if($request->shipping[$value] === "1")
            {
                $count ++;
                if($count > 1){
                    return redirect()->back()->with('addresses', 'Only one address is allowed for shipping!');
                }
            }
            BusinessAddresses::where('id',$value)
                ->update($data);
        }
        return redirect()->route('contacts.show', ['contacts' => $contacts])->with('status', 'All saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
