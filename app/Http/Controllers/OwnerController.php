<?php

namespace App\Http\Controllers;

use App\Owner;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    /**
     * Return a list of all owners.
     *
     * @return array
     */
    public function index(): array
    {
        return Owner::with(['addresses','cars'])->get()->toArray();
    }

    /**
     * Return a single owner.
     *
     * @param Owner $owner
     * @return Owner
     */
    public function show(int $ownerId): Owner
    {
        $owner = Owner::findOrFail($ownerId);
        //$owner->load(['addresses' , 'cars']);
        return $owner->load(['addresses' , 'cars']);
    }

    /**
     * Store an owner.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $owner = Owner::create($request->all());

        return response()->json($owner, 201);
    }

    /**
     * Update an owner.
     *
     * @param Request $request
     * @param Owner $owner
     * @return JsonResponse
     */
    public function update(Request $request, Owner $owner): JsonResponse
    {
        $owner->update($request->except('id'));

        return response()->json($owner, 200);
    }

    /**
     * Delete an owner.
     *
     * @param Owner $owner
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Owner $owner): JsonResponse
    {
        $owner->delete();
        return response()->json(null, 204);
    }

    public function details(){
        // against each owner , cars and addresses average will be calculated
        return DB::select('select (select count(c.id) from cars c)/(select count(os.id) from owners os) as cars_avg_per_user  , (select count(addr.id) from addresses addr)/(select count(oss.id) from owners oss) as addresses_avg_per_user from owners o limit 1;');
    }

}
