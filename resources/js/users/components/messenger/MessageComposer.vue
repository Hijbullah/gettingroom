<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Write message..."></textarea>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();
                
                if (this.message == '') {
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>

<style lang="scss" scoped>
.composer textarea {
    width: 99%;
    resize: none;
    margin-left: 1%;
    border-radius: 3px;
    border: 1px solid lightgray;
    padding: 6px;
}
</style>

