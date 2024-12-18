<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePandaRequest;
use App\Http\Resources\PandaResource;
use App\Models\Panda;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class PandaController extends Controller
{
    public function index(Request $request) : JsonResource
    {
        $orderBy = $request->query("orderBy");
        $order = $request->query("order");
        $pandas = Panda::query();
        if ($orderBy != null){
            if($orderBy == "age"){
                if ($order == "asc")
                    $pandas->orderByDesc("birth");
                else if ($order == "desc") $pandas->orderBy("birth");
            }
            else if ($orderBy == "name"){
                if ($order == "asc")
                    $pandas->orderBy("name");
                else if ($order == "desc") $pandas->orderByDesc("name");
            }
        }
        return PandaResource::collection($pandas->get());
    }

    public function show(int $id) : JsonResource
    {
        return new PandaResource(Panda::findOrFail($id));
    }

    public function store(StorePandaRequest $request) : JsonResource
    {
        return new PandaResource(Panda::create($request->validated()));
    }

    public function destroy(int $id) : Response
    {
        if (Panda::findOrFail($id)->delete())
            return response()->noContent();
        return abort(500);
    }
}
