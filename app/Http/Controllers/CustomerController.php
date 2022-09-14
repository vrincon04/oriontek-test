<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(CustomerResource::collection(Customer::all()));
    }

    /**
     * @param StoreCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCustomerRequest $request): \Illuminate\Http\JsonResponse
    {
        $customer = Customer::create($request->safe()->all());

        return response()
            ->json(CustomerResource::make($customer));
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Customer $customer): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(CustomerResource::make($customer));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerRequest $request
     * @param Customer $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): \Illuminate\Http\JsonResponse
    {
        $customer->update($request->safe()->all());

        return response()
            ->json(CustomerResource::make($customer));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()
            ->noContent();
    }
}
