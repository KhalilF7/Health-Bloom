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
        if(Auth::user()->usertype==0)
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
        else 
        {
        return redirect()->back();
        }
    }

    public function myappointment()
    {
        if(Auth::user()->usertype==0)
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
        if(Auth::user()->usertype==0)
        {
            $data = Appointment::find($id);
            $data->delete();
            return redirect()->back();}
        else 
        {
            return redirect()->back();
        }
    }

    public function showappointment()
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::all();
            return view('admin.showappointment', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function approved($id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            $data->status = 'Approved';
            $data->save();
            return redirect()->back();
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    public function canceled($id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            $data->status = 'Canceled';
            $data->save();
            return redirect()->back();   
        }
        else 
        {
            return redirect()->back();
        }
        
    }

    public function emailview($id)
    {
        if(Auth::user()->usertype==1)
        {
            $data = Appointment::find($id);
            return view('admin.email_view', compact('data'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function sendemail(Request $request, $id)
    {
        if(Auth::user()->usertype==1)
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
        else
        {
            return redirect()->back();
        }
        
    }
}
