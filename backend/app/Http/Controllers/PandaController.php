<?php

namespace App\Http\Controllers;

use App\Http\Resources\PandaResource;
use App\Models\Panda;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PandaController extends Controller
{
    public function index(Request $request) : JsonResource
    {
        $orderBy = $request->query("orderBy");
        $order = $request->query("order");
        $pandas = Panda::all();
        if ($orderBy != null){
            if($orderBy == "age"){
                if ($order == "asc")
                    $pandas->orderByDescending("birth");
                else if ($order == "desc") $pandas->orderBy("birth");
            }
            else if ($orderBy == "name"){
                if ($order == "asc")
                    $pandas->orderBy("name");
                else if ($order == "desc") $pandas->orderByDescending("name");
            }
        }
        return new PandaResource($pandas);
    }

    public function show(int $id) : JsonResource
    {
        return new PandaResource(Panda::findOrFail($id));
    }
}
