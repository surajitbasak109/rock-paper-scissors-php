<template>
    <header class="container mx-auto p-2 mb-5">
        <div class="flex justify-center items-center flex-col">
            <TitleBorder />
            <h1 class="game_title">Rock, Paper and Scissors</h1>
            <TitleBorder />
        </div>
    </header>
</template>

<script>
import TitleBorder from "@components/TitleBorder.vue";
export default {
    name: "game-title",
    components: {
        TitleBorder,
    },
};
</script>
