<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Exception;

class ContactController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->paginate();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function single($id)
    {
        $contact = $this->contactRepository->findById($id);

        try {
            if ($contact['type'] == Contact::UNREAD) {
                $this->contactRepository->updateType($contact['id']);
                $contact->refresh();
                return view('admin.contacts.single', compact('contact'));
            } else {
                return view('admin.contacts.single', compact('contact'));
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
    }
}
