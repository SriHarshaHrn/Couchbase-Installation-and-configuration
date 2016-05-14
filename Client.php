<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CouchbaseCluster;
use Validator;

class Client extends Model {

    protected $dataBucket = "clients";
    protected $couchbaseObject = FALSE;
    protected $bucket;
    protected $fillable = ['clientName', 'clientLocation', 'clientBid'];
    protected $guarded = ['_token','_method'];
    protected $validationRules = [
        'clientName' => 'required',
        'clientLocation' => 'required',
        'clientBid' => 'required'
    ];
    public $errors;

    /**
     * Retrieves all Documents from a data bucket
     * @return type object
     */
    public function __construct() {
        if (!$this->couchbaseObject) {
            $this->couchbaseObject = new CouchbaseCluster('http://127.0.0.1:8091');
            $this->bucket = $this->couchbaseObject->OpenBucket($this->dataBucket);
        }
    }

    public function storeDocument() {
         $data = $this->attributes;
         $this->bucket->Insert($data['clientName'], $data);
    }

    public function getDocuments() {

        $query = "SELECT * FROM $this->dataBucket;";
        $result = \DB::connection()->bucket($this->dataBucket)->select($query);

        return $result;
    }

    public function deleteDocument($documentId) {
        $this->bucket->remove($documentId);
    }
    
    public function updateDocument($documentId) {
        $this->bucket->replace($documentId, $this->attributes);
    }
    
    public function validInput(){
        $validate = Validator::make($this->attributes,  $this->validationRules);
        
        if($validate->passes()){ return true; }
        
        $this->errors = $validate->messages();
        return false;
    }

}
