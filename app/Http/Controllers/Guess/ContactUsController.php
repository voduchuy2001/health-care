<?php

namespace App\Http\Controllers\Guess;

use App\Helpers\SetPageTitleHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guess\Contacts\StoreContactsRequest;
use App\Mail\Guess\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Telegram\Bot\Laravel\Facades\Telegram;

class ContactUsController extends Controller
{
    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        SetPageTitleHelper::setTitle('Liên hệ với chúng tôi');

        return view('guess.contacts-us.index');
    }

    public function store(StoreContactsRequest $request)
    {
        $data = $request->validated();

        $contact = $this->contact->create($data);

        $text = "You have a new contact us from\n"
            . "<b>User: </b>\n"
            . "$request->name\n"
            . "<b>Email Address: </b>\n"
            . "$request->email\n"
            . "<b>Message: </b>\n"
            . $request->message;
    
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_GROUP_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        Mail::to($data['email'])->send(new ContactMail($contact));

        return redirect()->back()->with('message', 'Thêm mới liên hệ ' . $contact->subject . ' thành công.');
    }
}
