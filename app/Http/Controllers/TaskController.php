<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user:id,name,email')->get(); // Récupère les tâches avec les infos de l'utilisateur

        return response()->json($tasks, Response::HTTP_OK);
        //return response()->json(Task::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {

        // Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'echeance_date' => 'required|date|after_or_equal:today',
            'completed' => 'boolean',
        ], [
            'title.required' => 'Le titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne peut pas dépasser 50 caractères.',
            'echeance_date.required' => 'La date d\'échéance est obligatoire.',
            'echeance_date.date' => 'La date d\'échéance doit être une date valide.',
            'echeance_date.after_or_equal' => 'La date d\'échéance ne peut pas être dans le passé.',
            'completed.boolean' => 'Le champ "complété" doit être un booléen.',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'echeance_date' => $validated['echeance_date'],
            'completed' => $validated['completed'] ?? false,
            'user_id' => Auth::id(),
            //'user_id' => auth()->id(),
        ]);

        return response()->json($task, Response::HTTP_CREATED);
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $task->update($request->all());

        return response()->json($task, Response::HTTP_OK);
    }


    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
