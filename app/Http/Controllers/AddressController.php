<?php

namespace App\Http\Controllers;

use App\Address;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Return a list of all addresses.
     *
     * @return array
     */
    public function index(): array
    {
        return Address::with(['owners','cars'])->get()->toArray();
    }

    /**
     * Return a single address.
     *
     * @param Address $address
     * @return Address
     */
    public function show(int $addressId): Address
    {
        $address = Address::findOrFail($addressId);
        return $address->load(['owners','cars']);
    }

    /**
     * Store an address.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $address = Address::create($request->all());

        return response()->json($address, 201);
    }

    /**
     * Update an address.
     *
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function update(Request $request, Address $address): JsonResponse
    {
        $address->update($request->all());

        return response()->json($address, 200);
    }

    /**
     * Delete an address.
     *
     * @param Address $address
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json(null, 204);
    }

    public function details(){
        // against each address , cars average will be calculated
        return DB::select('select (select count(c.id) from cars c)/(select count(adrs.id) from addresses adrs) as car_avg_per_address from addresses a limit 1;');
    }

}
