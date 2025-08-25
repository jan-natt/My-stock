<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
      return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:120','unique:users,email'],
            'phone' => ['required','string','max:11','unique:users,phone'],
            'password' => ['required','string','min:8','confirmed'],
            'nid-number' => ['required','string','max:10'],
            'nid_verification_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
             'user_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        //image upload
        $uploadpath = public_path('uploads');
        if(!File::exists($uploadpath)) {
            File::makeDirectory($uploadpath, 0755, true);
        }

        $data = $request->only(['name', 'email', 'phone', 'nid-number']);
        $data['password'] = bcrypt($request->password); // Hash the password

        if($request->hasFile('nid_verification_photo'))
            {
               $file = $request->file('nid_verification_photo');
               $filename = 'use_nid_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
               $file->move($uploadpath, $filename);
               $data['nid_verification_photo'] = 'uploads/'.$filename;
            }

            if($request->hasFile('user_photo'))
            {
                $file = $request->file('user_photo');
                $filename = 'user_photo_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move($uploadpath, $filename);
                $data['user_photo'] = 'uploads/'.$filename;
            }

        User::create($data);

            return redirect()->back()->with('success', 'User created successfully!');
        }
    
    public function show(User $users)
    {
        return view('users.show',compact('users'));
    }

    
    public function edit(User $users)
    {
        return view('users.edit',compact('users'));
    }

    public function update(Request $request, User $users)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:120','unique:users,email,'.$users->id],
            'phone' => ['required','string','max:11','unique:users,phone,'.$users->id],
            'password' => ['required','string','min:8','confirmed'],
            'nid-number' => ['required','string','max:10'],
            'nid_verification_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
             'user_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
        $uploadpath = public_path('uploads');
        if(!File::exists($uploadpath))
        {
            File::makeDirectory($uploadpath, 0755, true);
        }

        if($request->hasFile('nid_verification_photo'))
        {
            if($users->nid_verification_photo && File::exists(public_path($users->nid_verification_photo)))
            {
                File::delete(public_path($users->nid_verification_photo));
            }

            $file = $request->file('nid_verification_photo');
            $filename = 'use_nid_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($uploadpath, $filename);
            $data['nid_verification_photo'] = 'uploads/'.$filename;
        }

        if($request->hasFile('user_photo'))
        {
            if($users->user_photo && File::exists(public_path($users->user_photo)))
            {
                File::delete(public_path($users->user_photo));
            }

            $file = $request->file('user_photo');
            $filename = 'user_photo_'.time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($uploadpath, $filename);
            $data['user_photo'] = 'uploads/'.$filename;
        }

        $users->update($data);

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    
    public function destroy(User $users)
    {
        if($users->nid_verification_photo && File::exists(public_path($users->nid_verification_photo)))
        {
            File::delete(public_path($users->nid_verification_photo));
        }

        $users->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
