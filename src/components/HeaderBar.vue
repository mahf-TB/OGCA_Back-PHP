<template>
  <!-- Navbar -->

  <div class="top-navbar">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid ">
        <div class="xp-breadcrumbbar d-flex text-center">
          <ol class="breadcrumb align-items-center">           
            <li>             
                <v-icon style="top: 0;margin-right: 10px;" size="35">mdi-chevron-left</v-icon>
            </li>
            <li class="breadcrumb-item" v-for="item in breadcrumbs" :key="item" :href="item.active ? '' : item.path"
              :active="item.active">
              {{ item.name }}

            </li>
          </ol>
        </div>



        <button class="d-inline-block d-lg-none ml-auto more-button " type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <v-icon style="top: 0;" size="35">mdi-dots-vertical</v-icon>

        </button>

        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
          id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
          
            <li class="dropdown nav-item border-user">
              <a href="#" class="nav-link text-white d-flex justify-content-around align-items-center "
                data-toggle="dropdown">
                <v-icon size="30" class="mr-3">mdi-account-circle</v-icon>
                <u>{{ this.nomConnecter }}</u>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <RouterLink class="dropdown-item d-flex justify-content-around align-items-center " to="/profile">
                    <v-icon> mdi-account</v-icon>Mon Profile</RouterLink>
                </li>
                <li v-if="ajouter">
                  <RouterLink class="dropdown-item d-flex justify-content-around align-items-center " to="/user/list">
                    <v-icon> mdi-account-group</v-icon>Nouvelle RH
                  </RouterLink>
                </li>
                <li v-if="ajouter">
                  <usecsv-button importerKey="53c08f3e-c394-4f41-8791-49dc252ded3a" :user="{ userId: '12345' }"
                    :metadata="{ anotherId: '123' }" :onData="onData" v-slot="slotProps">
                    <a class="dropdown-item d-flex justify-content-around align-items-center" style="font-size: 14px;"
                      @click="slotProps.openModal()">
                      <v-icon >mdi-file-excel</v-icon> Importer Data</a>
                  </usecsv-button>
                </li>
                <li>
                  <hr class="dropdown-divider" />
                  <a class="dropdown-item d-flex justify-content-around align-items-center " href="#"
                    @click.prevent="deconnecter()">
                    <v-icon> mdi-logout</v-icon>Se déconnecter</a>
                </li>


              </ul>
            </li>

          </ul>
        </div>


        <!-- Avatar -->

      </div>
    </nav>
  </div>

  <!-- Navbar -->
</template>

<script>
import { onMounted, ref } from 'vue';
import router from '@/router';
import { accountService } from "@/_service";
import UseCSVButton from "@usecsv/vuejs3";

export default {
  name: "HeaderBar",
  components: {
    "usecsv-button": UseCSVButton
  },
  setup() {
    const breadcrumbs = ref()

    const getBreadcrumbs = () => {
      return router.currentRoute.value.matched.map((route) => {
        return {
          active: route.path === router.currentRoute.value.fullPath,
          name: route.name,
          path: `${router.options.history.base}${route.path}`,
        }
      })
    }

    router.afterEach(() => {
      breadcrumbs.value = getBreadcrumbs()
    })

    onMounted(() => {
      breadcrumbs.value = getBreadcrumbs()
    })

    return {
      breadcrumbs,
    }
  },
  data() {
    return {
      ajouter: false,
      nomConnecter: '',
      sanctions: [],
    };
  },
  mounted() {
    const user = JSON.parse(localStorage.getItem("user-info"));
    this.nomConnecter = user[0].nom + ' ' + user[0].prenom;
    if (user[0].role == 'ADMIN') {
      this.ajouter = true;
    }
  },
  methods: {
    deconnecter() {
      localStorage.clear();
      this.$router.push({ name: 'Login' });
    },
    onData(results) {
      // Do something with the data here
      console.log('Rows => ', results.rows);
      var donnee = new FormData();

      for (let i = 0; i < results.rows.lenght; i++) {
        
        donnee.append('code', results.rows[i].col1);
        donnee.append('soa', results.rows[i].col2);
        donnee.append('libelle', results.rows[i].col3);

        accountService.addImport(donnee).then((res) => {
          if (res.data.error) {
            console.log("🚫error 1...!num:", i, res.data.message);
          } else {
            console.log("✅success 1...! num:", i, res.data.message);
          }
        }).catch((err) => { console.log(err) });
      }

    }
  },

}
</script>


<style>
.csv {
  font-size: 16px;
  display: flex;
  cursor: pointer;
  align-items: center;
  border: 1px solid #007bff;
  background-color: #007bff;
}

.csv:hover {
  border: 1px solid #4485ca;
  background-color: #36806c;

}

.border-user {
  border: 1px solid #198754;
}

.border-user:hover {
  background-color: #0f8364;
}
.mrg{
    margin: 0 5px;
}
</style>