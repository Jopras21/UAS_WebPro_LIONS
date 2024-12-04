import React from "react";

const Footer = () => {
    return (
        <footer className="bg-gradient-to-r from-[#051022] to-[#3a4e93] text-white py-6">
            <div className="container mx-auto flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                {/* sosial media */}
                <div className=""></div>

                {/* Alamat */}
                <div className="text-center md:text-left">
                    <p>1234 Street Name</p>
                    <p>City, Country</p>
                    <p>ZIP Code</p>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
