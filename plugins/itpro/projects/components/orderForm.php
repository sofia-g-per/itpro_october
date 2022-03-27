<?php namespace Itpro\Projects\Components;

use Mail;
use Input;
use Redirect;
use Validator;
// use Illuminate\Support\Facades\Validator;
use Cms\Classes\ComponentBase;
use Itpro\Projects\Models\Order;
use Itpro\Projects\Models\Client;
use Itpro\Projects\Models\Technology;
use October\Rain\Support\Facades\Flash;
use Dotenv\Exception\ValidationException;

class OrderForm extends ComponentBase
{
    public $technologies;

    
    public function componentDetails()
    {
        return [
            'name' => 'Order Form',
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
        $orderData = post();
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
        $client->name = request('client_name');
        $client->email = request('email');
        $client->save();

        $order = new Order();
        $order->title = request('project_title');
        $order->client_id = $client->id;
        $order->technology_id = request('technology_id');
        $order->file = request()->file('file')->store('files/orders');
        $order->save();
        
        Flash::success('Форма отправлена!');
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