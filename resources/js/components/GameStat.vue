<template>
    <footer class="container mx-auto p-2">
        <div class="mt-[-5px] border-2 border-white text-white p-4 relative">
            <h3 class="game_stat_title">Statistics</h3>
            <div class="text-center mt-3">
                Round: {{ this.store.currentRound }}/{{ this.store.rounds }}
            </div>
            <div class="text-center mt-1">
                Draw: {{ this.store.drawCount }}
            </div>
            <div class="flex justify-around">
                <div class="w-1/2">
                    <div class="mb-1">
                        Player 1 ({{ this.store.player1.label }}) Score:
                        {{ this.store.player1.score }}
                    </div>
                    <div>
                        Player 1 ({{ this.store.player1.label }}) Choice:
                        {{ this.store.player1.choice ?? "___" }}
                    </div>
                </div>
                <div class="w-1/2 text-right">
                    <div class="mb-1">
                        Player 2 ({{ this.store.player2.label }}) Score:
                        {{ this.store.player2.score }}
                    </div>
                    <div>
                        Player 2 ({{ this.store.player2.label }}) choice:
                        {{ this.store.player2.choice ?? "___" }}
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import { store } from "@/js/store.js";
export default {
    name: "game-statistics",
    data() {
        return { store };
    },
};
</script>
