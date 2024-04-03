import DataService from "../model/DataService";

export default class Controller{

    constructor(){
        this.dataServie = new DataService();

        this.dataServie.getAxiosData("api/users", this.megjelenit)
    }

    megjelenit(list){
        console.log(list);
    }
}