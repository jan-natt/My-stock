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
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:120','unique:users,email'],
            'phone' => ['nullable','string','max:11'],
            'password' => ['required','string','min:8','confirmed'],
            'nid-number' => ['nullable','string','max:10','unique:users,nid_number'],
            'nid_verification_photo' => ['nallable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
             'user_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        //image upload
        $uploadpath = public_path('uploads');
        if(!File::exists($uploadpath)) {
            File::makeDirectory($uploadpath, 0755, true);
        }

        if($request->hasFile('nid_verification_photo'))
            {
               $file = $request->file('nid_verification_photo');
               $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
               $file->move($uploadpath, $filename);
               $data['nid_verification_photo'] = 'uploads/'.$filename;
            }

            user::create($data);

            return redirect()->back()->with('success', 'User created successfully!');
        }
    
    public function show(User $user)
    {
        return view('users.show',compact('users'));
    }

    
    public function edit(User $user)
    {
        return view('users.edit',compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:120','unique:users,email,'.$user->id],
            'phone' => ['nullable','string','max:11'],
            'password' => ['nullable','string','min:8','confirmed'],
            'nid-number' => ['nullable','string','max:10','unique:users,nid_number,'.$user->id],
            'nid_verification_photo' => ['nallable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
             'user_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $uploadpath = public_path('uploads');
        if(!File::exists($uploadpath))
        {
            File::makeDirectory($uploadpath, 0755, true);
        }

        if($request->hasFile('nid_verification_photo'))
        {
            if($users->nid_verification_photo && file::exists(public_path($users->nid_validation_photo)))
            {
                File::delete(public_path($users->nid_validation_photo));
            }

            $file = $request->file('nid_verification_photo');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($uploadpath, $filename);
            $data['nid_verification_photo'] = 'uploads/'.$filename;

        }

        $users->update($data);

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    
    public function destroy(User $user)
    {
        if($user->nid_verification_photo && file::exists(public_path($user->nid_verification_photo)))
        {
            File::delete(public_path($user->nid_verification_photo));
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
