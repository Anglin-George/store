require('./bootstrap');
import { createApp  } from 'vue';
import App from './App.vue'
import router from './router';
import {VueCsvImportPlugin} from "vue-csv-import";

createApp(App).use(router, VueCsvImportPlugin).mount("#app")

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.addEventListener('swal:notification',function(e){ 
    Toast.fire({
    icon: e.detail.icon,
    title: e.detail.title
    });
}); 
window.addEventListener('swal:block-notification',function(e){ 
    Swal.fire({
    icon: e.detail.icon,
    title: e.detail.title,
    timer: 2000,
    timerProgressBar: true,
    });
}); 