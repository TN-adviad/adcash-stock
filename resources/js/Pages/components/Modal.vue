<template>
    <div class="modal" @click="closeModal">
        <div class="modal-content" @click.stop>
            <slot></slot>
            <button class="close-button" @click="closeModal">Close</button>
        </div>
    </div>
</template>

<script>

export default {
    setup(props, { emit }) {
        const closeModal = () => {
            emit('close');
        };

        return {
            closeModal
        };
    }
};
</script>

<style scoped>
/* Styles for the modal */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.49);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    position: relative;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>
