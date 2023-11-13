<template>
    <section class="h-100 gradient-custom-2">
        <div class="container p-0 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row"
                            style="background-color: #0f8364; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img :src="require('@/assets/pdp-avatar.jpeg')" alt="Generic placeholder image"
                                    class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">

                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" @click.prevent="showModal()"
                                    style="z-index: 1;">
                                    Edit profile
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{ users.nom }} {{ users.prenom }}</h5>
                                <p>{{ users.role }}</p>
                            </div>
                        </div>
                        <div class="p-4 text-black" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h5">253</p>
                                    <p class="small text-muted mb-0">Photos</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5">1026</p>
                                    <p class="small text-muted mb-0">Followers</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5">478</p>
                                    <p class="small text-muted mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-2 pb-2 pl-4 pr-4 text-black">
                            <div class="mb-5">
                                <div class=" pt-2 pb-2 pl-4 pr-4" style="background-color: #f8f9fa;">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">MATRICULE</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ users.matricule }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">NOM</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ users.nom }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">PRENOM</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ users.prenom }} </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">RÔLE</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> {{ users.role }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                           
                                <!-- Modal EditProfile -->
        <EditProfile ref="ModalRef" :dataInfo="users"/>     
    </section>
</template>

<script>
import { onMounted, ref, nextTick } from 'vue';
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min.js';
import EditProfile from "@/components/EditProfile.vue";
import { accountService } from "@/_service";
export default {
    name: 'Profile',
    components:{
        EditProfile
    },
    data() {
        return {
            users: {
                matricule: '',
                nom: '',
                prenom: '',
                role: '',
                motdepasse:''
            },
        }
    },
    mounted(){
        this.getUserInfo();
    },
    methods:{
        async getUserInfo(){

            const user = JSON.parse(localStorage.getItem("user-info"));
            var donnee = new FormData();
            donnee.append('matricule', user[0].matricule);
            try {
                const res = await accountService.getUserEdit(donnee);
                if (res.data.error) {
                    console.log("error 1...!", res.data.message);
                } else {
                    console.log("success 1...!", res.data.message); 

                    var userDB = res.data.infoBD;

                    this.users.matricule = userDB[0].matricule;
                    this.users.nom = userDB[0].nom;
                    this.users.prenom = userDB[0].prenom;
                    this.users.role = userDB[0].role;
                    this.users.motdepasse = userDB[0].password;
                }
            } catch (err) {
                console.log(err);
            }
        },

        // async showModal(){
        //     this.userInfo = this.users;
        //     await nextTick(); // Attendre que Vue mette à jour les données
        //     this.ModalRef.openModal();
        // }
    },
     setup() {
    let myModal;
    let userInfo = ref(null);

    onMounted(() => {
      myModal = new bootstrap.Modal(document.getElementById('modalCenter'));
    });

    const ModalRef = ref(null);
    const showModal = async () => {
      await nextTick(); // Attendre que Vue mette à jour les données
      ModalRef.value.openModal();
    };

    return {
      ModalRef,
      showModal,
      userInfo,
    };
  },
}

</script>
<style></style>