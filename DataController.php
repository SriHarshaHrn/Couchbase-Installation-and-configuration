<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;

class DataController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $client;
    protected $inputData;
    
    public function __construct(Client $obj_client,Request $request) {
        $this->client = $obj_client;
        $this->inputData = $request->input();
    }
    
    public function index() {    
        
        $result = $this->client->getDocuments();        
        return view('clients-list',['records'=>$result]);
         
    }

    public function store() {
        if(!$this->client->fill($this->inputData)->validInput()){
            return back()->withInput()->withErrors($this->client->errors);
        }
        $this->client->storeDocument();
        return view('register-confirmation');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id) {
        $this->client->fill($this->inputData)->updateDocument($id);
        return redirect()->route('clients.index');
    }
    
    public function getDataPost() {

        if (array_key_exists('clientDelete',$this->inputData)) {
            $clientName = $this->inputData['clientName'];
            $this->client->deleteDocument($clientName);
            return redirect()->route('clients.index');
        }

        if (array_key_exists('clientUpdate',$this->inputData)) {
            return view('client-update')->with('data',$this->inputData);
        }
    }

}
