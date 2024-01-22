<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Actions\DeleteBookAction;

class DeleteBookController extends Controller
{
    public function __invoke(Request $request, DeleteBookAction $deleteBookAction): JsonResponse
    {
        $bookId = $request->route('id');
        $deleteBookAction->run($bookId);

        return response()->json(['success' => 'Book deleted successfully']);
    }
}
