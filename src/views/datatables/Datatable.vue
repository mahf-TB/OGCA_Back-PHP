<template>
    <div class="m-3">
        <!--  Bfrtip -->
        <div class="mr-4 ml-4 mt-3 mb-3">
            <div class=" table-responsive">
                <DataTable :data="dataAgents" :columns="columns"
                    class="table table-hover table-striped table-bordered display" :options="{
                        responsive: true, autoWidth: false, dom: 'Bfrtip', language: {
                            search: 'Recherche', zeroRecords: 'aucune donnée disponible',
                            info: 'Affichage de _START_ à _END_ sur _TOTAL_ entrées',
                            infoFiltered: '(Montrer _MAX_ entrées)',
                            paginate: { first: 'Prémière', previous: 'Précédent', next: 'Suivant', last: 'Dernière' }
                        }, buttons: botones,

                    }">
                    <thead class=" toto table-success ">
                        <tr>
                            <th class="fw-bolder">MATRICULE</th>
                            <th class="fw-bolder">NOMS</th>
                            <th class="fw-bolder">STATUT</th>
                            <th class="fw-bolder">DATE_DERNIER_AVANCEMENT</th>
                            <th class="fw-bolder">CORPS_CODE</th>
                            <th class="fw-bolder">GRADE_CODE_ACTUEL</th>
                            <th class="fw-bolder">DATE_PROCHAIN_AVANCEMENT</th>
                            <th class="fw-bolder">MOIS_AVANCEMENT</th>
                            <th class="fw-bolder">SECTION_CODE</th>
                            <th class="fw-bolder">SOA_LIBELLE</th>
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
                { data: 'mat' },
                { data: 'noms' },
                { data: 'prenom' },
                { data: 'statut' },
                { data: 'date_derniere' },
                { data: 'corps' },
                { data: 'grade' },
                { data: 'date_prochain' },
                { data: 'mois_avancement' },
                { data: 'section' },
                { data: 'soa_libelle' }
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
            ],
            agent: [
                {       
                        mat: '123',
                        noms: 'Andrimahefa Bienvenu',
                        statut: 'fonctionnaire',
                        date_derniere: '16/05/2022',
                        corps: 'U03B',
                        grade: '2C1E',
                        date_prochain: '16/05/2024',
                        mois_avancement: '05-2024',
                        section: '098353ZE',
                        soa_libelle: 'PERSONNEL FINANCES CENTRAL ',
                },
                {       
                        mat: '686',
                        noms: 'drimahefa Bienvenu',
                        statut: 'fonctionnaire',
                        date_derniere: '16/05/2022',
                        corps: 'U03B',
                        grade: '2C1E',
                        date_prochain: '16/05/2024',
                        mois_avancement: '05-2024',
                        section: '098353ZE',
                        soa_libelle: 'PERSONNEL FINANCES CENTRAL ',
                }
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
                    this.dataAgents = this.agent;
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
.toto {
    font-size: 16px;
}
</style>
  