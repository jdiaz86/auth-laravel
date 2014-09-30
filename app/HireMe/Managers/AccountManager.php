<?php
/**
 * Created by IntelliJ IDEA.
 * User: jdiaz
 * Date: 23/08/14
 * Time: 07:26 PM
 */

namespace HireMe\Managers;


class AccountManager extends BaseManager {


    public function getRules()
    {
        //contatenando el id del usuario se quita la validacion que el correo unico no agarre el mio
        $rules = [
            'full_name' => 'required',
            'email' =>  'required|email|unique:users,email,' . $this->entity->id,
            'password' => 'confirmed',
            'password_confirmation' => ''
        ];

        return $rules;
    }


}