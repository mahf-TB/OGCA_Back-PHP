<template>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 class="text-size"><img :src="require('@/assets/SRSP-LOGO.png')" height="40" alt="MDB Logo" loading="lazy" /><span>Avancement
                    Contractuel & Retraite</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="">
                <RouterLink to="/dashboard"  class="text-white"> <v-icon style="top: 0;">mdi-monitor-dashboard</v-icon>
                    <span>Dashboard</span></RouterLink>
            </li>

            <hr class="dropdown-divider" />
        
            <li class="dropdown">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle " >
                    <v-icon style="top: 0;">mdi-ansible</v-icon><span class="text-white">Avancement</span></a>
                <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                    <li>
                        <RouterLink class="text-white" aria-current="page" to="/avancement">Liste Tout</RouterLink>
                    </li>
                    <li>
                        <a href="#" class="text-white">Home 2</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Home 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <v-icon style="top: 0;">mdi-alpha-c-box</v-icon><span class="text-white">Contractuel</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                    <li>
                        <a href="#" class="text-white">Page 1</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Page 2</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <v-icon style="top: 0;">mdi-alpha-r-box</v-icon>
                    <span class="text-white">Retraite</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                    <li>
                        <a href="#" class="text-white">Page 1</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Page 2</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Page 3</a>
                    </li>
                </ul>
            </li>
            

            <hr class="dropdown-divider" />
            <li class="">
                <a href="#" class="text-white">
                    <v-icon style="top: 0;">mdi-import</v-icon><span>Importer Data</span></a>
            </li>
            <li class="">
                <a href="#" class="text-white"><v-icon style="top: 0;">mdi-cog</v-icon><span>Parametre</span></a>
            </li>
        </ul>


    </nav>
</template>

<script>
export default {
    name: 'HomePage',
}
</script>
<style>
.text-size{
    font-size: 18px;
}
.fotsy  a{
    color: white;
}
</style>
