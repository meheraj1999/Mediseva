<?php
namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class MessagesController extends Controller
{

    function list() {
        $messages = Contact::orderBy('id', 'desc')->get();
        return view('back-views.message.list', compact('messages'));
    }

    public function view($id)
    {
        $messagesView = Contact::findOrFail($id);
        return $messagesView;
        return view('back-views.message.list', compact('V'));

    }
    public function destroy($id)
    {

        $slider = Contact::findOrFail($id);

        $slider->delete();

        return response()->json();
    }

}
