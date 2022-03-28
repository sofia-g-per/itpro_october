<?php namespace Itpro\Projects\Components;

use Mail;
use Redirect;
use Validation;
use Cms\Classes\ComponentBase;
use Itpro\Projects\Models\Order;
use Itpro\Projects\Models\Client;
use Itpro\Projects\Models\Technology;
use October\Rain\Support\Facades\Flash;
use October\Rain\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use October\Rain\Exception\ValidationException;
use System\Models\File;

class Orderform extends ComponentBase
{
    public $technologies;

    
    public function componentDetails()
    {
        return [
            'name' => 'Orderform',
            'descripiton' => 'Форма для заказа проекта пользователем'
        ];
    }

    protected function loadTechnologies(){
        $technologies = Technology::all();
        return $technologies;
    }


    public function onRun(){
        $this->technologies = $this->loadTechnologies();
    }

    public function onSend(){
        $orderData = Input::all();
        $validator = Validator::make($orderData, [
            'client_name'=>'required',
            'email'=>'required|email',
            'technology_id'=>'required',
            'project_title'=>'required',
            'file'=>'required|mimes:png,jpeg,docx,pdf',
        ]);

        if ( $validator->fails() ) {
            throw new ValidationException($validator);
        } else{


        $client = new Client();
        // No resource with given URL found
        $client->name = Input::get('client_name');
        $client->email = Input::get('email');
        $client->save();

        $order = new Order();
        $order->title = Input::get('project_title');
        $order->client_id = $client->id;
        $order->technology_id = Input::get('technology_id');


        $order->order_file = Input::file('file');
        
        // $file = new File();
        // $file->data = Input::file('file');
        // $file->save();
        // $order->file file()->add($file); 

        $order->save();

        // Flash::success('Форма отправлена!');
                // Mail::send('itpro.contact::mail.message', input vars , function($message){
        // $message->to('info@itpro.moscow', '');
        // $message->subject('Новый заказ!')
        // });

        // return response()->json([
        //     "error"=>[
        //         "message"=>"Success",
        //     ]
        // ]);
        }


    }
}