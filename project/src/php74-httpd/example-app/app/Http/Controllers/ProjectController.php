<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProjectController extends Controller
{


  public function index()
  {
    // $student = Student::find(1);
    // $exam_results = $student->exam_results;
    // dd($exam_results);

    $projects = DB::table('tbl_projects')->get();
    return view('pages.projects.index', compact('projects'));
  }

  public function delete(Request $request, string $project_id)
  {
    try {
      DB::beginTransaction();

      $exam = Project::find($project_id);
      $exam->delete();

      DB::commit();

      return redirect()
        ->route('projects.index')
        ->with('success', 'exam has been deleted successfully');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function create(Request $request)
  {
    try {
      // return create form

      return view(
        'pages.projects.create',
        compact('request')
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function store(Request $request)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => ''
      ]);

      // return create form
      DB::beginTransaction();

      $project = new Project();

      $project->name = $validatedData['name'];
      $project->description = $validatedData['description'];

      $project->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('projects.index');

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }


  public function edit(Request $request, string $project_id)
  {
    try {
      $project = Project::where('id', $project_id)->with(['owners'])->first();
      $owners = User::all();

      return view(
        'pages.projects.edit',
        compact(
          'project',
          'owners'
        )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function update(Request $request, string $project_id)
  {
    try {
      $request_all = $request->all();
      $validatedData = $request->validate([
        'name' => '',
        'description' => '',
        'owner_id' => ''
      ]);

      DB::beginTransaction();

      $project = Project::find($project_id);

      $project->name = $validatedData['name'];
      $project->description = $validatedData['description'];

      $new_owner_id = $validatedData['owner_id'];
      $owners = $project->owners;
      foreach ($owners as $owner) {
        $project->owners()->detach($owner->id);
      }
      $project->owners()->attach($new_owner_id);

      $project->save();

      DB::commit();

      Session::forget('status');

      return redirect()
        ->route('projects.index');


    } catch (\Throwable $th) {
      var_dump($request_all);
      echo $th->getMessage();
    }
  }

  public function view(Request $request, string $project_id)
  {
    try {
      $project = Project::find($project_id);
      $order = Order::all();

      return view(
        'pages.projects.view',
        compact(
          'project',
          'order',
          'request'
        )
      );
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public function routeShouldBeObsoleted()
  {
    return 'route_should_be_obsoleted';
  }
}
