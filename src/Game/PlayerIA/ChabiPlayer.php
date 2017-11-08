<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class ChabiPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class ChabiPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

        $paper = parent::paperChoice();
        $scissor = parent::scissorsChoice();
        $rock = parent::rockChoice();

        if ($this->result->getNbRound() == 0){
            return $paper;
        }

        if($this->result->getNbRound() == 1){
            return $paper;
        }
        
        if($this->result->getNbRound() == 3){
            return $paper;
        }

        if($this->result->getNbRound() == 4){
            return $paper;    
        }
        
        if($this->result->getNbRound() == 5){
            return $scissor;                 
        }
        
        if($this->result->getNbRound() == 6){
            return $rock;                             
        }

        if($this->result->getNbRound() == 7){
            return $rock;                            
        }  
        
        if($this->result->getNbRound() == 8){
            return $paper;                                   
        }
        
        if($this->result->getNbRound() == 9){
            return $paper;                                   
        }
        
        $last = 1;
            for ($i = 0; $i < $this->result->getNbRound(); $i++)
            {
                $oppo = $this->result->getChoicesFor($this->opponentSide);

                if($this->result->getLastChoiceFor($this->opponentSide) == $oppo[$i]){
                    $last++;
                }
            }
            if ($last/($this->result->getNbRound()+1) < 0.36)
            {
                if ($this->result->getLastChoiceFor($this->opponentSide) == $scissor)
                return $rock; 
                elseif ($this->result->getLastChoiceFor($this->opponentSide) == $rock)
                return $paper;
                else
                return $scissor;
            }
                                          
        return $rock;
    }
};