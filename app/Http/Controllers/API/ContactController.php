<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Monolog\Handler\TelegramBotHandler;

class ContactController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ContactResource::collection(Contact::latest()->paginate(10));
    }

    public function store(ContactRequest $request): ContactResource|\Illuminate\Http\JsonResponse
    {
        try {
            $contact = Contact::create($request->validated());
            return new ContactResource($contact);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error. ' . $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Contact $contact): ContactResource
    {
        return ContactResource::make($contact);
    }

    public function update(ContactRequest $request, Contact $contact): ContactResource|\Illuminate\Http\JsonResponse
    {
        try {
            $contact->update($request->validated());
            
            return new ContactResource($contact);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error. ' . $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Contact $contact): \Illuminate\Http\JsonResponse
    {
        try {
            $contact->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
