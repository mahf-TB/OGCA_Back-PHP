<template>
    <!-- Modal -->
    <div class="modal fade text-dark" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark" id="exampleModalLongTitle">INFORMATION DE L'UTILISATEUR</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <!-- matricule -->
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" v-model="user.matricule" id="floatingInput1"
                                    placeholder="votre matricule">
                                <label for="floatingInput1"> Matricule</label>
                            </div>
                        </div>
                        <!-- mot de passe ancienne -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" :class="{ 'is-invalid': this.validAncien }"
                                    v-model="motdepasse.ancien" id="floatingPassword" placeholder="mot de passe securisé">
                                <label for="floatingPassword">Ancien mot de passe</label>
                                <div class="invalid-feedback">Verifiez votre mot de pas si correct! </div>
                            </div>
                        </div>
                        <!-- nom -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" style="text-transform:capitalize;"
                                    v-model="user.nom" id="floatingInput2" placeholder="votre nom">
                                <label for="floatingInput2">Nom</label>
                            </div>
                        </div>

                        <!-- mot de passe nouvelle -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" :class="{ 'is-invalid': this.valid }"
                                    v-model="motdepasse.nouveaux" id="floatingPassword2" placeholder="mot de passe securisé">
                                <label for="floatingPassword2">Nouveaux mot de passe</label>
                                <div class="invalid-feedback">Verifiez votre mot de pas si correct! </div>
                            </div>
                        </div>
                        <!-- prenom -->
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" v-model.trim="user.prenom" id="floatingInput3"
                                    placeholder="votre prenom">
                                <label for="floatingInput3">Prenom</label>
                            </div>
                        </div>
                        <!-- mot de passe de comfirmation -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" :class="{ 'is-invalid': this.valid }"
                                    v-model="motdepasse.confirme" id="floatingPassword3" placeholder="mot de passe securisé">
                                <label for="floatingPassword3">Confirmation mot de passe</label>
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
import $ from 'jquery';
export default {
    name: 'EditProfile',
    props: {
        dataInfo: Object,
        getUserInfo:Function,
    },
    data() {
        return {
            user: {
                matricule: '',
                nom: '',
                prenom: '',
                password: '',
            },
            motdepasse: {
                ancien: '',
                nouveaux: '',
                confirme: ''
            },
            valid: false,
            validAncien: false,
            close: ''
        }
    },
    mounted() {
    },
    methods: {
        async openModal() {
            $('#modalCenter').modal('show');
            if (this.dataInfo) {
                this.user = {
                    matricule: this.dataInfo.matricule,
                    nom: this.dataInfo.nom,
                    prenom: this.dataInfo.prenom,
                    password: this.dataInfo.motdepasse,
                };
                console.log(this.user)
            }
        },
        closeModal(){
            $('#modalCenter').modal('hide');
        },
        async enregistrer() {
            const users = JSON.parse(localStorage.getItem("user-info"));
            var donnee = new FormData();
           
            if (this.motdepasse.ancien == '' && this.motdepasse.nouveaux == '' && this.motdepasse.confirme == '') {
                donnee.append('id_mat', users[0].matricule);
                donnee.append('matricule', this.user.matricule);
                donnee.append('nom', this.user.nom);
                donnee.append('prenom', this.user.prenom);
                try {
                    const res = await accountService.setUserEdit(donnee);
                    if (res.data.error) {
                        console.log("error 1...!", res.data.message);
                    } else {
                        
                        console.log("success 11...!", res.data.message);
                        this.getInfo();
                        this.closeModal();
                        this.getUserInfo();
                    }
                } catch (err) {
                    console.log(err);
                }
            } else {
                donnee.append('id_mat', users[0].matricule);
                donnee.append('matricule', this.user.matricule);
                donnee.append('nom', this.user.nom);
                donnee.append('prenom', this.user.prenom);
                donnee.append('password', this.motdepasse.nouveaux);
                if (this.motdepasse.ancien == this.user.password) {
                    if (this.motdepasse.nouveaux == this.motdepasse.confirme) {
                        try {
                            const res = await accountService.setUserEdit(donnee);
                            if (res.data.error) {
                                console.log("error 1...!", res.data.message);
                            } else {
                                console.log("success 1...!", res.data.message);
                                this.getInfo();
                                this.closeModal();
                                this.getUserInfo();
                            }
                        } catch (err) {
                            console.log(err);
                        }
                    } else {
                        console
                        this.valid = true;
                        this.validAncien = false;
                    }
                } else {
                    this.validAncien = true;
                }

            }

        },
        async getInfo(){
            var donnee = new FormData();
            donnee.append('matricule', this.user.matricule);
            try {
                const res = await accountService.getUserEdit(donnee);
                if (res.data.error) {
                    console.log("error 1...!", res.data.message);
                } else {
                    console.log("success 1...!", res.data.message);
                    localStorage.setItem("user-info", JSON.stringify(res.data.infoBD))
                    
                }
            } catch (err) {
                console.log(err);
            }
        },


    }
}
</script>
<style></style>