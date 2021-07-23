<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5); 
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $users = User::pluck('id')->all();
        return view('admin.users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'isAdmin' => 'required',
        ];

        $messages = [
            'name.required' => 'Введите имя',
            'name.max' => 'Слишком длинное имя',

            'email.required' => 'Введите почту',
            'email.unique' => 'Электронный адрес уже занят',

            'password.required' => 'Введите пароль',
            'password.min' => 'Длина пароля должна быть минимум 8 символов',

            'isAdmin.required' => 'Выберите права доступа',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $request->isAdmin,
        ]);

        return redirect()->route('users.index')->with('success', 'Пользователь успешно создан');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'name' => 'required|max:100',
            'email' => "required|email|unique:users,email,{$id}",
            'isAdmin' => 'required',
        ];

        $messages = [
            'name.required' => 'Введите имя',
            'name.max' => 'Слишком длинное имя',

            'email.required' => 'Введите почту',
            'email.unique' => 'Электронный адрес уже занят',

            'isAdmin.required' => 'Выберите права доступа',
        ];

        $data = $request->all();

        Validator::make($data, $rules, $messages)->validate();

        if ($request->password){
            $data['password'] = Hash::make($request->password);
        } else $data = [
            'name' => $request->name,
            'email' => $request->email,
            'isAdmin' => $request->isAdmin,
        ];

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Пользователь успешно создан');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with('success', 'Пользователь удален');
    }

    public function register()
    {
        return view('user.register');
    }

    public function save(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|email',
            'password_confirmation' => 'required|min:8',
            'password' => 'required|confirmed',

        ];

        $messages = [
            'name.required' => 'Введите имя',
            'name.max' => 'Слишком длинное имя',

            'email.required' => 'Введите почту',
            'email.unique' => 'Электронный адрес уже занят',

            'password_confirmation.required' => 'Введите пароль',
            'password_confirmation.min' => 'Длина пароля должна быть минимум 8 символов',

            'password.required' => 'Это поле должно быть заполнено',
            'password.confirmed' => 'Пароли не совпадают',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('login', 'Вы успешно зарегистрировались!');
        Auth::login($user);

        return redirect()->home();
    }

    public function login()
    {
        return view('user.login');
    }

    public function new(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',

        ];

        $messages = [
            'email.required' => 'Введите почту',
            'password.required' => 'Это поле должно быть заполнено',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->home();
        } else {
            return redirect()->back()->with('message', 'Неправильный логин или пароль');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
