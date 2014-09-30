<?php
/**
 * Created by IntelliJ IDEA.
 * User: jdiaz
 * Date: 23/08/14
 * Time: 09:45 PM
 */

namespace HireMe\Components;


use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['field'] = $this->app->share(function($app)
        {
           $fieldBuilder = new FieldBuilder($app['form'],$app['view'],$app['session.store']);
           return $fieldBuilder;


        });
    }
}