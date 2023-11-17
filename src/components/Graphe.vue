<template>
    <div class="row p-4">
        <div class="col">
            <div class="card" style="min-height: 600px">
                <div class="card-header card-header-text">
                    <h4 class="card-title">Statistique des Agents par catégorie</h4>
                    <p class="category">New employees on 15th December, 2016</p>
                </div>
                <div class="card-content table-responsive">
                    <canvas id="goodCanvas1" width="600" height="390" aria-label="Hello ARIA World"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12">
            <div class="card scrollable-list" style="min-height: 600px" >
                <div class="card-header card-header-text">
                    <h4 class="card-title">Nombre des Agents par section</h4>
                </div>
                <div class="card-content">
                    <div class="streamline" v-for="(data, index) in section" :key="index">
                       
                            <div class="col">
                                <div class="mini-stat clearfix bg-facebook rounded">
                                    <span class="mini-stat-icon"><v-icon size="40"> mdi-account</v-icon></span>
                                    <div class="mini-stat-info">
                                        <span>{{ data.nombre }} Agents</span>
                                        SECTION {{ data.SECTION_CODE }}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
import Chart from 'chart.js/auto';
import { onMounted } from "vue";
import { accountService } from "@/_service";
export default {
    name: 'Graphe',
    data() {
        return {
            section: []
        }
    },
    async mounted() {
        const user = JSON.parse(localStorage.getItem("user-info"));
        var donnee = new FormData();

        donnee.append('role', user[0].role);
        donnee.append('matricule', user[0].matricule);

        try {
            const res = await accountService.getNbSection(donnee);
            this.section = res.data.dataUser
            console.log(this.section);
        } catch (error) {
            console.log(error)
        }
    },
    setup() {

        const getData = async () => {
            const dataUsers = []
            const labels = []
            try {
                const res = await accountService.getNbChart();
                for (let i = 0; i < res.data.dataUser.length; i++) {
                    labels.push(res.data.dataUser[i].CATEGORIE_CODE);
                }
                for (let i = 0; i < res.data.dataUser.length; i++) {
                    var tab = parseInt(res.data.dataUser[i].nombre);
                    dataUsers.push(tab);
                }
            } catch (err) {
                console.error(err);
            }
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Nombre des agents dans catégorie',
                    data: dataUsers,
                    borderWidth: 1,
                    backgroundColor: [
                        '#12ABC4',
                        '#17FF00',
                        '#FF8364',
                        '#128364',
                        '#128FF4',
                        '#128A54',
                        '#128364',
                        '#1C7364',
                        '#129964',
                        '#F8364F',
                        '#12DC64',
                        '#1283EE',
                        '#1EE964',
                        '#128364',
                    ],
                    borderColor: [
                        '#12ABC4',
                    ],
                }]

            }
            const config = {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            }
            const myChart = new Chart(
                document.getElementById('goodCanvas1'),
                config
            )
            return myChart;
        }

        onMounted(() => {
            getData()

        })
    }
}
</script>
<style>
.scrollable-list {
   max-height: 500px;
   /* Ajustez la hauteur maximale selon vos besoins */
   overflow: auto;
}
.rounded {
  -webkit-border-radius: 3px !important;
  -moz-border-radius: 3px !important;
  border-radius: 3px !important;
}

.mini-stat {
  padding: 15px;
  margin-bottom: 20px;
}

.mini-stat-icon {
  width: 60px;
  height: 60px;
  display: inline-block;
  line-height: 60px;
  text-align: center;
  font-size: 20px;
  background: none repeat scroll 0% 0% #EEE;
  border-radius: 100%;
  float: left;
  margin-right: 10px;
  color: #3b5998;
}

.mini-stat-info {
  font-size: 12px;
  padding-top: 2px;
}


.mini-stat-info span {
  display: block;
  font-size: 30px;
  font-weight: 600;
  margin-bottom: 5px;
  margin-top: 7px;
}

/* ================ colors =====================*/
.bg-facebook {
  background-color: #3b5998 !important;
  border: 1px solid #3b5998;
  color: white;
}

.fg-facebook {
  color: #3b5998 !important;
}

.bg-twitter {
  background-color: #00a0d1 !important;
  border: 1px solid #00a0d1;
  color: white;
}

.fg-twitter {
  color: #00a0d1 !important;
}

.bg-googleplus {
  background-color: #db4a39 !important;
  border: 1px solid #db4a39;
  color: white;
}

.fg-googleplus {
  color: #db4a39 !important;
}

.bg-bitbucket {
  background-color: #205081 !important;
  border: 1px solid #205081;
  color: white;
}

.fg-bitbucket {
  color: #205081 !important;
}</style>