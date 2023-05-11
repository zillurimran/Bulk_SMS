<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Carbon\Carbon;
use Shetabit\Visitor\Models\Visit;
use DB;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $histories = Auth::user()->getHistory;
        $this_year_total = Auth::user()->getHistory()->whereYear('created_at',  \Carbon\Carbon::now()->format('Y'))->get()->count();
        $last_year_total = Auth::user()->getHistory()->whereYear('created_at',  \Carbon\Carbon::now()->subYear()->format('Y'))->get()->count();
        
        for($i = 6; $i >= 0; $i --){
            $last_week_send_messge[] = Auth::user()->getHistory()->whereDate('created_at', Carbon::now()->subDays($i))->get()->count();
            $days[] = Carbon::now()->subDays($i)->format('d-m-Y');
        } 
        for($i = 1; $i<=12;$i++){
            $this_year[] =Auth::user()->getHistory()->whereYear('created_at',  \Carbon\Carbon::now()->format('Y'))->whereMonth('created_at', $i)->get()->count();
            $last_year[] =Auth::user()->getHistory()->whereYear('created_at',  \Carbon\Carbon::now()->subYear()->format('Y'))->whereMonth('created_at', $i)->get()->count();
        }
        return view('admin.index', compact('histories', 'days', 'last_week_send_messge', 'this_year', 'last_year', 'this_year_total', 'last_year_total'));

    // End
    }

    // User List
    public function userList(){

        $users = User::orderBy('name', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }

    // User Create
    public function userCreate(){

        return view('admin.users.create');
    }



     // User Delete
    public function userDestroy($id){

        $user = User::find($id);

        $user->delete();

        return back()->withSuccess('User deleted');
    }

     // User Delete
    public function historyDestroy($id){

        $user = History::find($id);

        $user->delete();

        return back()->withSuccess('Log deleted');
    }

     // User Delete
    public function historyAllDestroy(){

        Auth::user()->getHistory->each->delete();

        return back()->withSuccess('Log Cleared');
    }

    // My Profile
    public function myProfile(){

        return view('admin.users.my-profile');
    }

}
