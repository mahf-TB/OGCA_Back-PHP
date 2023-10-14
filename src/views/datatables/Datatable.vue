<template>
    <div>
        <div class="mr-4 ml-4 mt-3 mb-3">
            <div class="table-responsive">
                <DataTable :data="dataAgents" :columns="columns"
                    class="table table-hover table-striped table-bordered display" :options="{
                        responsive: true, autoWidth: false, dom: 'Bfrtip', language: {
                            search: 'Recherche', zeroRecords: 'aucune donnée disponible',
                            info: 'Affichage de _START_ à _END_ sur _TOTAL_ entrées',
                            infoFiltered: '(Montrer _MAX_ entrées)',
                            paginate: { first: 'Prémière', previous: 'Précédent', next: 'Suivant', last: 'Dernière' }
                        }, buttons: botones, 
                        columnDefs: [
                            {
                                target: 2,
                                visible: false,
                                searchable: false
                            },
                            {
                                target: 3,
                                visible: false
                            }
                        ]
                    }">
                    <thead class="table-success">
                        <tr>
                            <th class="fw-bolder">Matricule</th>
                            <th class="fw-bolder">Nom</th>
                            <th class="fw-bolder">Prenom</th>
                            <th class="fw-bolder">Date_de_Naissance</th>
                            <th class="fw-bolder">CIN</th>
                            <th class="fw-bolder">Sexe</th>
                            <th class="fw-bolder">Statut</th>
                            <th class="fw-bolder">Date_Avancement</th>
                            <th class="fw-bolder">Grage</th>
                            <th class="fw-bolder">Corps</th>
                            <th class="fw-bolder">Section</th>
                            <th class="fw-bolder">Ministere</th>
                            <th class="fw-bolder">Sanction</th>
                        </tr>
                    </thead>
                </DataTable>
            </div>
        </div>

    </div>
</template>
  
<script>

import DataTable from 'datatables.net-vue3';
import DataTableLib from 'datatables.net-bs5';
import Buttons from 'datatables.net-buttons-bs5';
import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
import Print from 'datatables.net-buttons/js/buttons.print';
import pdfmake from 'pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfmake.vfs = pdfFonts.pdfMake.vfs;
import 'datatables.net-responsive-bs5';
import JsZip from 'jszip';

window.JSZip = JsZip;
DataTable.use(DataTableLib);
DataTable.use(pdfmake);
DataTable.use(ButtonsHtml5);

import { accountService } from "@/_service";
export default {
    components: {
        DataTable
    },
    data() {
        return {
            dataAgents: null,
            scrollX: true,

            columns: [
                { data: 'agent_matricule' },
                { data: 'nom' },
                { data: 'prenom' },
                { data: 'date_naissance' },
                { data: 'cin' },
                { data: 'sexe' },
                { data: 'statut' },
                { data: 'date_avance'},
                { data: 'grade_abreviation' },
                { data: 'corps_libelle' },
                { data: 'section_code' },
                { data: 'ministere_libelle' },
                { data: 'sanction_code' }
            ],
            botones: [
                {
                    title: 'Liste des tout agents',
                    extend: 'excelHtml5',
                    text: '<strong>Excel</strong>',
                    className: 'btn btn-success'
                },
                {
                    title: 'Liste des tout agents',
                    extend: 'pdfHtml5',
                    text: '<strong>PDF</strong>',
                    className: 'btn btn-warning'
                },
                {
                    title: 'Liste des tout agents',
                    extend: 'print',
                    text: '<strong>Imprimer</strong>',
                    className: 'btn btn-danger'
                },
                {
                    title: 'Liste des tout agents',
                    extend: 'copy',
                    text: ' <strong>Copie</strong>',
                    className: 'btn btn-dark'
                },
            ]
        };
    },
    mounted() {
        this.getAgents();
    },
    methods: {
        getAgents() {
            accountService.allAgents().then(res => {
                if (res.data.error) {
                    console.log("error 1...!", res.data.message);
                } else {
                    console.log("success 1...!", res.data.message);
                    this.dataAgents = res.data.dataAgents
                    console.log(this.dataAgents);
                }
            }).catch(err => { console.log(err) });

        },
        editItem(item) {
            // Mettez ici votre logique d'édition
            console.log("Édition de l'élément :", item);
        },
        deleteItem(item) {
            // Mettez ici votre logique de suppression
            console.log("Suppression de l'élément :", item);
        },
    },

};
</script>
<style>
.fw>th {
    font-weight: bolder;
}


</style>
  