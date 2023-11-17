<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Grower;
use App\Models\Paddock;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function approval(){
        $roles = explode(',', auth()->user()->role);
        if(in_array('admin', $roles)){
            return redirect('/dashboard');
        }
        elseif(in_array('grower', $roles)){
            return redirect('/dashboard');
        }
        elseif(in_array('buyer', $roles)){
            return redirect('/dashboard');
        }
        else{
            return view('portal.account-approval');
        }
    }

    public function dashboard(){
        return view('portal.dashboard');
    }

    public function users(){
        $users = User::with(['grower', 'buyer', 'paddock'])->get();

        return view('portal.user.all-users', compact('users'));
    }

    public function registerUser(Request $request){
        $postData = $request->except('_token');
        $postData['password'] = bcrypt($postData['password']);

        try{
            $user = User::create($postData);

            if($user){
                return redirect()->back()->with('success', 'User has created successfully.');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function editUser(Request $request){
        try{
            $user = User::with(['grower', 'buyer', 'paddock'])->where('id', $request->id)->first();

            return response()->json(['status' => 'true', 'data' => $user]);

        } catch(\Exception $ex){
            return response()->json(['status' => 'false', 'error' => $ex->getMessage()]);
        }
    }

    public function updateUser(Request $request){
        $id = $request->id;

        $userData = [
          'name' => $request->name,
          'email' => $request->email,
          'username' => $request->username,
          'phone' => $request->phone,
        ];

        try{
            User::where('id', $id)->update($userData);

            Grower::updateOrCreate(
                ['user_id' => $id],
                [
                    'grower_name' => $request->grower_name,
                    'grower_group' => json_encode($request->grower_group),
                    'grower_tags' => json_encode($request->grower_tags),
                ]
            );

            Buyer::updateOrCreate(
                ['user_id' => $id],
                [
                    'buyer_group' => json_encode($request->buyer_group),
                    'buyer_tags' => json_encode($request->buyer_tags),
                ]
            );

            $paddock = Paddock::updateOrCreate(
                ['user_id' => $id],
                [
                    'paddock_name' => json_encode($request->paddock_name),
                    'no_of_hectares' => json_encode($request->no_of_hectares)
                ]
            );

            if($paddock){
                return redirect()->back()->with('success', 'User has updated successfully.');
            }
            else{
                return redirect()->back()->with('error', 'Something went wrong.');
            }
        } catch(\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function deleteUser($id){
        $user = User::where('id', $id)->delete();

        if($user == 1){
            return redirect()->back()->with('success', 'User has deleted successfully.');
        }
        else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
