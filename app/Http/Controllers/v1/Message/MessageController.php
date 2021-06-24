<?php

namespace App\Http\Controllers\v1\Message;

use Validator;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Responser\JsonResponser;
use App\Mail\MessageNotification;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $message = Message::latest()->paginate(10);
            if(!$message){
                return JsonResponser::send(true, "Record not found", [], 401);
            }
            return JsonResponser::send(false, "Record found successfully", []);
        } catch (Exception $th) {
            Log::error($th);
            return JsonResponser::send(true, "Internal server error", [], $th->getCode());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials = $request->only('user_id', 'receiver_id', 'subject', 'message');
        $rules = [
            ['user_id' => 'required'],
            ['receiver_id' => 'required'],
            ['message' => 'required'],
        ];
        $validateSender = Validator::make($credentials, $rules[0]);
        if ($validateSender->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Sender is Required!',
                'data' => null
            ]);
        }
        $validateReceiver = Validator::make($credentials, $rules[1]);
        if ($validateReceiver->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Receiver is Required!',
                'data' => null
            ]);
        }
        $validateMessage = Validator::make($credentials, $rules[2]);
        if ($validateMessage->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Message is Required!',
                'data' => null
            ]);
        }
        try {
        $senderData = User::find($request->user_id);
        $receiverData = User::find($request->receiver_id);
        if($senderData && $receiverData){
            $storemessage = Message::create([
                'user_id' => $request->user_id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
                'subject' => $request->subject,
            ]);
            $mailto = $receiverData->email;
            $data = [
                "email" => $mailto,
                "fullname" => $senderData->lastname.' '.$senderData->firstname,
                "subject" => $request->subject,
                "message" => $request->message,
                "useremail" => $senderData->email,
                "phoneno" => $senderData->phoneno,
            ];
            $sendmail = Mail::to($mailto)->send(new MessageNotification($data));
            return response()->json([
                'error' => false,
                'message' => 'Message sent successfully.',
                'data' => $storemessage
            ]);
        }else{
            return JsonResponser::send(true, "Sender or Receiver ID do not exist", [], 401);
        }
        } catch (\Exception $th) {
            Log::error($th);
            return JsonResponser::send(true, "Internal server error", [], $th->getCode());
        }
    }

    /**
     * Send Messages
     */
    public function sendMessage($userid)
    {
        try {
            $message = Message::where('user_id', $userid)->with('user')->with('receiver')->get();
            if (!$message) {
                return response()->json([
                    'error' => true,
                    'message' => 'Record not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $message
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error' => true,
                'message' => $error->getMessage(),
                'data' => null
            ]);
        }

    }

    public function receivedMessage($userid)
    {
        try {
            $message = Message::where('receiver_id', $userid)->with('user')->with('sender')->get();
            if (!$message) {
                return response()->json([
                    'error' => true,
                    'message' => 'Record not found',
                    'data' => null
                ]);
            }
            return response()->json([
                'error' => false,
                'message' => null,
                'data' => $message
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error' => true,
                'message' => $error->getMessage(),
                'data' => null
            ]);
        }
    }
}
