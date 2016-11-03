<?php

class FormController
{
    /**
     * Registration page with form
     */
    public function index()
    {
           $view = new View();
        //$view->layout('layout');
        $view->render('form', [
            'message' => ''
        ]);
    }

    /**
     * Form submit
     */
    public function submit()
    {
         $view = new View();
        //$view->layout('layout');
        $view->render('submit', [
            'message' => ''
        ]);
    }

    /**
     * Thank you page
     */
    public function thankyou()
    {
       $view = new View();
        //$view->layout('layout');
        $view->render('success', [
            'message' => 'This is success page'
        ]);
    }

}