<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    public function index()
    {
        $projects = Project::with(['projectable'])->get();

        return view('admin.images.index', compact(['projects']));
    }

    public function editImages($type, Project $project)
    {
        return view('admin.images.edit', compact(['type', 'project']));
    }

    public function deleteAllImages(Project $project)
    {
        $folderPath = public_path('storage/'.$project->folder_path);

        try {
            DB::beginTransaction();

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            foreach ($project->projectable->pastProjectImages as $image) {
                $image->delete();
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Images deleted successfully']);

        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(['success' => false, 'message' => 'Error deleting images', 'error' => $th->getMessage()], 500);
        }

    }
}