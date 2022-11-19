<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DeleteUserController extends Controller
{
    public function deleteUser(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),
                [
                    'id' => 'required',
                ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validate->errors()
                ], 401);
            }
            if ($validate->validate()) {
                $user = User::findorfail($request->id);

                $user->delete();

                DB::statement("SET @count = 0;");
                DB::statement("UPDATE `users` SET `users`.`id` = @count:= @count + 1;");
                DB::statement("ALTER TABLE `users` AUTO_INCREMENT = 1;");

                return response()->json([
                    'status' => true,
                    "message' => 'User of id {$request->query('id')} deleted successfully",
                    'errors' => $validate->errors()
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
