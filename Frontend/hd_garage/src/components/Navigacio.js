import { Navbar } from "react-bootstrap";
import { Button } from "react-bootstrap";
import { Link } from "react-router-dom";
import useAuthContext from "../contexts/AuthContext";

export default function Navigacio() {
  const { user, logout } = useAuthContext();

  return (
    <Navbar bg="dark" variant="dark">
      <Link className="brand" to="/">
        HD Garage
      </Link>
      <Link>Szervíz</Link>
      <Link>Kapcsolat</Link>
      <Link to="/admin">Admin</Link>
      {user != null ? (
        <>
         <Button variant="danger" onClick={logout}>
            <Link to="/logut">Kijelentkezés</Link>
          </Button>
        </>
      ) : (
        <>
          <Button variant="danger">
            <Link to="/bejelentkezes">Bejelentkezés</Link>
          </Button>
          <Button variant="danger">
            <Link to="/regist">Regisztráció</Link>
          </Button>
        </>
      )}
    </Navbar>
  );
}
