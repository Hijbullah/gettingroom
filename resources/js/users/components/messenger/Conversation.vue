<template>
    <div class="conversation">
        <h1 class="py-3 px-4">{{ contact ? fullName : 'Select a Contact' }}</h1>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }

                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            }
        },
        computed: {
            fullName(){
                return this.contact.first_name + ' ' + this.contact.last_name;
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style lang="scss" scoped>
.conversation {
    flex: 2;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    h1 {
        font-size: 18px;
        margin: 0;
        border-bottom: 1px dashed lightgray;
    }
}
</style>
