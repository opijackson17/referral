<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->ajax()){

            return \DataTables::of(User::fetchUsers())->addColumn('Actions', function($rows)
            {
                return '<button type="button" data-id="'.$rows->id.'" class="btn btn-primary btn-sm" id="getEditUserData" data-id="'.$rows->id.'" >Edit</button>
                <a href="/getUserForEdit/'.$rows->id.'" data-id="'.$rows->id.'" data-toggle="modal" data-target="#DeleteUserModal" class="btn btn-danger btn-sm" id="getDeleteId">Del</a>';

            })->rawColumns(['Actions'])->make(true);  

         }
        return view('user.index', ['users' => User::fetchUsers()]);
          
    }

    public function validateUser($request)
    {
           return $validate = \Validator::make($request->all(),[
            'firstname' => ['required', 'string', 'max:50', 'min:2'],
            'lastname' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'min:10', 'max:13', 'unique:users'],
            'gender' => ['required', 'string', 'max:10', 'min:1'],
            'password' => ['nullable', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
    }


    public function validateUserUpdate($request)
    {
         return $validate = \Validator::make($request->all(),[
            'firstname' => ['required', 'string', 'max:50', 'min:2'],
            'lastname' => ['required', 'string', 'max:50', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
            'mobile' => ['required', 'string', 'min:10', 'max:13', 'unique:users,mobile,'.$request->id],
            'gender' => ['required', 'string', 'max:10', 'min:1'],
            'status' => ['required', 'string']
        ]);
    }

    public function store(Request $request)
    {
         
        if($this->validateUser($request)->fails()){
            return response()->json(['errors'=>$this->validateUser($request)->errors()->all()]);
        }   
        else{
            return User::saveUser($request);
        }
    }

    public function show(User $user)
    {
        // code...
    }

    public function edit(User $user, $id)
    {
      
          $html = '
          <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="edit_id" type="hidden" class="form-control @error("id") is-invalid @enderror" name="id" required value="'.($user->getUserById($id)->id).'">
                    </div>
                </div>

          <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="edit_firstname" type="text" class="form-control @error("firstname") is-invalid @enderror" name="firstname" required value="'.($user->getUserById($id)->firstname).'">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="edit_lastname" type="text" class="form-control @error("lastname") is-invalid @enderror" name="lastname" required value="'.($user->getUserById($id)->lastname).'">
                    </div>
                </div> 

                  <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="edit_email" type="email" class="form-control @error("email") is-invalid @enderror" name="email" required value="'.($user->getUserById($id)->email).'">
                    </div>
                </div> 

                <div class="form-group row">
                    <div class="col-sm-12">
                        <input id="edit_mobile" type="tel" class="form-control @error("mobile") is-invalid @enderror" name="mobile" required value="'.($user->getUserById($id)->mobile).'">
                    </div>
                </div>                

                <div class="form-group row">
                    <label for="edit_gender">Gender</label>
                    <div class="col-sm-12">
                        <select id="edit_gender" class="form-control" name="gender" required="required">
                            <option value="Male" '.($user->getUserById($id)->gender == 'Male' ? 'selected': '').'>Male</option>
                            <option value="Female"'.($user->getUserById($id)->gender == 'Female' ? 'selected': '').'>Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="statu">Status</label>
                    <div class="col-sm-12">
                        <select id="edit_status" class="form-control" name="status" required="required">
                            <option value="1" '.($user->getUserById($id)->status == '1' ? 'selected': '').'>Active</option>
                            <option value="0"'.($user->getUserById($id)->status == '0' ? 'selected': '').'>Not active</option>
                        </select>
                    </div>
                </div>';

        return response()->json(['html' => $html]);  
    }

    public function update(User $user, Request $request)
    {
        $validate = $this->validateUserUpdate($request);
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()->all()]);
        }   
        else{
            return $user->updateUser($request);
        }
    }

    public function destory(User $user)
    {
        // code...
    }
}
