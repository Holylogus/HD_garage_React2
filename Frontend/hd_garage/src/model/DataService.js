export default class DataService{

    constructor(){
        axios.defaults.baseURL = "http:localhost:8000/"
    }

    getAxiosData(url, callback){
        console.log(url)
        axios.get(url)
        .then(res => {
            console.log(res)
            console.log(res.data)
        })
        .catch(err => {
            console.error(err); 
        })
        .finally(function(){
            console.log("finally")
        })
    }
    
    postAxiosData(url, data){
        console.log(data)
        axios.post(url,data)
        .then(res => {
            console.log("RESP",res)
        })
        .catch(err => {
            console.error("hiba",err); 
        })
    }

    putAxiosData(url, data){
        console.log(data)
        console.log(`${url}/${data.id}`)
        axios.put(`${url}/${data.id}`,data)
        .then(res => {
            console.log("RESP",res)
        })
        .catch(err => {
            console.error("hiba",err); 
        })
    }

    deleteAxiosData(url, id){
        axios.delete(`${url}/${id}`)
        .then(res => {
            console.log("RESP",res)
        })
        .catch(err => {
            console.error("hiba",err); 
        })
    }


    
}