<template>
    <div class="card mt-0  p-3">
         <div class="col-md-5 col-lg-3 order-3 order-md-2">
             <div class="xp-searchbar">
                 <form>
                     <div class="input-group" style="width: 300px;">
                         <input type="search" class="form-control" placeholder="Search">
                         <div class="input-group-append">
                             <button class="btn" type="submit" id="button-addon2">RECHERCHE</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
    <div class="card p-3" >
       <DataTable />
    </div>
 </template>
 
 <script>
 import sousHeader from "@/components/sousHeader.vue";
 import DataTable from '@/views/datatables/Datatable.vue';
 export default {
    name: 'Contractuel',
    components: {
       DataTable,sousHeader
    }
 }
 </script>
