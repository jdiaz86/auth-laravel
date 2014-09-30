<?php
namespace HireMe\Entities;

class Candidate extends \Eloquent {
    //fill the fields that can be assign mass assignments
	protected $fillable = ['website_url', 'description', 'job_type', 'category_id', 'available'];

    protected $perPage = 3;

    public function user()
    {
        return $this->hasOne('HireMe\Entities\User','id','id');
    }

    public function category()
    {
        return $this->belongsTo('HireMe\Entities\Category');
    }

}