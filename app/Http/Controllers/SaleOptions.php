<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;

use App\Models\project_properties;

class SaleOptions extends Conversation
{
    public function run()
    {
        $this->select_option();
    }

    public function select_option()
    {
        $question = Question::create("What Type of Unit? ")
            ->fallback("Sorry I did not understand that, please try again.")
            ->callbackId("sale_options")
            ->addButtons([
                Button::create("Pre-Selling")->value("pre_selling"),
                Button::create("RFO")->value("rfo"),
        ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    
                    case "pre_selling":
                        $reply = '<p>Here is a list of available units:<p>';

                        $where = [
                            'project_unit_category_description' => 'Pre-selling',
                            'project_unit_status' => 'Available',
                        ];
                
                        $sale_units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where($where)->orderBy('project_properties.project_name')->limit(10)->get();
                        foreach ($sale_units as $sale_unit) {
                            $reply .= "<p>$sale_unit->project_name - $sale_unit->project_unit_no</p><br>";
                        }
            
                        $this->bot->reply($reply);
                        break;

                    case "rfo":
                        $reply = '<p>Here is a list of available units:<p>';

                        $where = [
                            'project_unit_category_description' => 'RFO',
                            'project_unit_status' => 'Available',
                        ];
                
                        $sale_units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where($where)->orderBy('project_properties.project_name')->limit(10)->get();
                        foreach ($sale_units as $sale_unit) {
                            $reply .= "<p>$sale_unit->project_name - $sale_unit->project_unit_no</p><br>";
                        }
            
                        $this->bot->reply($reply);
                        break;
                }
            }
        });
    }
}
