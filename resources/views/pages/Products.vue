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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h5>Listing Products</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- <template>
                                            <vue-csv-import
                                                v-model="csv"
                                                :fields="{name: {required: false, label: 'Name'}, age: {required: true, label: 'Age'}}"
                                            >
                                                <vue-csv-toggle-headers></vue-csv-toggle-headers>
                                                <vue-csv-errors></vue-csv-errors>
                                                <vue-csv-input></vue-csv-input>
                                                <vue-csv-map></vue-csv-map>
                                            </vue-csv-import>
                                        </template> -->

                                        <div class="table-responsive"> 
                                            <table class="table table-rounded border border-gray-300 table-row-bordered table-row-gray-300 gy-7 gs-7" id="dataTable">
                                            <thead>
                                                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">                                                  
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>SKU</th> 
                                                    <th>Description</th>     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-for="product in products" :key="product.id">
                                                    <tr>
                                                        <td>{{ product.name }}</td>
                                                        <td>{{ product.price }}</td>
                                                        <td>{{ product.sku }}</td>
                                                        <td>{{ product.description }}</td>
                                                    </tr>
                                                </template>                                
                                            </tbody>
                                            </table>
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
// import {VueCsvImportPlugin} from "vue-csv-import";  

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