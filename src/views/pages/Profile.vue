<template>
    <section class="h-100 gradient-custom-2">
        <div class="container p-0 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row"
                            style="background-color: #0f8364; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img :src="require('@/assets/logo.png')" alt="Generic placeholder image"
                                    class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">

                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" data-toggle="modal" data-target="#exampleModalCenter"
                                    style="z-index: 1;">
                                    Edit profile
                                </button>
                                <!-- Modal EditProfile -->
                                <EditProfile/>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                                <h5>{{ user.nom }} {{ user.prenom }}</h5>
                                <p>{{ user.role }}</p>
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
                                            <p class="text-muted mb-0">{{ user.matricule }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">NOM</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ user.nom }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">PRENOM</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ user.prenom }} </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">RÔLE</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> {{ user.role }}</p>
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

    </section>
</template>

<script>
import EditProfile from "@/components/EditProfile.vue";
import { accountService } from "@/_service";
export default {
    name: 'Profile',
    components:{
        EditProfile
    },
    data() {
        return {
            user: {
                matricule: '',
                nom: '',
                prenom: '',
                role: '',
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
                    
                    this.user.matricule = userDB[0].matricule;
                    this.user.nom = userDB[0].nom;
                    this.user.prenom = userDB[0].prenom;
                    this.user.role = userDB[0].role;

                    this.motdepasse = userDB[0].password;
                }
            } catch (err) {
                console.log(err);
            }
        },
    }
}

</script>
<style></style>