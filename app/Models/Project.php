<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Project extends Model
{
    use HasFactory;
    
    public Client $client;

    protected $fillable = [
        "name",
        "clientId",
        "description",
        "hourlyMargin",
    ];

    public static function messages(): array
    {
        return [
            'name.required' => 'Název nesmí být prázdný',
            'description.required' => 'Popis nesmí být prázdný',
            "hourlyMargin.required" => "Hodinová merže nesmí být prázdná",
            "hourlyMargin.integer" => "Hodinová merže musí být číslo",
            "clientId.required" => "Musíte zvolit klienta, kterému projekt patří",
        ];
    }

    public static function validate(Request $request)
    {
        return $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "hourlyMargin" => "required|integer",
            "clientId" => "required|integer",
        ], Project::messages());
    }

    public static function addProject(array $request)
    {
        $project = new Project();
        $project->name = $request["name"];
        $project->description = $request["description"];
        $project->hourlyMargin = $request["hourlyMargin"];
        $project->clientId = $request["clientId"];
        
        $project->save();
    }

    public static function editProject(array $request, int $id)
    {
        $project = Project::find($id);
        $project->name = $request["name"];
        $project->description = $request["description"];
        $project->hourlyMargin = $request["hourlyMargin"];
        $project->clientId = $request["clientId"];
        
        $project->save();
    }
}
