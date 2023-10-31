
<template>
    <div class="card  m-0 p-4  ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 ">

            <div class="col ">
                <div class="border border-success card-stats shadow">
                    <div class="card-header pr-0">
                        <div class="icon icon-success">
                            <v-icon style="top: 0;" size="40">mdi-ansible</v-icon>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category">Avenant bientôt.</p>
                        <h5 class="card-title">70,340</h5>
                    </div>
                    <div class="card-footer ">
                        <div class="stats ">
                            <a href="#" class="text-black nav-link  d-flex justify-content-between align-items-center p-0">
                                Voir tout
                                <v-icon style="top: 0;" size="30">mdi-chevron-right</v-icon></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="border border-success card-stats shadow">
                    <div class="card-header pr-0">
                        <div class="icon icon-success">
                            <v-icon style="top: 0;" size="40">mdi-ansible</v-icon>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"> expirant bientôt.</p>
                        <h5 class="card-title">70,340</h5>
                    </div>
                    <div class="card-footer ">
                        <div class="stats ">
                            <a href="#" class="text-black nav-link  d-flex justify-content-between align-items-center p-0">
                                Voir tout
                                <v-icon style="top: 0;" size="30">mdi-chevron-right</v-icon></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="border border-info card-stats shadow">
                    <div class="card-header pr-0">
                        <div class="icon icon-info">
                            <v-icon style="top: 0;" size="40">mdi-alpha-c-box</v-icon>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category">Contrat achevé.</p>
                        <h5 class="card-title">70,340</h5>
                    </div>
                    <div class="card-footer ">
                        <div class="stats ">
                            <a href="#" class="text-black nav-link  d-flex justify-content-between align-items-center p-0">
                                Voir tout
                                <v-icon style="top: 0;" size="30">mdi-chevron-right</v-icon></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="border border-info card-stats shadow">
                    <div class="card-header pr-0">
                        <div class="icon icon-info">
                            <v-icon style="top: 0;" size="40">mdi-alpha-c-box</v-icon>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category">Bientôt expirant.</p>
                        <h5 class="card-title">70,340</h5>
                    </div>
                    <div class="card-footer ">
                        <div class="stats ">
                            <a href="#" class="text-black nav-link  d-flex justify-content-between align-items-center p-0">
                                Voir tout
                                <v-icon style="top: 0;" size="30">mdi-chevron-right</v-icon></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="border border-warning card-stats shadow">
                    <div class="card-header pr-0">
                        <div class="icon icon-warning">
                            <v-icon style="top: 0;" size="40">mdi-alpha-r-box</v-icon>
                        </div>
                    </div>
                    <div class="card-content">
                        <p class="category"> expirant bientôt.</p>
                        <h5 class="card-title">70,340</h5>
                    </div>
                    <div class="card-footer ">
                        <div class="stats ">
                            <a href="#" class="text-black nav-link  d-flex justify-content-between align-items-center p-0">
                                Voir tout
                                <v-icon style="top: 0;" size="30">mdi-chevron-right</v-icon></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

   <Graphe />

    
</template>

<script>

import Graphe from "@/components/Graphe.vue";
export default {
    name: 'DashBoard',
    components:{
        Graphe,
    },
    mounted() {
        const token = localStorage.getItem('token');

        if (token) {
            try {
                const decodedToken = atob(token);
                console.log('Valeur du token décrypté :', decodedToken);
            } catch (error) {
                console.error('Erreur lors du décodage du token :', error);
            }
        } else {
            console.log('Aucun token trouvé dans localStorage.');
        }
    },
    methods: {

    }
}
</script>
<style>
.text-black,
.stats {
    width: 100%;
}

.coll {
    width: 200px;
}
</style>