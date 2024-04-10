<template>
    <div class="container-xxl">    
        <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner d-flex justify-content-center">            
                <div class="card w-100">
                    <div class="card-body">
                        <h4 class="mb-2 text-center text-uppercase">Sign Up</h4>               
                        <form class="mb-3" @submit.prevent="register" method="POST">  
                            <div class="text-sm text-danger" if="errors != ''">
                                <p v-for="error in errors" class="mb-0" :key="error"><small>{{ error }} </small></p>
                            </div>                 
                            <div class="mb-3">
                                <label for="name" class="form-label required">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    v-model="form.name"
                                    placeholder="Enter your name"        
                                    onfocus="this.setSelectionRange(this.value.length,this.value.length)"
                                    autofocus
                                    required
                                /> 
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    v-model="form.email"
                                    placeholder="Enter your email"         
                                    required               
                                /> 
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label required" for="password">Password</label>                            
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    v-model="form.password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                    required
                                    />                                                                    
                                </div>
                            </div> 
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label required" for="password">Confirm Password</label>                            
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                    type="password"
                                    id="password_confirmation"
                                    class="form-control"
                                    name="password_confirmation"
                                    v-model="form.password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                    required
                                    />                                                                    
                                </div>
                            </div>       
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                                <div class="text-center">
                                    Already registered ? 
                                    <router-link :to="{ name : 'Login' }">Sign In</router-link>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>                
            </div>
        </div>
    </div>    
</template>
<style>
    @import '/admin/vendor/css/pages/page-auth.css' ;
</style>
<script>
import { ref, reactive } from 'vue';
import { useRouter } from 'vue-router';

export default {
    setup(){
        const errors  = ref([]);
        const router = useRouter()        
        const form = reactive({
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        });

        const register = async() => {           
            try{
                await axios.post('api/v1/register',form)
                formReset()
                const event = new CustomEvent('swal:block-notification', { detail: {
                    title: 'User created successfully',
                    icon: 'success'
                } });
            window.dispatchEvent(event);
                router.push({ name: "Login" });
            }catch(e){
                if(e.response.status == 422){
                    var data = [];
                    for(const key in e.response.data.errors){
                        data.push(e.response.data.errors[key][0]);
                    }
                    errors.value = data;
                }
            }
        }

        const formReset = () =>{            
            form.name = '';
            form.email = '';
            form.password = '';
            form.password_confirmation = '';
        }

        return {
            form,
            errors,
            register
        }
    }
}
</script>