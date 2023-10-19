<template>
    <div class="sidebar-header">
        <h3 class="text-size"><img :src="require('@/assets/SRSP-LOGO.png')" height="40" alt="MDB Logo"
                loading="lazy" /><span>Avancement
                Contractuel & Retraite</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="">
            <RouterLink to="/dashboard" class="text-white"> <v-icon style="top: 0;">mdi-monitor-dashboard</v-icon>
                <span>Dashboard</span>
            </RouterLink>
        </li>

        <hr class="dropdown-divider" />

        <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <v-icon style="top: 0;">mdi-ansible</v-icon><span class="text-white">Avancement</span></a>
            <ul class="collapse list-unstyled menu pl-4" id="homeSubmenu1">
                <li>
                    <RouterLink class="text-white" style="font-size: 14px;" aria-current="page" to="/avancement">Liste
                        complète</RouterLink>
                </li>
                <li>
                    <RouterLink to="#" style="font-size: 14px;" class="text-white">Avancement bientôt </RouterLink>
                </li>
                <li>
                    <a href="#" style="font-size: 14px;" class="text-white">Avancement en retard</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <v-icon style="top: 0;">mdi-alpha-c-box</v-icon><span class="text-white">Contractuel</span></a>
            <ul class="collapse list-unstyled menu pl-4" id="pageSubmenu2">
                <li>
                    <RouterLink to="/contractuel" style="font-size: 14px;" class="text-white">Liste complète</RouterLink>
                </li>
                <li>
                    <RouterLink to="#" style="font-size: 14px;" class="text-white">Fin Contrat dans 6 mois</RouterLink>
                </li>
                <li>
                    <RouterLink to="#" style="font-size: 14px;" class="text-white">Contrat en retard</RouterLink>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <v-icon style="top: 0;">mdi-alpha-r-box</v-icon>
                <span class="text-white">Retraite</span></a>
            <ul class="collapse list-unstyled menu pl-4" id="pageSubmenu3">
                <li>
                    <RouterLink to="/retraite" class="text-white">Retraiter dans 6 mois</RouterLink>
                </li>
                <li>
                    <RouterLink to="#" class="text-white">Page 3</RouterLink>
                </li>
            </ul>
        </li>


        <hr class="dropdown-divider" />
        <li class="" v-if="ajouter">
            <usecsv-button importerKey="53c08f3e-c394-4f41-8791-49dc252ded3a" :user="{ userId: '12345' }"
                :metadata="{ anotherId: '123' }" :onData="onData" v-slot="slotProps">
                <a href="#" class="text-white" @click="slotProps.openModal()">
                    <v-icon style="top: 0;">mdi-import</v-icon><span>Importer Data</span>
                </a>
            </usecsv-button>

        </li>
        <li class="">
            <a href="#" class="text-white"><v-icon style="top: 0;">mdi-cog</v-icon><span>Parametre</span></a>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'HomePage',
    data() {
    return {
      ajouter: false,
    };
  },
    mounted() {
    const user = JSON.parse(localStorage.getItem("user-info"));
    this.nomConnecter = user[0].nom + ' ' + user[0].prenom;
    if (user[0].role == 'ADMIN') {
      this.ajouter = true;
    }
  },
}
</script>
<style>
.text-size {
    font-size: 18px;
}

.fotsy a {
    color: white;
}
</style>
