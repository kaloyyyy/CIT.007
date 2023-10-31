<?php

namespace App\Http\Controllers;
use App\Models\Item; // Import your Item model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    //
    // app/Http/Controllers/ItemController.php



    public function destroy(Request $request)
    {
        $id = $request->only('itemId');
        $result = DB::table('items')->where('itemId', $id)->delete();
    }
    
}
