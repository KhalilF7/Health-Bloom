<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a Listing of the resource.
     * @return \ILLuminate\Http\Response
     */
    public function index(Request $request){
        $search = $request->search;

        $feedbacks = Feedback::when($search, function($query, $search){
             $query->where('name', 'like', "%{$search}")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orderBy('created_at', 'desc')
                        ->get();
        })->paginate(5);
        $users = User::all();
        return view("feedback.index",[
        'feedbacks'=>$feedbacks,
        'users'=>$users,
    ]);
    }

    public function show($id)
{
    $feedback=Feedback::find($id);
    return view('feedback.showDetailsFeedback', ['feedback'=>$feedback]);
}

// public function showRating($id)
// {
//     $feedback=Feedback::findOrFail($id);
//     return view('feedback.index', compact('feedback'));
// }

    public function create(){
     return view('feedback.createFeedback');
}




public function store(Request $request){
    $request->validate([
        'name'=>'required|between:3,100',
        'description'=>'required|between:3,200',
    ], [], [
        'name'=>'name',
        'description'=>'description',
    ]);

//     Feedback::create([
//     'name'=> ucwords($request->name),
//     'description'=> ucwords($request->description),
//     'rating'=> ucwords($request->rating),
//     'status'=> ucwords($request->status),

// ]);
    $data = new Feedback;
    $data->name = $request->name;
    $data->description = $request->description;
    $data->rating = $request->rating;
    $data->status = $request->status;
    $data->user_id = Auth::user()->id;
    $data->save();
    return redirect()->route('feedback.index')->with( 'store', 'success');

}


    
public function edit(Feedback $feedback)
{
    return view('feedback.editFeedback', ['feedback'=>$feedback]);
}

public function update(Request $request, Feedback $feedback){
    $request->validate([
        'name'=>'required|between:3,100',
        'description'=>'required|between:3,200',
        'comment'=>'required|between:3,200',
        'status'=>'required',
        'center_id'=>'nullable|between:3,100',
        'user_id'=>'nullable|between:3,100',
    ], [], [
        'name'=>'name',
        'description'=>'description',
        'comment'=>'comment',
        'status'=>'status',
    ]);

    $feedback->update([
    'name'=> ucwords($request->name),
    'description'=> ucwords($request->description),
    'comment'=> ucwords($request->comment),
    'status'=> ucwords($request->status),
    // 'center_id'=> ucwords($request->center_id),
    // 'user_id'=> ucwords($request->user_id),

]);
        return redirect()->route('feedback.index')->with( 'update', 'success');

}

public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect('feedback')->with('flash_message', 'Feedback deleted!');  
    }

}
