<template>
    <button
        @click="onBtnClick"
        :disabled="isDisabled"
        class="bg-black bg-opacity-50 p-2 outline-none border-2 border-purple-950 rounded-md cursor-pointer hover:bg-red-800 hover:border-red-500 disabled:bg-gray-700 disabled:cursor-not-allowed"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: "choice-button",
    props: {
        buttonType: {
            required: true,
            type: String,
        },
        isDisabled: {
            default: false,
            type: Boolean,
        },
    },
    methods: {
        onBtnClick() {
            this.$emit("on-btn-click", this.buttonType);
        },
    },
};
</script>
