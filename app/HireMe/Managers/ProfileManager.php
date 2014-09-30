<?php
/**
 * Created by IntelliJ IDEA.
 * User: jdiaz
 * Date: 23/08/14
 * Time: 07:26 PM
 */

namespace HireMe\Managers;


class ProfileManager extends BaseManager {


    public function getRules()
    {
        //contatenando el id del usuario se quita la validacion que el correo unico no agarre el mio
        $rules = [
            'website_url' => 'required|url',
            'description' =>  'required|max:1000',
            'job_type' => 'required|in:full,partial,freelance',
            'category_id' => 'required|exists:categories,id',
            'available' => 'in:1,0'
        ];

        return $rules;
    }

    public function prepareDate($data)
    {
        if ( ! isset($data['available'])) {
            $data['available'] = 0;
        }

        $this->entity->slug = \Str::slug( $this->entity->user->full_name);
        return $data;
    }


}