<?php

class Controller_Training extends Controller_Template
{
    public $template = 'training/template';

    public function action_top()
    {
        Log::error("日本人");
        $this->template->title = "Top";
        $this->template->username = "Demo User";
        $this->template->content = View::forge('training/top');

    }

    public function action_record()
    {
        $this->template->title = "Record";
        $this->template->username = "Demo User";
        $this->template->content = View::forge('training/record');
    }

    public function action_testing($a = null, $b = null)
    {
        $testing = "私の名前は".$a."と言います。年齢は".$b."です。";
        return $testing;
    }
}