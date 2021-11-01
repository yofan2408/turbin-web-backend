<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function update(UserRequest $userRequest)
    {

        $currentUser = $userRequest->user();

        if ($currentUser) {
            $updateData = $userRequest->validated();

            $currentUser->update([
                'name' => $updateData['name'],
                'address' => $updateData['address'],
                'phone' => $updateData['phone']
            ]);

            return response()->json([
                "code" => 200,
                "pesan" => "Update Success",
                "user" => [
                    "id" => $currentUser->id,
                    "name" => $currentUser->name,
                    "email" => $currentUser->email,
                    "address" => $currentUser->address,
                    "phone" => $currentUser->phone,
                    "photo" => $currentUser->photo,
                    "created_at" => Carbon::make($currentUser->created_at)->isoFormat('dddd, D MMMM Y, hh:mm:ss'),
                    "updated_at" => Carbon::now()->isoFormat('dddd, D MMMM Y, hh:mm:ss'),
                ]
            ]);
        }

        return response()->json([
            "code" => 400,
            "pesan" => "Update Failed"
        ]);
    }


    public function updatePhoto(UserRequest $userRequest){

        Log::info($userRequest);

        $currentUser = $userRequest->user();

        if ($currentUser) {
            $updateData = $userRequest->validated();

            $currentUser->update([
                'photo' => $updateData['photo'],
            ]);

            return response()->json([
                "code" => 200,
                "pesan" => "Update photo Success",
                'photoUrl' => $currentUser->photo
            ]);
        }

        return response()->json([
            "code" => 400,
            "pesan" => "Update Photo Failed"
        ]);
    }

    public function getPhoto(Request $request){
        $currentUser = $request->user();

        if ($currentUser) {

            return response()->json([
                "code" => 200,
                "pesan" => "Get photo Success",
                'photoUrl' => $currentUser->photo
            ]);
        }

        return response()->json([
            "code" => 400,
            "pesan" => "Get Photo Failed"
        ]);
    }
}
