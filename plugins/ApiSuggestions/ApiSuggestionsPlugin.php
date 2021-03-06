<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('STATUSNET')) {
    // This check helps protect against security problems;
    // your code file can't be executed directly from the web.
    exit(1);
}

class ApiSuggestionsPlugin extends Plugin
{
    function onAutoload($cls)
    {
        $dir = dirname(__FILE__);

        switch ($cls)
        {
        case 'ApisuggestionshotAction':
            include_once $dir . '/' . strtolower(mb_substr($cls, 0, -6)) . '.php';
            return false;
           
        default:
            return true;
        }
        
    }
    
    function onRouterInitialized($m)
    {
        $m->connect('api/suggestions/:type/hot.json',
                        array('action' => 'apisuggestionshot',
                              'type' => '(users|tags)'));
                
        return true;
    }
}
