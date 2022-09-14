<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(AddressResource::collection(Address::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAddressRequest $request): \Illuminate\Http\JsonResponse
    {
        $address = Address::create($request->safe()->all());

        return response()
            ->json(AddressResource::make($address));
    }

    /**
     * Display the specified resource.
     *
     * @param Address $address
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Address $address): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(AddressResource::make($address));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAddressRequest $request
     * @param Address $address
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAddressRequest $request, Address $address): \Illuminate\Http\JsonResponse
    {
        $address->update($request->safe()->all());

        return response()
            ->json(AddressResource::make($address));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address): \Illuminate\Http\Response
    {
        $address->delete();

        return response()
            ->noContent();
    }
}
