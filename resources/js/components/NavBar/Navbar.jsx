import React, { useState } from "react";
import { Link } from "react-router-dom";
import LogoImg from "../../assets/logo lions.png";
import Sidebar from "./Sidebar";
const Navbar = () => {
    const [isSidebarOpen, setIsSidebarOpen] = useState(false);

    const toggleSidebar = () => {
        setIsSidebarOpen(!isSidebarOpen);
    };

    return (
        <nav className="bg-gradient-to-r from-[#051022] to-[#3a4e93] px-4 py-3">
            <div className="container mx-auto flex items-center justify-between relative">
                {/* Logo */}
                <div className="flex items-center">
                    <Link to="/" onClick={() => window.scrollTo(0, 0)}>
                        <img
                            src={LogoImg}
                            alt="Logo"
                            className="h-auto w-[60px]"
                        />
                    </Link>
                </div>

                {/* Hamburger */}
                <div className=" absolute right-4 top-1/2 transform -translate-y-1/2">
                    <button
                        onClick={toggleSidebar}
                        className="text-white flex items-center"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            className="h-6 w-6"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>
                </div>
            </div>

            {isSidebarOpen && <Sidebar closeSidebar={toggleSidebar} />}
        </nav>
    );
};

export default Navbar;
