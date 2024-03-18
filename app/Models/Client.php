<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "ICO",
        "DIC",
        "address",
        "email",
        "phone",
    ];

    public static function validate(Request $request)
    {
        return $request->validate([
            "name" => "required|string",
            "address" => "required|string",
            "ICO" => "required|string",
            "DIC" => "required|string",
            "phone" => "required|regex:/^\+?\d+$/i",
            "email" => "required|email",
        ], Client::messages());
    }

    public static function messages(): array
    {
        return [
            'name.required' => 'Název nesmí být prázdný',
            'address.required' => 'Adresa nesmí být prázdná',
            "ICO.required" => "IČO nesmí být prázdné",
            "DIC.required" => "DIČ nesmí být prázdné",
            "phone.required" => "Telefon nesmí být prázdný",
            "phone.regex" => "Telefon musí být ve tvaru +123456789 nebo 123456789",
            "email.required" => "Email nesmí být prázdný",
        ];
    }

    public static function addClient(array $request)
    {
        $client = new Client();
        $client->name = $request["name"];
        $client->address = $request["address"];
        $client->phone = $request["phone"];
        $client->email = $request["email"];
        $client->ICO = $request["ICO"];
        $client->DIC = $request["DIC"];
        
        $client->save();
    }

    public static function editClient(array $request, int $id)
    {
        $client = Client::find($id);
        $client->name = $request["name"];
        $client->address = $request["address"];
        $client->phone = $request["phone"];
        $client->email = $request["email"];
        $client->ICO = $request["ICO"];
        $client->DIC = $request["DIC"];
        
        $client->save();
    }
}
