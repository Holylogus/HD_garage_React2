import { Form } from "react-bootstrap";
import { Button } from "react-bootstrap";
import { Link } from "react-router-dom";
import "../styles/Login.css";
import { useState } from "react";
import useAuthContext from "../contexts/AuthContext";

export default function Login() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const {loginReg, errors} = useAuthContext();


  const handleSubmit = async (e) => {
    e.preventDefault();

    const adat = {
      email: email,
      password: password,
    };
    console.log(adat)
    loginReg("/login", adat);

  };

  return (
    <div
      className="m-auto p-5 mt-5"
      style={{ maxWidth: "400px", border: "1px solid black" }}
    >
      <h1>Bejelentkezés</h1>
      <Form onSubmit={handleSubmit}>
        <Form.Group className="pt-3">
          <Form.Label htmlFor="email" className="pt-3">
            Email Cím:
          </Form.Label>
          <Form.Control
            type="email"
            className="mt-3"
            id="email"
            name="email"
            value={email}
            onChange={(e) => {
              setEmail(e.target.value);
            }}
          />
          <div>
            {errors.email && (
              <span className="text-danger">{errors.email[0]}</span>
            )}
          </div>
        </Form.Group>
        <Form.Group className="pt-3">
          <Form.Label htmlFor="pwd" className="mt-3">
            Jelszó:
          </Form.Label>
          <Form.Control
            as="textarea"
            type="password"
            className="mt-3"
            id="pwd"
            name="pwd"
            value={password}
            onChange={(e) => {
              setPassword(e.target.value);
            }}
          />
          <div>
            {errors.password && (
              <span className="text-danger">{errors.email[0]}</span>
            )}
          </div>
        </Form.Group>
        <Button className="mt-3 m-auto" variant="danger" type="submit">
          Tovább
        </Button>
      </Form>
      <p style={{ textAlign: "center" }} className="mt-3">
        Még nincs felhasználó neve?
      </p>
      <p style={{ textAlign: "center" }} className="mt-3">
        <Link to="/regist">Regisztráció</Link>
      </p>
    </div>
  );
}
