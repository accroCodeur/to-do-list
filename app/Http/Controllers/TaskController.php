<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Get a list of all task
    public function getAll(){
        //try{
            $tasks = Task::orderBy('created_at', 'DESC')->get();
            return new JsonResponse(['success' => true, 'tasks' => $tasks], 200);
        // }catch(Exception $e){
        //      return new JsonResponse(['success' => false,'message' => 'error during processing'], 500);
        // }

    }

    // Store one task
    public function store(Request $request){
        $this->validate(
            $request,
            [
                'todo_item' => 'required|string', //regex:/^[a-zA-Zé]+$/i',
                'due_date' => 'required|date',
            ],
            [
                'todo_item' => "Le libelle de la tache doit être renseigné",
                'due_date.date' => "La date limite d'exonération est incorrecte.",
                'due_date.date_format' => "La date limite d'exonération doit être sous le format : Année Mois Jour.",
            ],
        );
    }
}
