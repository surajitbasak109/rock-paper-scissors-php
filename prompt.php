<?php

class BasePlayer
{
    /**
     * Score
     *
     * @var integer
     */
    protected int $score = 0;

    /**
     * Choice
     *
     * @var string|null
     */
    protected ?string $choice = null;

    /**
     * @param Game $game
     */
    public function __construct(protected Game $game) {}

    /**
     * Get the player score
     *
     * @return integer
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * Set player score
     *
     * @param integer $score
     * @return void
     */
    public function setScore(int $score): Computer | Human
    {
        $this->score = $score;
        return $this;
    }

    /**
     * Set player choice
     *
     * @param string $choice
     * @return Computer|Human
     */
    public function setChoice(string $choice): Computer | Human
    {
        $this->choice = $choice;
        return $this;
    }

    /**
     * Get the player choice
     *
     * @return string
     */
    public function getChoice(): string
    {
        return $this->choice;
    }

    /**
     * Reset player attributes
     *
     * @return void
     */
    public function reset(): void
    {
        $this->score = 0;
        $this->choice = null;
    }
}

class Human extends BasePlayer
{
    /**
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        parent::__construct($game);
    }
}

class Computer extends BasePlayer
{
    /**
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        parent::__construct($game);
    }

    /**
     * Run computer's next move
     *
     * @return Computer
     */
    public function nextMove(): Computer
    {
        $choices = $this->game->getChoices();
        $this->choice = $choices[array_rand($choices)];
        return $this;
    }
}

class Game
{
    /**
     * Rounds of the game
     *
     * @var integer
     */
    private int $rounds = 100;

    /**
     * Human player
     *
     * @var Human
     */
    private Human $human;

    /**
     * Computer player
     *
     * @var Computer
     */
    private Computer $computer;

    /**
     * How many draw that happenned
     *
     * @var integer
     */
    private int $drawCount = 0;

    /**
     * Current round
     *
     * @var integer
     */
    private int $currentRound = 0;

    /**
     * Choices
     *
     * @var array
     */
    private array $choices = ["rock", "paper", "scissor"];

    /**
     * Winner of the game
     *
     * @var Human|Computer
     */
    private Human|Computer $winner;

    public function __construct()
    {
        $this->human = new Human($this);
        $this->computer = new Computer($this);

        $this->human->setChoice($this->choices[0]);
    }

    /**
     * Set the current round
     *
     * @param integer $round
     * @return Game
     */
    public function setCurrentRound(int $round): Game
    {
        $this->currentRound = $round;
        return $this;
    }

    /**
     * Get all choices
     *
     * @return array
     */
    public function getChoices(): array
    {
        return $this->choices;
    }

    /**
     * Calculate player score
     *
     * @return void
     */
    public function calculateScore(): void
    {
        $computerChoice = $this->computer->getChoice();
        if ($this->human->getChoice() === $this->choices[0]) {
            if ($computerChoice === $this->choices[0]) {
                $this->drawCount++;
            } else if ($computerChoice === $this->choices[1]) {
                $this->computer->setScore($this->computer->getScore() + 1);
            } else if ($computerChoice === $this->choices[2]) {
                $this->human->setScore($this->human->getScore() + 1);
            }
        }
    }

    /**
     * Decide game over text, who won this game?
     *
     * @return string
     */
    public function getGameOverText(): string
    {
        $gameOverText = "No one wins yet";
        if ($this->currentRound >= $this->rounds) {
            if ($this->human->getScore() > $this->computer->getScore()) {
                $gameOverText = "You won";
            } else {
                $gameOverText = "You lost";
            }
        }

        return $gameOverText;
    }

    /**
     * Show game summary
     *
     * @return void
     */
    private function showSummary(): void
    {
        $humanScore = $this->human->getScore();
        $computerScore = $this->computer->getScore();
        echo "-----------------------Summary------------------------\nRound: $this->currentRound/$this->rounds                                    Draw: $this->drawCount\nPlayer 1 Score: $humanScore                    Player 2 Score: $computerScore\n------------------------------------------------------\n\n";
    }

    private function showGameOverText($text): void
    {
        echo "------------------------*****-------------------------\n";
        echo "                       $text                 \n";
        echo "------------------------*****-------------------------\n";
    }

    public function run(): void
    {
        do {
            $this->currentRound++;
            echo "-----------------------Round: " . $this->currentRound . "-----------------------
                Your choice is [" . $this->human->getChoice() . "]
                Player 2 is thinking...\n";
            sleep(2);
            $this->computer->nextMove();
            echo "              Player 2 selected [" . $this->computer->getChoice() . "]\n";
            $this->calculateScore();
            $this->showSummary();
            sleep(1);
        } while ($this->currentRound < $this->rounds);

        sleep(1);
        $this->showGameOverText($this->getGameOverText());
    }
}

$welcomeMessage = "|---------------------------^^^^^----------------------|
    Welcome to [Rock, Paper and Scissors] game.
|---------------------------vvvvv----------------------|\n\n";


echo $welcomeMessage;
sleep(2);

$game = new Game();
$game->run();
