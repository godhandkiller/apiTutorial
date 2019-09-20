<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function show(Person $person): PersonResource{
        return new PersonResource($person);
    }

    public function index(): PersonResourceCollection{
        return new PersonResourceCollection(Person::all());
    }

    public function store(): PersonResource{
        $data = request()->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'city'          => 'required',
        ]);

        $person = Person::create($data);

        return new PersonResource($person);
    }

    public function update(Person $person){
        $data = request()->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
        ]);

        $person->update(request()->all());

        return new PersonResource($person);
    }
}
