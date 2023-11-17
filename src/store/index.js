import { createStore } from 'vuex'
import { accountService } from "@/_service";

export default createStore({
  state: {
    dataAvenant: null,
    dataContrat: null,
    dataRetraite: null,
    title:null,
    rowAvenant1:null,
    rowAvenant2:null,
    rowContrat1:null,
    rowContrat2:null,
    rowRetraite1:null,
    rowRetraite2:null,
  },
  getters: {
    getAvenant(state) {
      return state.dataAvenant
    },
    getContrat(state) {
      return state.dataContrat
    },
    getRetraite(state) {
      return state.dataRetraite
    },
    getTitre(state){
      return state.title
    },
    getRowA1(state){
      return state.rowAvenant1
    },
    getRowA2(state){
      return state.rowAvenant2
    },
    getRowC1(state){
      return state.rowContrat1
    },
    getRowC2(state){
      return state.rowContrat2
    },
    getRowR1(state){
      return state.rowRetraite1
    },
    getRowR2(state){
      return state.rowRetraite2
    }
  },
  mutations: {
    setAvenant(state, value) {
      state.dataAvenant = value; 
    },
    setContrat(state, value) {
      state.dataContrat = value;
    },
    setRetraite(state, value) {
      state.dataRetraite = value;
    },
    setTitle(state, value) {
      state.title = value;
    },

    // count row for Avancement
    setRowAvenant1(state, value){
      state.rowAvenant1 = value;
    },
    setRowAvenant2(state, value){
      state.rowAvenant2 = value;
    },

    // count row for Contractuel
    setRowContrat1(state, value){
      state.rowContrat1 = value;
    }, 
    setRowContrat2(state, value){
      state.rowContrat2 = value;
    },

    // count row for Retraite
    setRowRetraite1(state, value){
      state.rowRetraite1 = value;
    },
    setRowRetraite2(state, value){
      state.rowRetraite2 = value;
    }


  },
  actions: {

    //Actions commit dans mutations des Avancement   
    async actionAvenantTout({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allAvenantComplet(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'Liste des tout les agents');
          commit('setAvenant', res.data.dataAgents)
          
        }
      } catch (err) {
        console.log(err);
      }
    },
    async actionAvenant6M({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allAvenant6M(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'Agents qui fait un avancement dans 6 mois');
          commit('setAvenant', res.data.dataAgents);
          commit('setRowAvenant1', res.data.count);
        }
      } catch (err) {
        console.log(err);
      }
    },
    async actionAvenantTard({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allAvenantTard(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'agents qui sont tard sont avancement');
          commit('setAvenant', res.data.dataAgents);
          commit('setRowAvenant2', res.data.count);
        }
      } catch (err) {
        console.log(err);
      }
    },

  
    //Actions commit dans mutations des Contrat
    async actionContratTout({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allContratComplet(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'Liste des tout les agents Contractuel');
          commit('setContrat', res.data.dataAgents);
        }
      } catch (err) {
        console.log(err);
      }
    },
    async actionContrat6M({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allContrat6M(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'Liste des agents qui doit renouveller son contrat');
          commit('setContrat', res.data.dataAgents);
          commit('setRowContrat1', res.data.count);
        }
      } catch (err) {
        console.log(err);
      }
    },
    async actionContratTard({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allContratTard(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'agents qui sont déja expirer son contrat');
          commit('setContrat', res.data.dataAgents);
          commit('setRowContrat2', res.data.count);
        }
      } catch (err) {
        console.log(err);
      }
    },


    //Actions commit dans mutations des Retraite
    async actionRetraite1A({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allRetraite1A(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'Liste des agents qui est sa retraite approche');
          commit('setRetraite', res.data.dataAgents);
          commit('setRowRetraite1', res.data.count);
        }
      } catch (err) {
        console.log(err);
      }
    },
    async actionRetraiteTard({ commit }) {
      const user = JSON.parse(localStorage.getItem("user-info"));
      var donnee = new FormData();

      donnee.append('role', user[0].role);
      donnee.append('matricule', user[0].matricule);

      try {
        const res = await accountService.allRetraiteTard(donnee);
        if (res.data.error) {
          console.log("error 1...!", res.data.message);
        } else {
          commit('setTitle', 'Liste des agents qui doit prendre sa retraite');
          commit('setRetraite', res.data.dataAgents);
          commit('setRowRetraite2', res.data.count);
        }
      } catch (err) {
        console.log(err);
      }
    },
  }
})
