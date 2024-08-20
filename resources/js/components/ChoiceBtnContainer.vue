<template>
    <section class="container mx-auto p-2 mb-5">
        <div class="flex justify-center items-center">
            <div
                class="border-2 border-gray-300 rounded-md p-[10px] max-w-[400px] flex justify-center items-center gap-2"
            >
                <ChoiceBtn
                    @on-btn-click="onRockButtonClick"
                    button-type="rock"
                    :is-disabled="isRockButtonDisabled"
                >
                    <img
                        src="@/images/rock.png"
                        alt="Rock"
                        width="40"
                        height="40"
                    />
                </ChoiceBtn>
                <template v-if="otherBtnsEnabled">
                    <ChoiceBtn>
                        <img
                            src="@/images/paper.png"
                            alt="Paper"
                            width="40"
                            height="40"
                        />
                    </ChoiceBtn>
                    <ChoiceBtn>
                        <img
                            src="@/images/scissor.png"
                            alt="Scissor"
                            width="40"
                            height="40"
                        />
                    </ChoiceBtn>
                </template>
            </div>
        </div>
    </section>
</template>

<script>
import ChoiceBtn from "@components/ChoiceBtn.vue";
import { store } from "@/js/store.js";
export default {
    name: "Choices",
    components: {
        ChoiceBtn,
    },
    data() {
        return {
            otherBtnsEnabled: false,
            isRockButtonDisabled: false,
            store,
        };
    },
    methods: {
        onRockButtonClick(buttonType) {
            this.store.setPlayer1Choice(buttonType);
            this.isRockButtonDisabled = true;
            const currentRound = this.store.currentRound;
            this.store.setCurrentRound(currentRound + 1);
            this.store.nextMoveOfPlayer2(buttonType);

            setTimeout(() => {
                this.isRockButtonDisabled = false;
            }, 1000);
        },
    },
};
</script>
