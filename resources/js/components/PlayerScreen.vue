<template>
    <section class="bg-black bg-opacity-30 py-3 mb-5">
        <div class="container mx-auto p-2">
            <div class="flex justify-evenly items-center">
                <div class="w-1/3 flex justify-start">
                    <img
                        src="@/images/player.png"
                        alt="player"
                        width="80"
                        height="80"
                    />
                </div>
                <div
                    class="w-[80px] h-[80px] bg-black text-center border-2 border-gray-500 rounded-full flex justify-center items-center"
                >
                    <img
                        src="@/images/battle.png"
                        alt="player"
                        width="40"
                        height="40"
                    />
                </div>
                <div class="w-1/3 flex justify-end">
                    <img
                        src="@/images/computer.png"
                        alt="computer"
                        width="80"
                        height="80"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "player-screen",
};
</script>
