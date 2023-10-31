<template>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5 vh-100">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Gestion des Notifications et des Rappels <br />
            <span style="color: hsl(218, 81%, 75%)">pour la Gestion des Ressources Humaines</span>
          </h1>
          <p class="mb-2 opacity-70" style="color: hsl(218, 81%, 85%)">
            Cela met en avant l'aspect de suivi des employés, de la progression de carrière,
            des contrats et des départs à la retraite, tout en soulignant l'importance des rappels
            et des notifications pour ces processus clés au sein d'une organisation.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
          <div class="card bg-glass">

            <div class="card-body px-4 py-4 px-md-4">
              <div class="text-center">
                <img :src="require('@/assets/Background.jpg')" style="width: 165px;" alt="logo">
                <h6 class="mt-1 mb-4 pb-1">Rappel des Contractuel Avancement et Retraite</h6>
              </div>

              <form @submit.prevent="login()">

                <div class="col-12">
                  <div class="form-floating mb-4">
                    <input type="text" class="form-control " :class="{ 'is-invalid': this.valid }" id="floatingInput"
                      placeholder="name@example.com" v-model="matricule">
                    <label for="floatingInput" class="d-flex align-items-start" style="color: rgb(126, 128, 129);">
                      <v-icon class="mr-3">mdi-account</v-icon> Matricule or Username</label>
                    <div class="invalid-feedback">Verifiez votre matricule si correct! </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" :class="{ 'is-invalid': this.valid }"
                      id="floatingPassword" placeholder="Password" v-model="password">
                    <label for="floatingPassword" class="d-flex justify-content-between  align-items-start"
                      style="color: rgb(126, 128, 129);">
                      <v-icon class="mr-3">mdi-key</v-icon> Mot de passe</label>
                    <div class="invalid-feedback"> Verifiez votre mot de passe si correct! </div>
                  </div>
                </div>
                <div class=" col-12 text-center pt-1  pb-1">
                  <div>

                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 mt-2" type="submit">SE
                      CONNECTER</button>
                    <a class="nav-link mt-3" href="#"><u>Mot de passe oublié</u></a>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- Section: Design Block -->
</template>
  
<script>

import { accountService } from "@/_service";
export default {
  name: "Login",

  //############## Données des page
  data() {
    return {
      matricule: '',
      password: '',
      valid: false,
    }
  },
  methods:
  {

    async login() {
      var donnee = new FormData();
      if (this.matricule != '' && this.password != '') {
        donnee.append('matricule', this.matricule);
        donnee.append('password', this.password);

        await accountService.onlogin(donnee).then((res) => {
          if (res.data.error) {
            console.log("error 1...!", res.data.message);
            this.valid = res.data.error
          } else {
            console.log("success 1...!", res.data.message);


            // const token =  btoa(res.data.infoBD);
            // var valeur = atob(token);
            // console.log(valeur);
            // localStorage.setItem("token", token);
            
            localStorage.setItem("user-info", JSON.stringify(res.data.infoBD))
            this.$router.push("/");
          }
        }).catch((err) => { console.log(err) });
      } else {
        console.log('remplire formulaire d authentification')
        this.valid = true;
      }
    },


  }
}


</script>
<style>
input:focus {
  border: 2px solid red;
}
</style>
