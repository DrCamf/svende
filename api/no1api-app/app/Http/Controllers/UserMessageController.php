<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMessage;

use Illuminate\Support\Facades\DB;

class UserMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserMessage::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'message_id' => 'required',
            'user_id' => 'required',
          
        ]);
        
        return UserMessage::create($request->all());
    }

    public function allmessages(string $id) 
    {
        $messages = DB::table('user_messages')
        ->join('users', 'users.id',  '=', 'user_courses.user_id')
        ->join('messages', 'messages.id',  '=', 'user_messages.message_id')
       
        ->select('messages.subject', 'messages.body', 'messages.sent', )
       
        ->where('user_courses.course_id', "=", $id)
        ->get();


        return $messages;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return UserMessage::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userMessage = UserMessage::find($id);
        $userMessage->update($request->all());
        return $userMessage;
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return UserMessage::destroy($id);
    }
}
