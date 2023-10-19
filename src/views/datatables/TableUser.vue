<template>
    <div>
        <v-data-table :headers="headers" :items="dataUser" item-value="id" :items-per-page="6">
            <template v-slot:item.actions="{ item }">
                <div>
                    <v-icon color="info" @click.prevent="editItem(item)">mdi-book-edit</v-icon>
                    <v-icon color="error" @click.prevent="deleteItem(item)">mdi-delete</v-icon>
                    <v-menu>
                        <template v-slot:activator="{ props }">
                            <v-icon color="green" v-bind="props">
                                mdi-dots-vertical
                            </v-icon>
                        </template>
                        <v-list>
                            <v-list-item>
                                <v-list-item  @click.prevent="editItem(item)"> Definir comme Admin </v-list-item>
                                <v-list-item  ><RouterLink to="/user/section" class="text-dark"> Ajouter des Section</RouterLink> </v-list-item>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </div>
            </template>
        </v-data-table>
    </div>
</template>

<script>
import Swal from 'sweetalert2'
import { accountService } from "@/_service";
export default {
    data() {
        return {
            headers: [
                { title: 'Matricule', key: 'matricule' },
                { title: 'Nom', key: 'nom' },
                { title: 'Prénom', key: 'prenom' },
                // { title: 'Mot de Passe', sortable: false, key: 'password' },
                { title: 'Rôle', key: 'role' },
                { title: 'Actions', key: 'actions', sortable: false },
            ],
            dataUser: [],
        };
    },
    mounted() {
        this.getAllUser();
    },
    methods: {
        async getAllUser() {
            try {
                const res = await accountService.onAllUser();
                this.dataUser = res.data.dataUser;
            } catch (err) {
                console.error(err);
            }
        },
        editItem(item) {
            localStorage.setItem("edit-user", JSON.stringify(item.columns))
            this.$router.push("/user/edit");
        },

        async deleteItem(item) {
            var donnee = new FormData();
            donnee.append('id', item.columns.matricule);

            try {
                Swal.fire({
                    title: 'Es-tu Sûr?',
                    text: "vous ne pourrez pas revenir en arrière !",
                    cancelButtonText: 'Annuler',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: 'blue',
                    cancelButtonColor: '#e9061c',
                    confirmButtonText: 'Oui, Supprimer-le!'

                }).then((result) => {
                    if (result.isConfirmed) {
                       accountService.deleteUser(donnee).then((res) => {
                            if (res.data.error) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    title: 'Your file has not been deleted.',
                                    icon: 'error',
                                    timer: 1000
                                })
                            } else {
                                Swal.fire({
                                    title: 'Deleted!',
                                    title: 'Your file has been deleted.',
                                    icon: 'success',
                                    timer: 1000
                                })
                                this.getAllUser();
                            }
                        })

                    }
                }).catch((err) => { console.log(err) });
            } catch (err) {
                console.error(err);
            }

        },

    },
};
</script>

<style></style>
  