<?php

//use App\Http\Controllers;
namespace App\Http\Controllers\Admin\Auth;


use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    //view all appointment

    public function viewAppointment(){

        // Fetch all vehicles from the database
         $appointment = User::
         orderBy('date', 'asc')
         ->orderBy('time','asc')
        //  orderBy('id', 'desc')
         ->get();


       // Return a view with the appointment data
         return view('admin.auth.all-appointment', compact('appointment'));



      }


      public function editAppointment()
      {

        $pendingappointment = DB::table('users')
        ->where('status','Pending')
        ->orderBy('id','desc')
        ->get();

          // Return a view with the vehicles data
            return view('admin.auth.pending-appointment' , compact('pendingappointment'));
      }


      public function editingAppointment($id)
      {
         // Fetch the specific service by ID with its associated price description
         $pendingappointment = DB::table('users')
         ->where('id', $id)
         ->first();  // Fetch the first result

          // Return a view with the appointment data
        return view('admin.auth.edit-appointment' , compact('pendingappointment'));
      }


      public function updateAppointment(Request $request, $id)
      {
          // Validate the request input
          $request->validate([
              'status' => 'required',
          ]);

          // Find the service by ID
          $p_appointment = User::findOrFail($id);

          // Update the service with new values from the form
          $p_appointment->update([
              'status' => $request->input('status'), // Update the 'status' field
          ]);

          // Redirect back with a success message
          return redirect()->route('edit-appointment')->with('success', 'Appointment approved successfully!');
      }


      public function approveAppointment(){

        // Fetch all vehicles from the database
         $appointment = User::where('status','Approved')->
         orderBy('date', 'asc')
         ->orderBy('time','asc')
         ->get();


       // Return a view with the appointment data
         return view('admin.auth.approved-appointment', compact('appointment'));



      }


      public function rejectedAppointment(){

        // Fetch all vehicles from the database
         $appointment = User::where('status','Rejected')->
         orderBy('date', 'asc')
         ->orderBy('time','asc')
         ->get();


       // Return a view with the appointment data
         return view('admin.auth.rejected-appointment', compact('appointment'));



      }



public function completedAppointment()
{
    // Fetch appointments with 'approved' status
    $approvedAppointments = DB::table('users')
        ->where('status', 'Approved')
        ->get();

    // Loop through each approved appointment and check the time
    foreach ($approvedAppointments as $appointment) {
        // Calculate the booking time + 1 hour
        $bookingTimePlusOneHour = Carbon::parse($appointment->time)->addHour();

        // Check if the current time is after the booking time + 1 hour
        if (Carbon::now()->greaterThan($bookingTimePlusOneHour)) {
            // Update the status to 'complete'
            DB::table('users')
                ->where('id', $appointment->id)
                ->update(['status' => 'Completed']);
        }
    }

    // Fetch the updated completed appointments to pass to the view
    $completedAppointments = DB::table('users')
        ->where('status', 'Completed')
        ->orderBy('date','desc')
        ->orderBy('time','desc')
        ->get();

    // Return the view with the updated appointments
    return view('admin.auth.completed-appointment', compact('completedAppointments'));
}



}
