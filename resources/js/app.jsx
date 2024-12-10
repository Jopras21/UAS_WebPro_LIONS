import React from "react";
import ReactDOM from "react-dom/client";
import Navbar from "./NavBar/Navbar";
import Sidebar from "./NavBar/Sidebar";
import Footer from "./Footer/Footer";

const navbarRoot = document.getElementById("navbar-root");
if (navbarRoot) {
    ReactDOM.createRoot(navbarRoot).render(<Navbar />);
}

const sidebarRoot = document.getElementById("sidebar-root");
if (sidebarRoot) {
    ReactDOM.createRoot(sidebarRoot).render(<Sidebar />);
}

const footerRoot = document.getElementById("footer-root");
if (footerRoot) {
    ReactDOM.createRoot(footerRoot).render(<Footer />);
}
