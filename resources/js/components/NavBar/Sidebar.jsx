import React from "react";
import { Link } from "react-router-dom";

const Sidebar = ({ closeSidebar }) => {
    return (
        <div className="fixed inset-0 bg-black bg-opacity-50 z-10">
            <div className="absolute top-0 right-0 w-1/4 bg-gradient-to-r from-[#051022] to-[#3a4e93] text-white h-full p-6">
                {/* Tombol Tutup */}
                <div className="flex justify-end">
                    <button onClick={closeSidebar}>
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
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>

                {/* Link */}
                <div className="flex flex-col space-y-6 mt-6">
                    <Link
                        to="/about"
                        className="text-white hover:text-gray-300"
                        onClick={closeSidebar}
                    >
                        Link 1
                    </Link>
                    <Link
                        to="/"
                        className="text-white hover:text-gray-300"
                        onClick={closeSidebar}
                    >
                        Link 2
                    </Link>
                    <Link
                        to="/"
                        className="text-white hover:text-gray-300"
                        onClick={closeSidebar}
                    >
                        Link 3
                    </Link>
                </div>
            </div>
        </div>
    );
};

export default Sidebar;
