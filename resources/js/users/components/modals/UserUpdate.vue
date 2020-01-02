<template>
    <div>
        <div class="card">
            <div class="card-body">
                
                <div class="form-group" v-if="!this.email">
                    <label class="label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" v-model="formData.email" :class="{ 'is-invalid': formData.errors.has('email') }">
                    <has-error :form="formData" field="email"></has-error>
                </div>
                <div class="form-group text-center">
                    <button
                        type="button"
                        class="btn btn-success mr-2"
                        @click.prevent="updateUser"
                        :disabled="formData.busy"
                    >Update</button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click="ok"
                    >Cancel</button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'email'],
        data () {
            return {
                formData: new Form({
                    email: ''
                })
            }
        },
        methods: {
            updateUser(){
                 this.formData.post(`/api/updateUser/${this.id}`)
                    .then(({ data }) => { 
                        this.$emit('close', {type: 'success', messege: 'Okey!! Good To Go!!'});
                        console.log(data) 
                    })
            },
            ok () {
                // close current modal dialog and return data
                this.$emit('close', {type: 'error', messege:'You have cancelled'})
                },
            
        },
        mounted(){
            email: this.email
        }
    }
</script>





