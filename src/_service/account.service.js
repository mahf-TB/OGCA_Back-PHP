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


//axios pour  tout  AGENTS
let allAgents = (donnees)=>{
    return Axios.post('/agents.php?action=avenant', donnees)
}
let allAgentsCONTRAT = (donnees)=>{
    return Axios.post('/agents.php?action=contrat', donnees)
}
let allAgentsRETRAITE = (donnees)=>{
    return Axios.post('/agents.php?action=retraite', donnees)
}

//axios pour  tout  SECTION
let allSection = ()=>{
    return Axios.get('/user.php?action=section')
}
let setSection = (donnees)=>{
    return Axios.post('/user.php?action=addSec', donnees)
}


//axios pour  tout  IMPORTER
let addImport = (donnees)=>{
    return Axios.post('/importer.php?action=add', donnees)
}

export const accountService = {
    onlogin,
    onAllUser,setUser,deleteUser,editUser,
    allSection,setSection,
    allAgents,allAgentsRETRAITE,allAgentsCONTRAT,
    addImport,
}