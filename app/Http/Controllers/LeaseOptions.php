<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Conversations\Conversation;

use App\Models\project_properties;

class LeaseOptions extends Conversation
{
    public function run()
    {
        $this->select_option();
    }

    public function select_option()
    {
        $question = Question::create("What Type of Unit? ")
            ->fallback("Sorry I did not understand that, please try again.")
            ->callbackId("lease_options")
            ->addButtons([
                Button::create("Residential")->value("residential"),
                Button::create("Commercial")->value("commercial"),
        ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    
                    case "residential":
                        $reply = '<p>Here is a list of available units:<p>';

                        $where = [
                            'project_unit_category_description' => 'Residential',
                            'project_unit_status' => 'Available',
                        ];
                
                        $sale_units = project_properties::join('project_units', 'project_properties.id', '=', 'project_units.project_properties_id')->where($where)->orderBy('project_properties.project_name')->limit(10)->get();
                        foreach ($sale_units as $sale_unit) {
                            $reply .= "<p>$sale_unit->project_name - $sale_unit->project_unit_no</p><br>";
                        }
            
                        $this->bot->reply($reply);
                        break;

                    case "commercial":
                        $reply = '<p>Here is a list of available units:<p>';

                        $where = [
                            'project_unit_category_description' => 'Commercial',
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
