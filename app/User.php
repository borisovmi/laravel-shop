<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Model {

    
    /* validate user on signin */
    static public function validateUser($request) {
        $valid = false;
        $email = $request->email;
        $password = $request->password;
        $sql = "SELECT * FROM users WHERE email = ?";
        $user = DB::select($sql, [$email]);
        if ($user) {
            $user = $user[0];
            if (Hash::check($password, $user->password)) {
                $valid = true;
                /* check if admin */
                if ($user->role == 6) {
                    Session::put('is_admin', true);
                    Session::flash('ms', "Welcome admin!");
                } else {
                    Session::flash('ms', "Welcome back $user->first_name!");
                }
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->first_name);
                Session::put('user_lastname', $user->last_name);
                Session::put('user_email', $user->email);
            } else {
                return redirect('/')->withErrors("You're not allowed to see this page");
            }
        } return $valid;
    }

    /* adding a new user from signup or from CMS */
    public static function insertUser($request) {
        $user = new self();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        /* default user role, not admin */
        $user->role = 1;
        $user->save();
        if ($user->id) {
            return true;
        } else {
            return false;
        }
    }

    
    /* updating user details from signup or from CMS */
    public static function updateUser($request, $id) {
        $user = self::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->password) {
            if (strlen($request->password) >= 6 && strlen($request->password) <= 12) {
                $user->password = bcrypt($request->password);
            } else {
                return false;
            }
        }
        $user->role = $user->role;
        $user->save();
        if ($user->id) {
            Session::put('user_name', $user->first_name);
            Session::put('user_lastname', $user->last_name);
            Session::put('user_email', $user->email);
            return true;
        }
        return false;
    }

}
