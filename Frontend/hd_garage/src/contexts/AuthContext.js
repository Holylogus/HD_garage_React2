import { createContext, useState, useContext } from "react";
import { useNavigate } from "react-router-dom";
import axios from "../api/axios";

export const AuthContext = createContext();

export const AuthProvider = ({ children }) => {
  const navigate = useNavigate();
  const [user, setUser] = useState(null);
  const [errors, setErrors] = useState({
    nev: "",
    email: "",
    password: "",
    password_confirmation: ""
  });

  let token = "";

  const csrf = () =>
    axios.get("/token").then((response) => {
      //console.log(response);
      token = response.data;
    });

  //bejelentkezett felhasználó adatainak lekérése
  const getUser = async () => {
    const { data } = await axios.get("/api/user");
    setUser(data);
  };

  const loginReg = async (vegpont, { ...adat }) => {
    
    await csrf();
    console.log(token);
    adat._token = token;
    console.log(adat);
    await getUser();
    console.log(user);

    try {
      await axios.post(vegpont, adat);
      console.log("siker");
      await getUser();
      navigate("/");
    } catch (error) {
      console.log(adat);
      if (error.response.status && error.response.status === 422) {
        setErrors(error.response.data.errors);
      }
    }
  };

  const logout = async ()=>{
    await csrf();
    console.log(token)
    axios.post("/logout",{_token:token})
    .then(res => {
      console.log(res)
      setUser(null)
      console.log(res)
     // window.location.reload()
    })
    .catch(err => {
      console.error(err); 
    })
  }

  return (
    <AuthContext.Provider value={{ loginReg, errors, getUser, user, logout }}>
      {children}
    </AuthContext.Provider>
  );
};

export default function useAuthContext() {
  return useContext(AuthContext);
}
