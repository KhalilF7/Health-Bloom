<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackBackendController extends Controller
{

    public function index(){
        $feedbacks = Feedback::all();
        $users = User::all();
        return view("feedback.backend.indexBack",[
        'feedbacks'=>$feedbacks,
        'users'=>$users,
    ]);
    }

    public function create(){
     return view('feedback.createFeedback');
    }

    public function show($id)
    {
        $feedback=Feedback::find($id);
        return view('feedback.backend.showDetailsBack', ['feedback'=>$feedback]);
    }

    public function downloadFeedback($id)
    {
        $feedback_download = Feedback::table('feedback')->where('id',$id)->first();
        
    }


}
