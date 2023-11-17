import Axios from "./caller.service";

// login page axios
let onlogin = (dataFormat) => {
    return Axios.post('/api.php?action=login', dataFormat)
}


//axios pour recuperer tout liste user
let onAllUser = () => {
    return Axios.get('/user.php?action=user')
}
let setUser = (donnees) => {
    return Axios.post('/user.php?action=add',donnees)
}
let deleteUser = (donnees) => {
    return Axios.post('/user.php?action=delete',donnees)
}
let editUser = (donnees) => {
    return Axios.post('/user.php?action=edit',donnees)
}


//axios pour  tout  AVENANTS
let allAvenantComplet = (donnees)=>{
    return Axios.post('/avenant.php?action=tout', donnees)
}
let allAvenant6M = (donnees)=>{
    return Axios.post('/avenant.php?action=sixM', donnees)
}
let allAvenantTard = (donnees)=>{
    return Axios.post('/avenant.php?action=tard', donnees)
}


//axios pour  tout  CONTRAT
let allContratComplet = (donnees)=>{
    return Axios.post('/contrat.php?action=tout', donnees)
}
let allContrat6M = (donnees)=>{
    return Axios.post('/contrat.php?action=sixM', donnees)
}
let allContratTard = (donnees)=>{
    return Axios.post('/contrat.php?action=tard', donnees)
}


//axios pour  tout  RETRAITE
let allRetraite1A = (donnees)=>{
    return Axios.post('/retraite.php?action=1ans', donnees)
}
let allRetraiteTard = (donnees)=>{
    return Axios.post('/retraite.php?action=tard', donnees)
}

//axios pour  tout  chart.js
let getNbChart = ()=>{
    return Axios.get('/chart.php?action=nb')
}
let getNbSection = (donnees)=>{
    return Axios.post('/chart.php?action=nbSec',donnees)
}


//axios pour  tout  SECTION
let allSection = ()=>{
    return Axios.get('/user.php?action=section')
}
let setSection = (donnees)=>{
    return Axios.post('/user.php?action=addSec', donnees)
}

//axios pour  tout  Profile User
let getUserEdit = (donnees)=>{
    return Axios.post('/profile.php?action=user', donnees)
}
let setUserEdit = (donnees)=>{
    return Axios.post('/profile.php?action=edit', donnees)
}

//axios pour  tout  IMPORTER
let addImport = (donnees)=>{
    return Axios.post('/importer.php?action=add', donnees)
}


export const accountService = {
    onlogin,
    onAllUser,setUser,deleteUser,editUser,
    allSection,setSection,
    allAvenantComplet,allAvenant6M,allAvenantTard,
    allContratComplet,allContrat6M,allContratTard,
    allRetraite1A,allRetraiteTard,
    addImport,getUserEdit,setUserEdit,getNbChart,getNbSection
}