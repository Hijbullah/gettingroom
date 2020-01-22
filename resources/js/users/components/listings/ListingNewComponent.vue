<template>
    <section class="new-listing-area p-2 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="new-listing text-center mb-5">
                        <h2 class="font-40 p-3 mb-3 font-weight-normal">What are you looking for?</h2>
                        <div class="left d-inline-block button"
                            @click.prevent="selected = 'place'"
                            :class="this.selected == 'place' ? 'active' : ''"
                        >Places</div>
                        <div class="right d-inline-block button" 
                            @click.prevent="selected = 'people'"
                            :class="this.selected == 'people' ? 'active' : ''"
                        >People</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                    <h4 class="text-center mb-3">Select one:</h4>
                    <div class="places" v-if="selected == 'place'">
                        <div class="row">
                            <div class="col-6">
                                <div class="card font-20 text-center h-100" @click.stop="selectedOption('needrooms', $event)">
                                    <p>I'm looking for a room</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card font-20 text-center h-100" @click.stop="selectedOption('needapartments', $event)">
                                    <p>I'm looking for an entire place</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="people" v-else>
                        <div class="row">
                            <div class="col-6">
                                <div class="card font-20 text-center h-100" @click.stop="selectedOption('offerrooms', $event)">
                                    <p>I'm Offering for a room</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card font-20 text-center h-100" @click.stop="selectedOption('offerapartments', $event)">
                                    <p>I'm Offering for an entire place</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import UserUpdate from '../modals/UserUpdate.vue'
    export default {
        props:['userId'],
        data() {
            return{
                selected: 'place',
                user: {},
                userNeedToUpdate: false
            }
        },
        methods: {
            selectedOption(option, event)
            {
                if(this.userNeedToUpdate){
                    this.updateUser();
                }else{
                    event.currentTarget.classList.add('active');
                    window.location.href = `/${option}/create`;
                }
                // alert(option)
            },
            updateUser(){
                
                this.$dlg.modal(UserUpdate, {
                        width: 600,
                        height: 400,
                        title: 'We need Some more info About YOu',
                        params: {
                            id: this.user.id,
                            email: this.user.email,
                        },
                        callback: data =>{
                        this.$dlg.alert(`${data.messege}`, {
                                messageType: data.type,
                                language: 'en'
                            })
                        }
                    })
              
            },
            getUser(id){
                axios.get(`/api/getUser/${id}`)
                    .then( res => {
                       console.log(res.data)
                       this.user = res.data;
                       if(!this.user.email){
                           this.userNeedToUpdate = true;
                       }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created(){
            // console.log(this.userId);
            this.getUser(this.userId);
            
        }
    }
</script>
