<?php

namespace App\Http\Controllers\API;

use App\Services\LibraryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibraryController extends Controller
{
    public function __construct(
        protected LibraryService $libraryService
    ){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $library = $this->taskService->all();
        return response()->json([
            'success' => true,
            'data' => $library,
            'message' => 'All titles retrivied.'
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:144',
            'autor' => 'required|string|max:144',
            'status' => 'required|numeric'
        ]);

        $library = $this->libraryService->create($data);
        return response()->json([
            'success' => true,
            'data' => $library,
            'message' => 'Title created.'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $library = $this->libraryService->find($id);
        return response()->json([
            'success' => true,
            'data' => $library,
            'message' => 'Title found.'
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:144',
            'autor' => 'required|string|max:144',
            'status' => 'required|numeric'
        ]);

        $library = $this->libraryService->update($data, $id);
        return response()->json([
            'success' => true,
            'data' => $library,
            'message' => 'Title updated.'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->taskService->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
