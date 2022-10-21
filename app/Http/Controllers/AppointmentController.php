<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Specialist;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function appointment(Request $request)
    {
        $data = new Appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->specialist_id = $request->specialist;
        $data->status = 'In Progress';
        if(Auth::id())
        {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', 'Appointment request has been sent seccessfully. We will contact you soon');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appoints = Appointment::where('user_id', $userid)->get();
            $specialists = Specialist::all();
            return view('user.my_appointment', compact('appoints', 'specialists'));
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function showappointment()
    {
        $data = Appointment::all();
        return view('admin.showappointment', compact('data'));
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }

    public function emailview($id)
    {
        $data = Appointment::find($id);
        return view('admin.email_view', compact('data'));
    }

    public function sendemail(Request $request, $id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'message' => $request->message,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect('/showappointment');
    }
}
