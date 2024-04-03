import { useEffect } from "react";
import useAuthContext from "../contexts/AuthContext"

export default function Public(){
    const {user, getUser} = useAuthContext();

    // useEffect(()=>{
    //     console.log(user)
    //     if (!user) {
    //         getUser();
    //     }
    // }) 

    return(
        <div>
            <h1>Kezdőlap</h1>
            <p>Bejelentkezett felhasználó: {user?.nev}</p>
        </div>
    )
}