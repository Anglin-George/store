<template>
    <div class="container-xxl">    
        <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner d-flex justify-content-center">            
                <div class="card w-100">
                    <div class="card-body">
                        <h4 class="mb-2 text-center text-uppercase">Sign in</h4>               
                        <form class="mb-3" @submit.prevent="login">   
                            <div class="text-sm text-danger" if="errors != ''">
                                <p v-for="error in errors" class="mb-0" :key="error"><small>{{ error }} </small></p>
                            </div>                 
                            <div class="mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    v-model="form.email"
                                    placeholder="Enter your email"
                                    onfocus="this.setSelectionRange(this.value.length,this.value.length)"
                                    autofocus
                                />                  
                                    <!-- <div class="d-inline-block invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div> -->
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
                                    />                                                                    
                                </div>
                            </div>        
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                <div class="text-center">
                                    New user ? 
                                    <router-link :to="{ name : 'Register' }">Sign Up</router-link>
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
        const router = useRouter();
        const form = reactive({
            email: '',
            password: '',
        });

        const login = async() => {           
            try{
                await axios.post('api/v1/login',form).then( res => {
                    if(res.data.status == 200){
                        formReset()
                        const event = new CustomEvent('swal:block-notification', { detail: {
                            title: res.data.message,
                            icon: 'success'
                        } });
                        window.dispatchEvent(event);
                        /* commit("setUserData", res.data.user); */
                        /* store.setItem('setUserData', res.data.user); */
                        localStorage.setItem('authToken', res.data.token);
                        router.push({ name: "Dashboard" });
                    }else if(res.data.status == 401){
                        const event = new CustomEvent('swal:block-notification', { detail: {
                            title: res.data.message,
                            icon: 'error'
                        } });
                        window.dispatchEvent(event);
                    } 
                });               
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
            login
        }
    }
}
</script>