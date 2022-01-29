<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //Get a list of all task
    public function getAll(){
        try{
            $tasks = Task::orderBy('created_at', 'DESC')->get();
            return new JsonResponse(['success' => true, 'body'=> ['tasks' => $tasks]], 200);
        }catch(Exception $e){
             return new JsonResponse(['success' => false,'message' => 'error during processing'], 500);
        }

    }

    // Store one task
    public function store(Request $request){

        try{
            $this->validate(
                $request,
                [
                    'wording' => 'required|string', //regex:/^[a-zA-Zé]+$/i',
                    'due_date' => 'required|date_format:d/m/Y H:i:s',
                ],
                [
                    'wording' => "Le libelle de la tache doit être renseigné",
                    'due_date.date' => "La date est manquante.",
                    'due_date.date_format' => "La date  n'est pas sous le format.",
                ],
            );

            $dateTime = Carbon::createFromFormat('d/m/Y H:i:s', $request->due_date);

            $task = new Task();
            $task->todo_item = trim($request->wording);
            $task->due_date = $dateTime;
            $task->save();

            return new JsonResponse(['success' => true, 'message' => 'the task was created with success']);

        }catch(Exception $e){
            return new JsonResponse(['success' => false,'message' => 'error during processing'], 500);
        }

    }

    public function setState(Request $request){
        try{
           $task = Task::find($request->id);
           $task->status = ($task->status ? false : true);
            $task->save();

            return new JsonResponse(['success' => true, 'message' => 'the task was change with success']);

        }catch(Exception $e){
            return new JsonResponse(['success' => false,'message' => 'error during processing'], 500);
        }
    }
}
