import { useState } from "react";
import { Form, Button } from "react-bootstrap";
import axios from "../api/axios";
import { useNavigate } from "react-router-dom";

export default function Regist() {
  const navigate = useNavigate();
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [password_confirmation, setPasswordConfirmation] = useState("");
  const [szulIdo, setSzulIdo] = useState("");
  const [phoneNumber, setPhoneNumber] = useState("");
  const [lakcim, setLakcim] = useState("");

  const hundleSubmit = async (e) => {
    e.preventDefalt();

    let token = "";
    const csrf = () =>
      axios.get("/token").then((response) => {
        console.log(response);
        token = response.data;
      });
    const adat = {
      name: name,
      email: email,
      password: password,
      szulIdo: szulIdo,
      phoneNumber: phoneNumber,
      lakcim: lakcim,
      _token: token,
    };
    try {
      await axios.post("/register", adat);
      navigate("/");
    } catch (error) {
      console.log(error);
    }
    
  };

  return (
    <div
      className="m-auto p-5 mt-5"
      style={{ maxWidth: "400px", border: "1px solid black" }}
    >
      <h1>Regisztráció</h1>
      <Form>
        <Form.Group className="mt-4" controlId="name">
          <Form.Label>Név:</Form.Label>
          <Form.Control
            className="mt-1"
            type="text"
            placeholder="Gipsz Jakab"
            name="name"
            value={name}
            onChange={(e) => {
              setName(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Form.Group controlId="email" className="mt-4">
          <Form.Label>Email cím:</Form.Label>
          <Form.Control
            type="email"
            placeholder="gipsz.jakab@gmail.com"
            name="email"
            className="mt-1"
            value={email}
            onChange={(e) => {
              setEmail(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Form.Group controlId="password" className="mt-4">
          <Form.Label>Jelszó:</Form.Label>
          <Form.Control
            type="password"
            name="password"
            className="mt-1"
            value={password}
            onChange={(e) => {
              setPassword(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Form.Group controlId="passwordConfirm" className="mt-4">
          <Form.Label>Jelszó újra:</Form.Label>
          <Form.Control
            type="password"
            name="passwordRe"
            className="mt-1"
            value={password_confirmation}
            onChange={(e) => {
              setPasswordConfirmation(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Form.Group controlId="szulIdo" className="mt-4">
          <Form.Label>Születési idő:</Form.Label>
          <Form.Control
            type="date"
            name="szulIdo"
            className="mt-1"
            value={szulIdo}
            onChange={(e) => {
              setSzulIdo(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Form.Group controlId="phoneNumber" className="mt-4">
          <Form.Label>Telefonszám:</Form.Label>
          <Form.Control
            type="tel"
            name="phoneNumber"
            className="mt-1"
            placeholder="+36-30/246-58-30"
            value={phoneNumber}
            onChange={(e) => {
              setPhoneNumber(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Form.Group controlId="lakcim" className="mt-4">
          <Form.Label>Lakcím:</Form.Label>
          <Form.Control
            type="text"
            name="lakcim"
            className="mt-1"
            placeholder="2363 Dabas, Bóka utca 27. 1.em 3.ajtó"
            value={lakcim}
            onChange={(e) => {
              setLakcim(e.target.value);
            }}
          />
        </Form.Group>
        <div>
          <span className="text-danger">hiba</span>
        </div>
        <Button className="mt-4" variant="danger" onSubmit={hundleSubmit} type="submit">
          Tovább
        </Button>
      </Form>
    </div>
  );
}
