import { BrowserRouter, Routes, Route } from "react-router-dom";
import "./App.css";
import Layout from "./components/Layout";
import Public from "./pages/Public";
import NoPage from "./pages/NoPage";
import "bootstrap/dist/css/bootstrap.min.css";
import "./styles/Layout.css";
import Login from "./pages/Login";
import Regist from "./pages/Regist";
import Admin from "./pages/Admin";
import Munkak from "./pages/Munkak";
import { AuthProvider } from "./contexts/AuthContext";

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <AuthProvider>
          <Routes>
            <Route path="/" element={<Layout />}>
              <Route index element={<Public />} />
              <Route path="*" element={<NoPage />} />
              <Route path="/bejelentkezes" element={<Login />} />
              <Route path="/regist" element={<Regist />} />
              <Route path="/admin" element={<Admin />} />
              <Route path="/munkak" element={<Munkak />} />
            </Route>
          </Routes>
        </AuthProvider>
      </BrowserRouter>
    </div>
  );
}

export default App;
