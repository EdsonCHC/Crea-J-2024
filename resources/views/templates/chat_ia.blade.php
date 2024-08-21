<div class="fixed bottom-0 right-0 mb-4 mr-4">
    <button id="open-chat"
        class="bg-vh-green text-white py-2 px-4 rounded-md hover:bg-vh-greentransition duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Chat de Emergencia
    </button>
</div>
<div id="chat-container" class="hidden fixed bottom-16 right-4 w-96">
    <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
        <div class="p-4 border-b bg-vh-green text-white rounded-t-lg flex justify-between items-center">
            <p class="text-lg font-semibold">Chat Bot</p>
            <button id="close-chat" class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
        <div id="chatbox" class="p-4 h-80 overflow-y-auto">
            <!-- Chat messages will be displayed here -->
        </div>
        <div id="menu-container" class="hidden p-4 border-t flex flex-col">
            <!-- Opciones del menú se agregarán aquí -->
        </div>
        <div class="p-4 border-t flex">
            <input id="user-input" type="text" placeholder="Escribe tu pregunta"
                class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-vh-green"
                autocomplete="none">
            <button id="send-button"
                class="bg-vh-green text-white px-4 py-2 rounded-r-md hover:bg-vh-green transition duration-300">Send</button>
        </div>
    </div>
</div>