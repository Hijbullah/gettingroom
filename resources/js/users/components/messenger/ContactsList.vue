<template>
    <div class="contacts-list">
        <ul>
            <li class="bg-white">
                 <div class="avatar">
                    <img :src="user.avatar ? '/storage/' + user.avatar : '/frontend/images/user-defult.png'" alt="user.first_name">
                </div>
                <div class="contact">
                    <p class="name">{{ user.first_name }}</p>
                </div>
            </li>
            <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                <div class="avatar">
                    <img :src="contact.avatar ? '/storage/' + contact.avatar : '/frontend/images/user-defult.png'" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{ contact.first_name }}</p>
                </div>
                <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            },
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selected: this.contacts.length ? this.contacts[0] : null
            };
        },
        methods: {
            selectContact(contact) {
                this.selected = contact;

                this.$emit('selected', contact);
            }
        },
        computed: {
            // fullName(){
            //     return this.contact.first_name + ' ' + this.contact.last_name;
            // },
            sortedContacts() {
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }

                    return contact.unread;
                }]).reverse();
            }
        }
    }
</script>

<style lang="scss" scoped>
.contacts-list {
    flex: 1;
    max-height: 100%;
    height: 600px;
    overflow: auto;
    border-left: 1px solid #a6a6a6;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaaaaa;
            height: 50px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 1;
                display: flex;
                align-items: center;

                img {
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0;

                    &.name {
                        font-weight: 400;
                        font-size: 16px;
                    }
                }
            }
        }
    }
}
</style>
