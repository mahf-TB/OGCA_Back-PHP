<template>
    <!-- Modal -->
    <div class="modal fade text-dark" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">INFORMATION DE L'UTILISATEUR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                            <!-- matricule -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" v-model="user.matricule" id="floatingInput"
                                        placeholder="votre matricule">
                                    <label for="floatingInput"> Matricule</label>
                                </div>
                            </div>
                             <!-- mot de passe ancienne -->
                             <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" :class="{ 'is-invalid': this.valid }"
                                        v-model="motdepasse.ancien" id="floatingInput" placeholder="mot de passe securisé">
                                    <label for="floatingInput">Ancien mot de passe</label>
                                    <div class="invalid-feedback">Verifiez votre mot de pas si correct! </div>
                                </div>
                            </div>
                            <!-- nom -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" style="text-transform:capitalize;"
                                        v-model="user.nom" id="floatingPassword" placeholder="votre nom">
                                    <label for="floatingPassword">Nom</label>
                                </div>
                            </div>
                            <!-- mot de passe nouvelle -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" :class="{ 'is-invalid': this.valid }"
                                        v-model="motdepasse.nouveaux" id="floatingInput"
                                        placeholder="mot de passe securisé">
                                    <label for="floatingInput">Nouveaux mot de passe</label>
                                    <div class="invalid-feedback">Verifiez votre mot de pas si correct! </div>
                                </div>
                            </div>
                            <!-- prenom -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" v-model.trim="user.prenom" id="floatingInput"
                                        placeholder="votre prenom">
                                    <label for="floatingInput">Prenom</label>
                                </div>
                            </div>

                            
                           
                            <!-- mot de passe de comfirmation -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" :class="{ 'is-invalid': this.valid }"
                                        v-model="motdepasse.confirme" id="floatingInput"
                                        placeholder="mot de passe securisé">
                                    <label for="floatingInput">Confirmation mot de passe</label>
                                    <div class="invalid-feedback">Verifiez votre mot de pas si correct! </div>
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="button" @click.prevent="enregistrer()" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import { accountService } from "@/_service";
export default {
    name: 'EditProfile',
    data() {
        return {
            user: {
                matricule: '',
                nom: '',
                prenom: '',
                role: '',
            },
            password: '',

            motdepasse: {
                ancien: '',
                nouveaux: '',
                confirme: ''

            },
            valid: false,
        }
    },
    mounted() {
        this.getUserInfo();
    },
    methods: {
        async getUserInfo() {
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

                    this.password = userDB[0].password;
                }
            } catch (err) {
                console.log(err);
            }
        },
        async enregistrer() {
            const user = JSON.parse(localStorage.getItem("user-info"));
            var donnee = new FormData();

            donnee.append('role', user[0].role);
            donnee.append('matricule', user[0].matricule);

            try {
                const res = await accountService.setUserEdit(donnee);
                if (res.data.error) {
                    console.log("error 1...!", res.data.message);
                } else {
                    console.log("success 1...!", res.data.infoBD);

                }
            } catch (err) {
                console.log(err);
            }
        }
    }
}
</script>
<style></style>