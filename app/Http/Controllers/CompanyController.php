<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(CompanyResource::collection(Company::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $company = Company::create($request->safe()->all());

        return response()
            ->json(CompanyResource::make($company));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Company $company): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json(CompanyResource::make($company));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company): \Illuminate\Http\JsonResponse
    {
        $company->update($request->safe()->all());

        return response()
            ->json(CompanyResource::make($company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company): \Illuminate\Http\Response
    {
        $company->delete();

        return response()
            ->noContent();
    }
}
