import { Outlet, } from "react-router-dom";
import Navigacio from "./Navigacio";

export default function Layout() {
  return (
    <div>
      <Navigacio></Navigacio>
      <Outlet></Outlet>
    </div>
  );
}
