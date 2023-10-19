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
   <div class="card-sec mx-auto d-flex justify-content-center align-items-center  m-4 mt-10">
      <div class="col-md-12 m-0 p-0">
         <div class="table-wrapper m-0 p-0">
            <div class="table-title mb-3">
               <div class="row ">
                  <div class="d-flex justify-content-center justify-content-center">
                     <h2 class="ml-lg-2 text-white">Selectionner les Section que RH doit traiter </h2>
                  </div>
               </div>
            </div>
            <form class="row g-3 p-3">

               <ul v-for="(data, index) in dataSection" :key="index">
                  <li>
                     <div class="col-12">
                        <input type="checkbox" class="check mr-4" :value="data.section_code" v-model="section" placeholder="name@example.com">
                        <label for="floatingInput"><strong>({{ data.section_code }})-</strong> {{ data.section_libelle }}</label>
                     </div>
                  </li>
               </ul>
             
               <hr class="dropdown-divider" />
               <div class="d-flex align-items-md-start">
                  <button class="btn btn-lg btn-primary" @click.prevent="enregistre()" type="button">Enregistrer</button>
                  <RouterLink to="/user/list" class="btn btn-lg btn-danger" type="button">Annuler</RouterLink>
               </div>
            </form>
         </div>
      </div>

   </div>
</template>
 
<script>

import { accountService } from "@/_service";
import Swal from 'sweetalert2';


export default {
   name: 'UserAdd',

   data() {
      return {
         dataSection: [],
         section:[],
         matricule:''
      }
   },
   mounted() {
      this.getSection();
   },
   methods: {
      enregistre() {
         var donnee = new FormData();
         this.matricule = this.$route.params.id;

         if (this.setion != '' && this.matricule != '') {
            for (let i = 0; i < this.section.length; i++) {
               donnee.append('matricule', this.matricule);
               donnee.append('section', this.section[i]);
               console.log(this.section[i]);

               accountService.setSection(donnee).then((res) => {
                  if (res.data.error) {
                     console.log("error 1...!", res.data.message);

                  } else {
                     console.log("success 1...!", res.data.message);
                  
                     Swal.fire({
                        icon: 'success',
                        title: 'Enregistrement !',
                        text: `voulez-vous enregistrer ${this.section}`,
                        confirmButtonText: 'OK',
                        timer: 1000,

                     })
                     this.$router.push('/user/list')
                  }
               }).catch((err) => { console.log(err) });
            }
       

         } else {
            console.log('remplire bien les formulaire')

         }
         // #####################################

      },
      getSection() {
         accountService.allSection().then(res => {
            if (res.data.error) {
               console.log("error 1...!", res.data.message);
            } else {
               console.log("success 1...!", res.data.message);
               this.dataSection = res.data.dataSection;
               console.log(this.dataSection);
            }
         }).catch(err => { console.log(err) });
      }

   }
}
</script>
<style>
.card-sec {
   width: 70%;
}
</style>