<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmailController extends Controller
{
    public function index()
    {
        //
    }

    public function createEmail(Request $request)
    {
        $attachments = [];

        foreach($request->file('attachments') as $file) {
            //
            $path = $file->store('emails', 'public');

            $attachments[] = [
                'filename' => $file->getClientOriginalName(),
                'path' => Storage::disk('public')->url($path),
                'mime' => $file->getMimeType(),
                'size' => $file->getSize(),
            ];

            Email::create([
                'to' => 'cimzett@example.com',
                'subject' => 'Teszt e-mail',
                'body' => 'Ez egy teszt e-mail.',
                'attachments' => json_encode($attachments),
                'status' => 'queued',
            ]);

        }
    }

    public function readEmail(int $id)
    {
        $email = Email::find($id);
        $attachments = json_decode($email->attachments, true);

        return [
            'to' => $email->to,
            'subject' => $email->subject,
            'body' => $email->body,
            'attachments' => $attachments,
        ];
    }
}
