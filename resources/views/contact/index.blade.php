@extends('layouts.app')

@section('content')
<div class="min-h-screen text-white flex flex-col items-center justify-center">
  <!-- Header Section -->
  <div class="text-center">
    <h1 class="text-3xl font-bold mb-6">Contact Us</h1>
    <div class="flex flex-row justify-center">
      <!-- official instagram -->
      <div class="text-center">
        <a href="https://www.instagram.com/umnlions_basketball/" target="_blank" rel="noopener noreferrer">
          <div class="mb-2 text-gold flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 64 64">
                <linearGradient id="jm_nAfYbxsVmTlYr5N4x9a_43625_gr1" x1="100%" y1="0%" x2="50%" y2="80%">
                    <stop offset="0" stop-color="#051022"></stop>
                    <stop offset="1" stop-color="#3a4e93"></stop>
                </linearGradient>
                <path fill="url(#jm_nAfYbxsVmTlYr5N4x9a_43625_gr1)" d="M44,57H20c-7.168,0-13-5.832-13-13V20c0-7.168,5.832-13,13-13h24c7.168,0,13,5.832,13,13v24 C57,51.168,51.168,57,44,57z M20,9C13.935,9,9,13.935,9,20v24c0,6.065,4.935,11,11,11h24c6.065,0,11-4.935,11-11V20 c0-6.065-4.935-11-11-11H20z"></path>
                <linearGradient id="jm_nAfYbxsVmTlYr5N4x9b_43625_gr2" x1="64" x2="32" y1="18.167" y2="45.679" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                    <stop offset="0" stop-color="#051022"></stop>
                    <stop offset="1" stop-color="#3a4e93"></stop>
                </linearGradient>
                <path fill="url(#jm_nAfYbxsVmTlYr5N4x9b_43625_gr2)" d="M32,45c-7.168,0-13-5.832-13-13c0-7.168,5.832-13,13-13c7.168,0,13,5.832,13,13 C45,39.168,39.168,45,32,45z M32,23c-4.962,0-9,4.038-9,9c0,4.963,4.038,9,9,9c4.963,0,9-4.037,9-9C41,27.038,36.963,23,32,23z"></path><linearGradient id="jm_nAfYbxsVmTlYr5N4x9c_43625_gr3" x1="46" x2="46" y1="12.75" y2="23.049" gradientUnits="userSpaceOnUse" spreadMethod="reflect"><stop offset="0" stop-color="#6dc7ff"></stop><stop offset="1" stop-color="#e6abff"></stop></linearGradient>
                <path fill="url(#jm_nAfYbxsVmTlYr5N4x9c_43625_gr3)" d="M46 15A3 3 0 1 0 46 21A3 3 0 1 0 46 15Z">
                </path>
            </svg>          
          </div>
          <p class="text-sm">umnlions_basketball</p>
        </a>
      </div>
      <!-- Phone -->
      <div class="text-center mx-5">
        <div class="mb-2 text-gold flex justify-center items-center">
          <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <linearGradient id="phoneGradient" x1="50%" y1="0%" x2="50%" y2="50%">
                <stop offset="0" stop-color="#051022"></stop>
                <stop offset="1" stop-color="#3a4e93"></stop>
              </linearGradient>
            <path fill="url(#phoneGradient)" d="M6.62 10.79a15.91 15.91 0 006.59 6.59l2.2-2.2a1.003 1.003 0 011.3-.1c1.12.7 2.47 1.1 3.89 1.1.55 0 1 .45 1 1v3.75c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1H6c.55 0 1 .45 1 1 0 1.42.4 2.77 1.1 3.89.09.14.09.31-.01.44l-2.2 2.2z"/>
          </svg>
        </div>
        <p class="text-sm">+1235 2355 98</p>
      </div>
      <!-- Email -->
      <div class="text-center">
        <div class="mb-2 text-gold flex justify-center items-center">
          <svg class="w-10 h-10" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <defs>
              <linearGradient id="emailGradient"  x1="100%" y1="0%" x2="20%" y2="50%">
                <stop offset="0" stop-color="#051022"></stop>
                <stop offset="1" stop-color="#3a4e93"></stop>
              </linearGradient>  
            </defs>
            <path fill="url(#emailGradient)" d="M12 13.82L1.46 6.37C.65 5.89 0 6.28 0 7.16V18c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V7.16c0-.88-.65-1.27-1.46-.79L12 13.82z"/></svg>
        </div>
        <p class="text-sm">info@yoursite.com</p>
      </div>
    </div>
  </div>

  <!-- Contact Form Section -->
  <div class="w-full max-w-md">
    <form class="rbg-black ounded-lg p-6 space-y-4">
        @csrf
      <div>
        <label for="name" class="block text-sm font-medium mb-1">Name</label>
        <input type="text" id="name" class="w-full px-4 py-2 border border-gray-700 bg-gray-800 rounded text-white focus:ring-2 focus:ring-gold focus:outline-none" />
      </div>
      <div>
        <label for="email" class="block text-sm font-medium mb-1">Email</label>
        <input type="email" id="email" class="w-full px-4 py-2 border border-gray-700 bg-gray-800 rounded text-white focus:ring-2 focus:ring-gold focus:outline-none" />
      </div>
      <div>
        <label for="subject" class="block text-sm font-medium mb-1">Subject</label>
        <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-700 bg-gray-800 rounded text-white focus:ring-2 focus:ring-gold focus:outline-none" />
      </div>
      <div>
        <label for="message" class="block text-sm font-medium mb-1">Message</label>
        <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-700 bg-gray-800 rounded text-white focus:ring-2 focus:ring-gold focus:outline-none"></textarea>
      </div>
      <button type="submit" class="w-full py-2 font-semibold rounded hover:bg-gradient-to-r from-[#3a4e93]  to-[#051022] focus:outline-none">Send Message</button>
    </form>
  </div>
</div>
@endsection
