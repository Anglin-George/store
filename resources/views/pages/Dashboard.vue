<template>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
        
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <router-link :to="{ name : 'Dashboard' }" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <span class="text-danger">Store</span>
                        </span>
                    </router-link>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <router-link :to="{ name : 'Dashboard' }" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </router-link>           
                    </li>
                    <li class="menu-item">
                        <router-link :to="{ name : 'Products' }" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div data-i18n="Analytics">Products</div>
                        </router-link>           
                    </li>
                    <li class="menu-item">
                        <router-link :to="{ name : 'Login' }" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-log-out"></i>
                            <div data-i18n="Analytics">Logout</div>
                        </router-link>           
                    </li>
                </ul>
            </aside>
            <div class="layout-page">              
                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">   
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">                        
                                        <div class="d-flex flex-wrap">
                                            <div class="p-3 rounded d-flex justify-content-center align-items-center alert-success me-3">                                        
                                                <i class="bx bx-category"></i>                                    
                                            </div> 
                                            <div class="d-flex flex-grow-1 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="mt-1">
                                                <h6 class="mb-0">Products</h6>
                                                <small class="d-block mb-1">{{ products.length }} added</small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                    <router-link :to="{ name : 'Products' }" class="btn btn-sm btn-outline-success">
                                                        View Products
                                                    </router-link>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>        
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</template>

<script>
import { ref,reactive, onMounted } from 'vue';
import axios from 'axios';    

export default{
    setup(){
			const products  = ref([]);

            const getProdcuts = async() =>{
				let res = await axios.get('api/v1/products');
				products.value = res.data.products;
			}
            onMounted(getProdcuts());

            return {
                products,
                getProdcuts
            }
    }
}
</script>