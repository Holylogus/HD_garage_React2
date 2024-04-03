import { Card, Container } from "react-bootstrap";
import { Row } from "react-bootstrap";
import "../styles/Munkak.css";
import { useEffect, useState } from "react";
import axios from "../api/axios";
import { Col } from "react-bootstrap";

export default function Munkak() {
  const [munkalapok, SetMunkalapok] = useState([]);
  const [autok, SetAutok] = useState([]);

  useEffect(() => {
    axios
      .get("/api/munkalap")
      .then((res) => {
        
        //Munkalapok rendezés dátum szerint csökkenő sorrendben
        const sortedMunkalapok = res.data.sort((a, b) => new Date(b.munkafelvetelIdeje) - new Date(a.munkafelvetelIdeje));

        // Az első 5 elem kiválasztása
        const firstFiveMunkalapok = sortedMunkalapok.slice(0, 5);

        SetMunkalapok(firstFiveMunkalapok);
      })
      .catch((err) => {
        console.error(err);
      });
  },[]);

  useEffect(()=>{
    axios.get("/api/auto")
    .then(res => {
        //console.log(res.data)
        SetAutok(res.data)
    })
    .catch(err => {
        console.error(err); 
    })
  },[])

  return (
    <Container fluid className="page">
      <Row>
        <h2>Aktuális munkák:</h2>
      </Row>
      <Row style={{maxWidth: '95vw', margin: 'auto', marginTop: '1vh'}}>
        {munkalapok.slice(0, 4).map((munkalap, id) => {
            const auto = autok.find(auto => auto.autoAzonosito === munkalap.auto);

            return(
          <Col lg={3} key={id}>
            <Card>
              <Card.Header
                style={{
                  fontSize: "12pt",
                  color: "white",
                  textAlign: "center",
                  fontWeight: "bold",
                }}
              >
                Munkalapszám: {munkalap.munkalapSzam}
              </Card.Header>
              <Card.Body>
                <Card.Text>
                  Munkafelvétel ideje: {munkalap.munkafelvetelIdeje}
                </Card.Text>
                {auto ? <Card.Text>Autó: {auto.marka}</Card.Text> : <Card.Text>Autó: Nincs adat</Card.Text>}
                <Card.Text>Munkavezető: {munkalap.munkavezeto}</Card.Text>
              </Card.Body>
            </Card>
          </Col>
          );
            })}
      </Row>
      <Row>
        <h2>Szervezésre váró munkák</h2>
      </Row>
      <Row>
            
      </Row>
    </Container>
  );
}
