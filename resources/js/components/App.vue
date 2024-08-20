<template>
    <div class="game">
        <GameTitle />
        <PlayerScreen />
        <ChoiceBtnContainer />
        <GameStat />
        <GameOverMessage
            @on-reset="restart"
            v-if="this.store.winner"
            :message="gameOverMessage"
        />
    </div>
</template>

<script>
import { store } from "@/js/store.js";
import GameTitle from "@components/GameTitle.vue";
import PlayerScreen from "@components/PlayerScreen.vue";
import ChoiceBtnContainer from "@components/ChoiceBtnContainer.vue";
import GameStat from "@components/GameStat.vue";
import GameOverMessage from "@components/GameOverMessage.vue";
export default {
    name: "Game",
    components: {
        GameTitle,
        PlayerScreen,
        ChoiceBtnContainer,
        GameStat,
        GameOverMessage,
    },
    data() {
        return {
            store,
        };
    },
    computed: {
        gameOverMessage() {
            return this.store.winner == this.store.player1
                ? "You won"
                : "You lost";
        },
    },
    methods: {
        restart() {
            this.store.reset();
        },
    },
};
</script>
