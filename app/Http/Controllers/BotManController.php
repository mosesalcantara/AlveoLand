<?php

namespace App\Http\Controllers;

class BotManController extends Controller
{
    public function handle() {
        $botman = app("botman");

        $botman->hears("{message}", function($botman, $message) {
            if ($message == 'hi') {
                $botman->startConversation(new InitialOptions);
            }
        });
        $botman->listen();
    }
}
