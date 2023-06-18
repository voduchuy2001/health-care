<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ToastrHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\UpdateContactsRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public $contact;

    public $perPage = 10;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index(Request $request)
    {
        $data = $request['search_keywords'];

        if ($data) {
            $contacts = $this->contact
                ->where(function ($query) use ($data) {
                    $query->where('email', 'like', '%' . $data . '%');
                })
                ->paginate($this->perPage);

            $contacts->appends(['search_keywords' => $data]);
        } else {
            $contacts = $this->contact->orderByDesc('created_at')->paginate($this->perPage);
        }

        return view('admin.contacts.index', compact('contacts'));
    }

    public function edit($id)
    {
        $contact = $this->contact->findOrFail($id);

        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(UpdateContactsRequest $request, $id)
    {
        $data = $request->validated();

        $contact = $this->contact->findOrFail($id);

        $contact->update($data);

        ToastrHelper::success('Cập nhật', $contact->name);

        return redirect()->route('admin.contact.index');
    }

    public function delete($id)
    {
        $contact = $this->contact->findOrFail($id);

        $contact->delete();

        ToastrHelper::success('Xóa', $contact->name);

        return redirect()->back();
    }
}
