import { reactive } from "vue";

const choices = ["rock", "paper", "scissor"];

export const store = reactive({
    player1: {
        score: 0,
        label: "Human",
        choice: null,
    },
    player2: {
        score: 0,
        label: "Computer",
        choice: null,
    },
    rounds: 100,
    currentRound: 1,
    drawCount: 0,
    winner: null,
    setPlayer1Score(score) {
        this.player1.score = score;
    },
    setPlayer2Score(score) {
        this.player2.score = score;
    },
    setDrawCount(drawCount) {
        this.drawCount = drawCount;
    },
    setCurrentRound(currentRound) {
        this.currentRound = currentRound;
    },
    setWinner(winner) {
        this.winner = winner;
    },
    setPlayer1Choice(choice) {
        this.player1.choice = choice;
    },
    setPlayer2Choice(choice) {
        this.player2.choice = choice;
    },
    nextMoveOfPlayer2(player1Selection) {
        const player2Choice =
            choices[Math.floor(Math.random() * choices.length)];
        this.setPlayer2Choice(player2Choice);
        const player1Score = this.player1.score;
        const player2Score = this.player2.score;

        if (this.currentRound >= this.rounds) {
            const winner =
                this.player1.score > this.player2.score
                    ? this.player1
                    : this.player2;
            this.setWinner(winner);
            return;
        }

        if (player1Selection === choices[0]) {
            if (player2Choice === choices[0]) {
                const drawCount = this.drawCount;
                this.setDrawCount(drawCount + 1);
            } else if (player2Choice === choices[1]) {
                this.setPlayer2Score(player2Score + 1);
            } else {
                this.setPlayer1Score(player1Score + 1);
            }
        }
    },
    reset() {
        this.player1.score = 0;
        this.player1.choice = null;
        this.player2.score = 0;
        this.player2.choice = null;

        this.currentRound = 1;
        this.drawCount = 0;
        this.winner = 0;
    },
});
