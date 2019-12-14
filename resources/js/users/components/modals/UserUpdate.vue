<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row" v-if="!this.firstName">
                    <div class="col">
                        <label for="first_name" class="label">First Name</label>
                        <input type="text" class="form-control" id="first_name" v-model="formData.first_name" :class="{ 'is-invalid': formData.errors.has('first_name') }">
                        <has-error :form="formData" field="first_name"></has-error>
                    </div>
                    <div class="col">
                        <label for="last_name" class="label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" v-model="formData.last_name" :class="{ 'is-invalid': formData.errors.has('last_name') }">
                        <has-error :form="formData" field="last_name"></has-error>
                    </div>
                </div>
                <div class="form-group" v-if="!this.email">
                    <label class="label" for="email">Email</label>
                    <input type="email" class="form-control" id="email" v-model="formData.email" :class="{ 'is-invalid': formData.errors.has('email') }">
                    <has-error :form="formData" field="email"></has-error>
                </div>
                <div class="form-group" v-if="!this.dob">
                    <label for="dob" class="label"></label>
                    <input type="date" class="form-control" id="dob" v-model="formData.dob" :class="{ 'is-invalid': formData.errors.has('dob') }">
                    <has-error :form="formData" field="dob"></has-error>
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
        props: ['id', 'firstName', 'lastName', 'email', 'dob'],
        data () {
            return {
                formData: new Form({
                    // first_name: '',
                    // last_name: '',
                    // email: '',
                    // dob: null
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
            let dataObj = {
                first_name: this.firstName,
                last_name: this.lastName,
                email: this.email,
                dob: this.dob
            };

            for (var propName in dataObj) { 
                if (dataObj[propName] === null || dataObj[propName] === undefined) {
                    this.$set(this.formData, propName, dataObj[propName])
                }
            }
           
        }
    }
</script>





