<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummernoteController extends Controller
{
    public function edit(Request $request)
    {
        $id = $request->id;
        $modelClass = $request->model;
        $column = $request->nameOfColumn;
        $content = $request->summernoteContent;

        $modelInstance = $modelClass::find($id);

        try {
            DB::beginTransaction();

            $modelInstance->update([
                $column => $content,
            ]);

            DB::commit();

            return redirect()->back();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
