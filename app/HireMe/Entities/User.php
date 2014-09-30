<?php

namespace HireMe\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

    /**
     * Mass assignments
     * @var array
     */
    protected $fillable = array('full_name','email','password');



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    public function candidate()
    {
        return $this->hasOne('HireMe\Entities\Candidate','id','id');
    }

    public function getCandidate()
    {
        $candidate = $this->candidate;

        if (is_null ($candidate))
        {
            $candidate = new Candidate();
            $candidate->id = $this->id;
        }

        return $candidate;
    }

    /**
     * set attribute to manipulate
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        //pa cuando se actualize el usuario no actualice a password vacio
        if (!empty($value))
        {
            $this->attributes['password'] = \Hash::make($value);
        }

    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}