<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerContactController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addContact(Request $request): JsonResponse
    {
        $validate = $this->getValidator($request);
        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validate->errors(),
            ], 400);
        }

        $content = "{$request->name} | {$request->email} | {$request->phone_number} | {$request->address['house_number']} | {$request->address['street_name']} | {$request->address['city']} | {$request->address['state']} | {$request->address['country']}";
        // Append to a file
        Storage::append('customer.txt', $content);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidator(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|max:20',
            'address' => 'required|array',
            'address.house_number' => 'required|integer',
            'address.street_name' => 'required',
            'address.city' => 'required',
            'address.state' => 'required|max:2',
            'address.country' => 'required|max:2',
        ]);
    }
}
