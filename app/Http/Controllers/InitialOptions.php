<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;

use App\Models\about;

class InitialOptions extends Conversation
{
    public function run()
    {
        $this->select_option();
    }

    public function select_option()
    {
        $question = Question::create("How can i help you, would you like to know about the following: ")
            ->fallback("Sorry I did not understand that, please try again.")
            ->callbackId("initial_options")
            ->addButtons([
                Button::create("For Sale Units")->value("for_sale"),
                Button::create("For Lease Units")->value("for_lease"),
                Button::create("About Us")->value("about"),
        ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {

                    case "for_sale":
                        $this->bot->startConversation(new SaleOptions());
                        break;

                    case "for_lease":
                        $this->bot->startConversation(new LeaseOptions());
                        break;
                        
                    case "about":
                        $about = about::where('role', '2')->get();
                        $about = $about[0];
                        $this->bot->reply($about['description']);
                        break;
                }
            }
        });
    }
}
