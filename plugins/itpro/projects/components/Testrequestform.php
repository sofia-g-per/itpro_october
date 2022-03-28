<?php namespace Itpro\Projects\Components;

use Mail;
use Redirect;
use Validation;
use Cms\Classes\ComponentBase;
use Itpro\Projects\Models\Client;
use Itpro\Projects\Models\Project;
use Itpro\Projects\Models\TestRequest;
use October\Rain\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use October\Rain\Exception\ValidationException;

class Testrequestform extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Testrequestform',
            'descripiton' => 'Форма для заявки на тестирование проекта'
        ];
    }

    protected function loadProjects(){
        $projects = Project::all();
        return $projects;
    }


    public function onRun(){
        $this->projects = $this->loadProjects();
    }

    public function onTestRequestSend(){
        $orderData = Input::all();
        $validator = Validator::make($orderData, [
            'client_name'=>'required',
            'description'=>'required',
            'email'=>'required|email',
            'project_id'=>'required|int',
        ]);
    
        if ( $validator->fails() ) {
            throw new ValidationException($validator);

        } else{

        $client = new Client();
        $client->name = Input::get('client_name');
        $client->email = Input::get('email');
        $client->save();
    
        $request = new TestRequest();
        $request->description = Input::get('description');
        $request->client_id = $client->id;
        $request->project_id = Input::get('project_id');
        $request->save();
    
        // Flash::success('Форма отправлена!');

        }
    }

    public $projects;
}