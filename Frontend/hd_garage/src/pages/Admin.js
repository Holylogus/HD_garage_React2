import { Card } from "react-bootstrap";
import "../styles/Admin.css";
import carIcon from "../icons/electric-car.png"
import settingIcon from "../icons/settings.png"
import workerIcon from "../icons/workers.png"
import { Link, useNavigate } from "react-router-dom";

export default function Admin() {
  const navigate = useNavigate();
  return (
    <div className="cardContainer">
      <Card>
        <Card.Body onClick={()=>{
          navigate("/munkak")
        }}>
            <Card.Img src={carIcon}/>
          <Card.Text style={{ textAlign: "center" }}>
            <Link to="/munkak">Munkák</Link>
          </Card.Text>
        </Card.Body>
      </Card>
      <Card>
        <Card.Body>
            <Card.Img src={settingIcon}/>
          <Card.Text style={{ textAlign: "center" }}>
          <Link>Beállítások</Link>
          </Card.Text>
        </Card.Body>
      </Card>
      <Card>
        <Card.Body>
            <Card.Img src={workerIcon}/>
          <Card.Text style={{ textAlign: "center" }}>
          <Link>Dolgozók</Link>
          </Card.Text>
        </Card.Body>
      </Card>
    </div>
  );
}
