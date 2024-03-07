{{-- @yield('layouts.app')
@if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

@yield('content')
    <h1>Liste des événements</h1>

    @if($events->isEmpty())
        <p>Aucun événement trouvé.</p>
    @else
        <ul>
            @foreach($events as $event)
                <li>
                    <h2>{{ $event->title }}</h2>
                    <p>{{ $event->description }}</p>
                    <p>Date: {{ $event->date }}</p>
                    <p>Lieu: {{ $event->location }}</p>
                    <p>Places disponibles: {{ $event->available_places }}</p>
                    <p>Type de réservation: {{ $event->type_of_reservation }}</p>
                    <p>Statut: {{ $event->status }}</p>
                    <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" width="200">
                </li>
                @if($event->available_places > 0)
        <form method="POST" action="{{ route('events.reserve', ['eventId' => $event->id]) }}">
            @csrf
            <button type="submit">Réserver une place</button>
        </form>
    @else
        <p>Désolé, il n'y a plus de places disponibles pour cet événement.</p>
    @endif
            @endforeach
        </ul>
    @endif --}}






    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    </head>
    <x-app-layout>
    <body class="bg-gray-200">
      @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-green-100 border border-green-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">NB!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    <input type="text" id="searchInput" placeholder="Recherche...">
    <div id="searchResults"></div>
    <label for="category" class="mr-2">Filter by Category:</label>
    <select name="category" id="category">
      <option value="">Toutes les catégories</option>
      @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
  </select>
  
    <div id="events-list" >
     

      @foreach($events as $event)
      
    
    <div class="entreprise-card max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4 mx-auto"  data-nom="{{ $event->title }}">
        <img class="w-full h-56 object-cover object-center" src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" alt="avatar">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <svg class="h-6 w-6 text-white fill-current" viewBox="0 0 512 512">
                <path d="M256 48C150 48 64 136.2 64 245.1v153.3c0 36.3 28.6 65.7 64 65.7h64V288h-85.3v-42.9c0-84.7 66.8-153.3 149.3-153.3s149.3 68.5 149.3 153.3V288H320v176h64c35.4 0 64-29.3 64-65.7V245.1C448 136.2 362 48 256 48z"/>
            </svg>
            <h1 class="mx-3 text-white font-semibold text-lg">Focusing</h1>
        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">{{ $event->title }}</h1>
            <p class="py-2 text-lg text-gray-700">{{ $event->description }}</p>
            <div class="flex items-center mt-4 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z"/><g><path d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z"/></g>
                </svg>
                <h1 class="px-2 text-sm">Organisateur</h1>
            </div>
            <div class="flex items-center mt-2 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                </svg>
                <h1 class="px-2 text-sm">{{ $event->location }}</h1>
            </div>
            <div class="flex items-center mt-2 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z"/>
                </svg>
                <h1 class="px-2 text-sm">Email de contact</h1>
            </div>
            <div class="flex items-center mt-2 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-10h2v6h-2v-6zm0-2h2v2h-2v-2z"/>
                </svg>
                <h1 class="px-2 text-sm">Date de l'événement : {{ $event->date }}</h1>
            </div>
            <div class="flex items-center mt-2 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M12 2c-5.523 0-10 4.477-10 10s4.477 10 10 10 10-4.477 10-10-4.477-10-10-10zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-10h2v6h-2v-6zm0-2h2v2h-2v-2z"/>
                </svg>
                <h1 class="px-2 text-sm">Places disponibles : {{ $event->available_places }}</h1>
            </div>
            

           
    <a href="{{ route('events.statistics', ['eventId' => $event->id]) }}" class="text-blue-500 hover:underline">  statistiques  </a>
    @if(auth()->check() && auth()->user()->id === $event->user_id)
    <form method="POST" action="{{ route('events.destroy', ['event' => $event->id]) }}">
      @csrf
      @method('DELETE')
      <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
          Supprimer
      </button>
  </form>
  @endif
  @if (!$event->validated)
  <form action="{{ route('confirmEvent', ['eventId' => $event->id]) }}" method="POST">
      @csrf
      @method('PUT') <!-- Ajoutez cette ligne pour spécifier la méthode PUT -->
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Confirmer
      </button>
  </form>
@endif


            </div>
        </div>
    </div>
    @endforeach
  </div>
 
  <div class="mt-4">
      {{ $events->links() }}
  </div>
  

    
    </body>
  </x-app-layout>
    <script>
      document.getElementById('searchInput').addEventListener('input', function() {
          var searchTerm = this.value.trim().toLowerCase();
          var entrepriseCards = document.querySelectorAll('.entreprise-card');

          entrepriseCards.forEach(function(card) {
              var nom = card.getAttribute('data-nom').toLowerCase();
              if (nom.includes(searchTerm)) {
                  card.style.display = 'block';
              } else {
                  card.style.display = 'none';
              }
          });
      });

      document.getElementById('category').addEventListener('change', function() {
        var categoryId = this.value;
        var url = '{{ route("events.filterByCategory") }}';

        axios.post(url, {
            categoryId: categoryId
        })
        .then(function (response) {
            document.getElementById('events-list').innerHTML = response.data;
        })
        .catch(function (error) {
            console.log(error);
        });
    });

  </script>
    </html>
    
    