<template>
    <div class="game_over_message">
        <TitleBorder />
        <h2 class="text-xl sm:text-2xl md:text-3xl text-center text-white">
            {{ message }}
        </h2>

        <div class="flex justify-center items-center w-full">
            <button @click="$emit('on-reset')">
                <img src="@/images/play-again.png" alt="Play again" />
            </button>
        </div>

        <TitleBorder />
    </div>
</template>

<script>
import TitleBorder from "@components/TitleBorder.vue";
export default {
    name: "game-over-message",
    components: {
        TitleBorder,
    },
    props: {
        message: {
            default: "No one wins yet.",
            type: String,
        },
    },
};
</script>
